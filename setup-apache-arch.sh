#!/usr/bin/env bash
# setup-apache-arch.sh
# Configure Apache (httpd) + php-fpm on Arch Linux to serve this repo at http://localhost/.
# Arch equivalent of reinstall-apache2.sh. Idempotent — safe to re-run.
# Run with: sudo bash setup-apache-arch.sh

set -euo pipefail

HTTP_USER="http"
PHP_FPM_SOCK="/run/php-fpm/php-fpm.sock"
HTTPD_CONF="/etc/httpd/conf/httpd.conf"
EXTRA_CONF="/etc/httpd/conf/extra/php-website.conf"
MARKER="# --- php-website (setup-apache-arch.sh) ---"

if [ "$(id -u)" -ne 0 ]; then
  echo "❌ Please run as root:  sudo bash setup-apache-arch.sh"
  exit 1
fi

# --- Resolve this repo's absolute path (the directory containing this script) ---
SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
SITE_DIR="$SCRIPT_DIR"
echo "📁 Serving from: $SITE_DIR"

# --- Install Apache + php-fpm (php CLI is assumed already installed) ---
echo "📦 Installing apache + php-fpm..."
pacman -S --needed --noconfirm apache php-fpm acl

# --- Enable required Apache modules in httpd.conf (uncomment if present) ---
echo "⚙️  Enabling Apache modules (rewrite, proxy, proxy_fcgi)..."
for mod in rewrite_module:mod_rewrite proxy_module:mod_proxy proxy_fcgi_module:mod_proxy_fcgi; do
  name="${mod%%:*}"; so="${mod##*:}"
  sed -i "s|^#\(LoadModule ${name} modules/${so}.so\)|\1|" "$HTTPD_CONF"
done

# --- Write the site config (DocumentRoot, .htaccess support, PHP handler) ---
echo "📝 Writing $EXTRA_CONF ..."
cat > "$EXTRA_CONF" <<EOF
# Managed by setup-apache-arch.sh — serves the PHP-Website repo.
ServerName localhost

DocumentRoot "${SITE_DIR}"
DirectoryIndex index.php index.html

<Directory "${SITE_DIR}">
    Options -MultiViews +FollowSymLinks
    AllowOverride All
    Require all granted
</Directory>

# Route .php requests to php-fpm over its unix socket.
<FilesMatch "\.php\$">
    SetHandler "proxy:unix:${PHP_FPM_SOCK}|fcgi://localhost/"
</FilesMatch>
EOF

# --- Include our config from httpd.conf (only once) ---
if ! grep -qF "$MARKER" "$HTTPD_CONF"; then
  echo "🔗 Adding Include to $HTTPD_CONF ..."
  {
    echo ""
    echo "$MARKER"
    echo "Include conf/extra/php-website.conf"
  } >> "$HTTPD_CONF"
else
  echo "🔗 Include already present in httpd.conf (skipping)."
fi

# --- Grant the http user traverse/read access to the repo under /home ---
echo "🔓 Granting '$HTTP_USER' access to the site path via ACLs..."
dir="$SITE_DIR"
while [ "$dir" != "/" ]; do
  setfacl -m "u:${HTTP_USER}:x" "$dir" || true
  dir="$(dirname "$dir")"
done
setfacl -R -m "u:${HTTP_USER}:rX" "$SITE_DIR"
setfacl -R -d -m "u:${HTTP_USER}:rX" "$SITE_DIR"   # default ACL for future files

# --- Validate config, then enable + (re)start services ---
echo "🧪 Testing Apache config..."
httpd -t

echo "🚀 Enabling and starting php-fpm + httpd..."
systemctl enable --now php-fpm
systemctl enable --now httpd
systemctl restart php-fpm
systemctl restart httpd

echo ""
echo "✅ Done. Visit: http://localhost/"
echo "   DocumentRoot: $SITE_DIR"
