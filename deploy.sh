#!/usr/bin/env bash
set -euo pipefail

# ---------------------------
# release.sh  —  Laravel helper
# ---------------------------

# Utilidades
err() { echo "❌ $*" >&2; exit 1; }
info() { echo "➡️  $*"; }
ok() { echo "✅ $*"; }

# 0) Pre-chequeos
[ -f ".env" ] || err "No se encontró .env en el directorio actual."
git rev-parse --is-inside-work-tree >/dev/null 2>&1 || err "Aquí no hay repo git inicializado."
git fetch --all --quiet || true

# 1) Leer APP_VERSION
if grep -qE '^[[:space:]]*APP_VERSION=' .env; then
  APP_VERSION="$(grep -E '^[[:space:]]*APP_VERSION=' .env | head -n1 | cut -d= -f2 | tr -d '[:space:]')"
else
  err "No se encontró la variable APP_VERSION en .env"
fi

[[ "$APP_VERSION" =~ ^([0-9]+)\.([0-9]+)\.([0-9]+)$ ]] || err "APP_VERSION no es semántica válida (ej: 0.2.34). Valor: $APP_VERSION"

MAJOR="${BASH_REMATCH[1]}"
MINOR="${BASH_REMATCH[2]}"
PATCH="${BASH_REMATCH[3]}"

ok "APP_VERSION actual: $APP_VERSION"

# 2) Crear rama de respaldo y subirla (release-APP_VERSION)
#    Usamos branch sin cambiar de rama activa.
BACKUP_BRANCH="release-$APP_VERSION"

# Chequear árbol limpio para no capturar cambios a medio hacer
if [ -n "$(git status --porcelain)" ]; then
  err "Tu árbol de trabajo tiene cambios sin commit. Haz commit/stash antes de continuar."
fi

# Crear la rama si no existe
if git show-ref --verify --quiet "refs/heads/$BACKUP_BRANCH"; then
  info "La rama $BACKUP_BRANCH ya existe localmente."
else
  info "Creando rama de respaldo $BACKUP_BRANCH…"
  git branch "$BACKUP_BRANCH"
fi

# Subir la rama al remoto origin
if git ls-remote --exit-code --heads origin "$BACKUP_BRANCH" >/dev/null 2>&1; then
  info "La rama $BACKUP_BRANCH ya existe en origin."
else
  info "Subiendo rama $BACKUP_BRANCH a origin…"
  git push -u origin "$BACKUP_BRANCH":"$BACKUP_BRANCH"
  ok "Rama de respaldo subida: $BACKUP_BRANCH"
fi

# 3) Preguntar tipo de deploy
echo ""
echo "¿Qué tipo de deploy quieres hacer?"

# Calcular versiones posibles
PATCH_NEXT=$((PATCH + 1))
MINOR_NEXT=$((MINOR + 1))
MAJOR_NEXT=$((MAJOR + 1))

PATCH_VERSION="${MAJOR}.${MINOR}.${PATCH_NEXT}"
MINOR_VERSION="${MAJOR}.${MINOR_NEXT}.0"
MAJOR_VERSION="${MAJOR_NEXT}.0.0"

echo "  1) PATCH  => ${APP_VERSION} -> ${PATCH_VERSION}"
echo "  2) MINOR  => ${APP_VERSION} -> ${MINOR_VERSION}"
echo "  3) MAJOR  => ${APP_VERSION} -> ${MAJOR_VERSION}"
read -rp "Elige 1/2/3: " choice

case "$choice" in
  1)
    NEW_MAJOR="$MAJOR"
    NEW_MINOR="$MINOR"
    NEW_PATCH=$((PATCH + 1))
    ;;
  2)
    NEW_MAJOR="$MAJOR"
    NEW_MINOR=$((MINOR + 1))
    NEW_PATCH=0
    ;;
  3)
    NEW_MAJOR=$((MAJOR + 1))
    NEW_MINOR=0
    NEW_PATCH=0
    ;;
  *)
    err "Opción no válida."
    ;;
esac

NEW_VERSION="${NEW_MAJOR}.${NEW_MINOR}.${NEW_PATCH}"

# 4) Actualizar APP_VERSION en .env (respetando portabilidad sed/awk)
info "Actualizando .env: APP_VERSION=$APP_VERSION -> $NEW_VERSION"
cp .env .env.backup

# Reemplazo seguro con awk (evita sed -i diferencias entre GNU/BSD)
awk -v newv="$NEW_VERSION" '
BEGIN{done=0}
{
  if (!done && $0 ~ /^[[:space:]]*APP_VERSION=/) {
    print "APP_VERSION=" newv
    done=1
  } else {
    print $0
  }
}
END{
  if (!done) {
    # Si no existía la línea (caso raro porque ya validamos), la agregamos
    print "APP_VERSION=" newv
  }
}
' .env.backup > .env

ok "APP_VERSION ahora es $NEW_VERSION"

# 5) git pull para traer cambios nuevos en la rama actual
CURRENT_BRANCH="$(git rev-parse --abbrev-ref HEAD)"
info "Haciendo git pull --rebase en la rama actual ($CURRENT_BRANCH)…"
git pull --rebase || {
  echo "⚠️  Hubo conflictos al hacer pull. Revisa el estado y resuélvelos manualmente."
  exit 1
}

ok "Listo. Respaldo: $BACKUP_BRANCH | Versión actualizada: $NEW_VERSION | Pull completado en $CURRENT_BRANCH"
