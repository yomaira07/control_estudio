#!/usr/bin/env bash
set -uo pipefail

PROYECTO="${1:-}"
if [[ -z "$PROYECTO" || ! -d "$PROYECTO" ]]; then
  echo "❌ Uso: $0 /ruta/al/proyecto-ci3"
  exit 1
fi

cd "$PROYECTO" || exit 1
FECHA=$(date +"%Y-%m-%d %H:%M:%S")
ARCHIVO="/var/www/html/control_estudio/temporal/tmp/auditoria_ci3_$(date +%Y%m%d_%H%M%S).md"

count_php()  { find "$1" -name "*.php" 2>/dev/null | wc -l | tr -d ' '; }
lines_php()  { find "$1" -name "*.php" -exec cat {} + 2>/dev/null | wc -l | tr -d ' '; }
list_php()   { find "$1" -name "*.php" 2>/dev/null | sed "s|$PROYECTO/||" | sort; }
has_grep()   { grep -rql "$1" application/ 2>/dev/null && echo "✅ Sí" || echo "❌ No"; }

CI_VERSION="No detectada"
if [[ -f system/core/CodeIgniter.php ]]; then
  CI_VERSION=$(grep -oP "CI_VERSION',\s*'\K[^']+" system/core/CodeIgniter.php 2>/dev/null || echo "No detectada")
fi

DB_INFO=$(grep -A 12 "active_group" application/config/database.php 2>/dev/null \
  | grep -E "hostname|username|database|dbdriver|char_set" \
  | sed -E "s/(password.*=).*/\1 '***OCULTO***';/" \
  | sed 's/^[[:space:]]*//')

{
echo "# Auditoría del proyecto CodeIgniter 3"
echo ""
echo "- **Ruta:** \`$PROYECTO\`"
echo "- **Fecha de auditoría:** $FECHA"
echo "- **Versión CodeIgniter:** $CI_VERSION"
echo ""
echo "---"
echo ""
echo "## 1. Estructura general"
echo ""
echo '```'
ls -la | head -30
echo '```'
echo ""
echo "### Directorios principales de \`application/\`"
echo ""
echo '```'
find application -maxdepth 2 -type d 2>/dev/null | sort
echo '```'
echo ""
echo "---"
echo ""
echo "## 2. Métricas de archivos"
echo ""
echo "| Recurso | Archivos .php | Líneas aprox. |"
echo "|---|---|---|"
for d in controllers models views libraries helpers hooks config; do
  path="application/$d"
  [[ -d "$path" ]] && printf "| %s | %s | %s |\n" "$d" "$(count_php $path)" "$(lines_php $path)"
done
echo ""
TOTAL_FILES=$(find application -name "*.php" 2>/dev/null | wc -l | tr -d ' ')
TOTAL_LINES=$(find application -name "*.php" -exec cat {} + 2>/dev/null | wc -l | tr -d ' ')
echo "- Archivos .php en application/: **$TOTAL_FILES**"
echo "- Líneas totales: **$TOTAL_LINES**"
echo ""
echo "---"
echo ""
echo "## 3. Controladores"
echo ""
echo '```'
list_php application/controllers
echo '```'
echo ""
echo "## 4. Modelos"
echo ""
echo '```'
list_php application/models
echo '```'
echo ""
echo "## 5. Librerías personalizadas"
echo ""
echo '```'
list_php application/libraries
echo '```'
echo ""
echo "## 6. Helpers personalizados"
echo ""
echo '```'
list_php application/helpers
echo '```'
echo ""
echo "## 7. Configuración de base de datos (sin credenciales)"
echo ""
echo '```'
echo "$DB_INFO"
echo '```'
echo ""
echo "---"
echo ""
echo "## 8. Características detectadas"
echo ""
echo "| Característica | Detectado | Evidencia |"
echo "|---|---|---|"
printf "| Sesiones | %s | \`\$this->session\` |\n" "$(has_grep '\$this->session')"
printf "| Autenticación / Login | %s | login/logged_in |\n" "$(has_grep 'logged_in\|is_logged\|function login')"
printf "| Subida de archivos | %s | \`\$this->upload\` |\n" "$(has_grep '\$this->upload')"
printf "| Envío de correos | %s | \`\$this->email\` |\n" "$(has_grep '\$this->email')"
printf "| cURL / APIs externas | %s | curl_*, http |\n" "$(has_grep 'curl_\|file_get_contents(\"http')"
printf "| Generación de PDFs | %s | TCPDF/FPDF/Dompdf/Mpdf |\n" "$(has_grep 'TCPDF\|FPDF\|Dompdf\|DOMPDF\|Mpdf')"
printf "| Generación de Excel | %s | PHPExcel/PhpSpreadsheet |\n" "$(has_grep 'PHPExcel\|PhpSpreadsheet\|Spreadsheet')"
printf "| Colas / Cron | %s | controllers con 'cron' |\n" "$(ls application/controllers 2>/dev/null | grep -iq cron && echo '✅ Sí' || echo '❌ No')"
printf "| WebSockets | %s | Ratchet/socket_* |\n" "$(has_grep 'Ratchet\|WebSocket\|socket_')"
printf "| Multi-idioma | %s | application/language/ |\n" "$([[ -d application/language ]] && echo '✅ Sí' || echo '❌ No')"
printf "| Migraciones BD | %s | application/migrations/ |\n" "$([[ -d application/migrations ]] && echo '✅ Sí' || echo '❌ No')"
echo ""
echo "---"
echo ""
echo "## 9. Hooks configurados"
echo ""
echo '```'
grep -v "^\s*//" application/config/hooks.php 2>/dev/null | grep -v "^\s*\*" | grep -v "^\s*$" | head -30
echo '```'
echo ""
echo "## 10. Rutas personalizadas"
echo ""
echo '```'
grep -v "^\s*//" application/config/routes.php 2>/dev/null | grep "\$route" | head -60
echo '```'
echo ""
echo "---"
echo ""
echo "## 11. Observaciones y riesgos"
echo ""
echo "### Librerías que extienden CI_*"
echo ""
echo '```'
grep -l "extends CI_" application/libraries/*.php 2>/dev/null | sed "s|$PROYECTO/||" || echo "Ninguna"
echo '```'
echo ""
echo "### Consultas SQL directas"
echo ""
SQL_COUNT=$(grep -rl '\$this->db->query' application/ 2>/dev/null | wc -l | tr -d ' ')
echo "Archivos con \`\$this->db->query\`: **$SQL_COUNT**"
echo ""
echo '```'
grep -rl '\$this->db->query' application/ 2>/dev/null | sed "s|$PROYECTO/||" | head -30
echo '```'
echo ""
echo "### Uso de input->post/get (afecta migración a CI4)"
echo ""
grep -rl '\$this->input->post\|\$this->input->get' application/ 2>/dev/null | sed "s|$PROYECTO/||" | head -30
echo ""
echo "---"
echo ""
echo "_Documento generado automáticamente por auditoria_ci3.sh_"
} > "$ARCHIVO"

echo "✅ Auditoría completada"
echo "📄 Documento generado: $ARCHIVO"
