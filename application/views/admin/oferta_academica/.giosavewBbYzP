<?php
header("Pragma: public");
header("Expires: 0");
$filename = "oferta_academica_estructurada.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
print "\xEF\xBB\xBF"; // UTF-8 BOM
?>

<table border="1" cellpadding="5" cellspacing="0">
<thead>
    <tr>
        <th colspan="5" bgcolor="#000080" style="color: #ffffff; text-align: center; font-size: 14pt; font-weight: bold;">
            OFERTA ACADÉMICA ESTRUCTURADA
        </th>
    </tr>
</thead>
<tbody>

<?php
// Función para obtener el texto de la modalidad
function getModoTexto($modo) {
    if ($modo == '1') return 'PRESENCIAL';
    elseif ($modo == '2') return 'A DISTANCIA';
    elseif ($modo == '3') return 'SEMIPRESENCIAL';
    return 'OTRO';
}

// Función para obtener el color según la modalidad
function getColorModalidad($modo) {
    switch($modo) {
        case '1': // PRESENCIAL
            return '#1B4F72'; // Azul oscuro
        case '2': // A DISTANCIA
            return '#7D3C98'; // Morado
        case '3': // SEMIPRESENCIAL
            return '#1E8449'; // Verde oscuro
        default: // OTRO
            return '#717D7E'; // Gris
    }
}

// Función para obtener el color de fondo del título según la modalidad
function getBgColorModalidad($modo) {
    switch($modo) {
        case '1': // PRESENCIAL
            return '#D4E6F1'; // Azul muy claro
        case '2': // A DISTANCIA
            return '#E8DAEF'; // Morado muy claro
        case '3': // SEMIPRESENCIAL
            return '#D5F5E3'; // Verde muy claro
        default: // OTRO
            return '#F2F3F4'; // Gris muy claro
    }
}

// Función para obtener el número de día de la semana (orden cronológico)
function getOrdenDia($dia) {
    $dias = [
        'LUNES' => 1,
        'MARTES' => 2,
        'MIÉRCOLES' => 3,
        'MIERCOLES' => 3,
        'JUEVES' => 4,
        'VIERNES' => 5,
        'SÁBADO' => 6,
        'SABADO' => 6,
        'SÁBADOS' => 6,
        'SABADOS' => 6
    ];
    
    $diaUpper = strtoupper(trim($dia));
    return isset($dias[$diaUpper]) ? $dias[$diaUpper] : 999;
}

// Agrupar datos
$grupos = [];
foreach ($listado as $item) {
    $modoTexto = getModoTexto($item->modo);
    $key = $modoTexto . '|' . $item->programa . '|' . $item->trim . '|' . $item->desseccion;
    $grupos[$key][] = $item;
}

// Definir orden personalizado de modalidades
$ordenModalidad = [
    'PRESENCIAL' => 1,
    'SEMIPRESENCIAL' => 2,
    'A DISTANCIA' => 3,
    'OTRO' => 4
];

// Función de comparación personalizada para ordenar grupos
function compararGrupos($a, $b) {
    global $ordenModalidad;
    
    $partesA = explode('|', $a);
    $partesB = explode('|', $b);
    
    // Ordenar por Modalidad (según orden personalizado)
    $modoA = $partesA[0];
    $modoB = $partesB[0];
    
    $ordenA = isset($ordenModalidad[$modoA]) ? $ordenModalidad[$modoA] : 999;
    $ordenB = isset($ordenModalidad[$modoB]) ? $ordenModalidad[$modoB] : 999;
    
    if ($ordenA != $ordenB) {
        return $ordenA - $ordenB;
    }
    
    // Ordenar por Programa
    $cmpPrograma = strcmp($partesA[1], $partesB[1]);
    if ($cmpPrograma != 0) {
        return $cmpPrograma;
    }
    
    // Ordenar por Trimestre (numérico)
    $trimA = intval($partesA[2]);
    $trimB = intval($partesB[2]);
    if ($trimA != $trimB) {
        return $trimA - $trimB;
    }
    
    // Ordenar por Sección
    return strcmp($partesA[3], $partesB[3]);
}

// Reordenar grupos usando la función de comparación
uksort($grupos, 'compararGrupos');

// Función para ordenar los items dentro de cada grupo por día
function ordenarPorDia($items) {
    usort($items, function($a, $b) {
        $ordenA = getOrdenDia($a->desdia_clase);
        $ordenB = getOrdenDia($b->desdia_clase);
        return $ordenA - $ordenB;
    });
    return $items;
}

foreach ($grupos as $key => $items) {
    // Ordenar los items por día de clase
    $items = ordenarPorDia($items);
    
    $first = $items[0];
    $programa = $first->programa;
    $trimestre = $first->trim;
    $periodo = $first->periodo;
    $modo = getModoTexto($first->modo);
    $modoColor = getColorModalidad($first->modo);
    $bgColor = getBgColorModalidad($first->modo);
    $seccion = $first->desseccion;

    // Título del grupo con color según modalidad
    echo "<tr>";
    echo "<td colspan='5' bgcolor='$bgColor' style='font-weight: bold; font-size: 12pt; color: $modoColor;'>";
    echo "[" . strtoupper($modo) . "] " . strtoupper($programa) . " - " . strtoupper($periodo) . " - " . strtoupper($trimestre) . " TRIMESTRE - SECCIÓN " . strtoupper($seccion);
    echo "</td>";
    echo "</tr>";

    // Encabezados de columnas con color según modalidad
    echo "<tr bgcolor='$modoColor' style='font-weight: bold; text-align: center; color: #ffffff;'>";
    echo "<td>Día</td>";
    echo "<td>Horario</td>";
    echo "<td>Unidad Curricular</td>";
    echo "<td>Créditos</td>";
    echo "<td>Docente</td>";
    echo "</tr>";

    // Filas de datos
    $contador = 0;
    foreach ($items as $item) {
        $docente = trim($item->primer_nombre . ' ' . $item->segundo_nombre . ' ' . $item->primer_apellido . ' ' . $item->segundo_apellido);
        if (empty(trim($docente))) $docente = '-';

        // Colores alternados para filas (usando tonos más claros según modalidad)
        if ($first->modo == '1') { // PRESENCIAL
            $bgcolorFila = ($contador % 2 == 0) ? '#FFFFFF' : '#D4E6F1';
        } elseif ($first->modo == '2') { // A DISTANCIA
            $bgcolorFila = ($contador % 2 == 0) ? '#FFFFFF' : '#E8DAEF';
        } elseif ($first->modo == '3') { // SEMIPRESENCIAL
            $bgcolorFila = ($contador % 2 == 0) ? '#FFFFFF' : '#D5F5E3';
        } else { // OTRO
            $bgcolorFila = ($contador % 2 == 0) ? '#FFFFFF' : '#F2F3F4';
        }
        
        echo "<tr bgcolor='$bgcolorFila'>";
        echo "<td>" . htmlspecialchars($item->desdia_clase) . "</td>";
        echo "<td>" . htmlspecialchars($item->horario) . "</td>";
        echo "<td>" . htmlspecialchars($item->unidad_curricular) . "</td>";
        echo "<td align='center'>" . htmlspecialchars($item->unidades_creditos) . "</td>";
        echo "<td>" . htmlspecialchars($docente) . "</td>";
        echo "</tr>";
        
        $contador++;
    }

    echo "<tr><td colspan='5'>&nbsp;</td></tr>";
}
?>

</tbody>
</table>
