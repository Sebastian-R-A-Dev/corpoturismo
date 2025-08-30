<?php
function resizeImage($file, $max_width = 800, $max_height = 800, $output_path = null)
{
    // Obtener datos de la imagen original
    list($width, $height, $type) = getimagesize($file);

    // Calcular proporción
    $ratio = $width / $height;
    if ($max_width / $max_height > $ratio) {
        $new_width = $max_height * $ratio;
        $new_height = $max_height;
    } else {
        $new_width = $max_width;
        $new_height = $max_width / $ratio;
    }

    // Crear imagen desde el archivo
    switch ($type) {
        case IMAGETYPE_JPEG:
            $src = imagecreatefromjpeg($file);
            break;
        case IMAGETYPE_PNG:
            $src = imagecreatefrompng($file);
            break;
        case IMAGETYPE_GIF:
            $src = imagecreatefromgif($file);
            break;
        default:
            return false; // tipo no soportado
    }

    // Crear el lienzo nuevo
    $dst = imagecreatetruecolor($new_width, $new_height);

    // Mantener transparencia si es PNG o GIF
    if ($type == IMAGETYPE_PNG || $type == IMAGETYPE_GIF) {
        imagecolortransparent($dst, imagecolorallocatealpha($dst, 0, 0, 0, 127));
        imagealphablending($dst, false);
        imagesavealpha($dst, true);
    }

    // Redimensionar
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

    // Guardar en destino (si no hay, reemplaza original)
    if (!$output_path) {
        $output_path = $file;
    }

    switch ($type) {
        case IMAGETYPE_JPEG:
            imagejpeg($dst, $output_path, 85); // calidad 85%
            break;
        case IMAGETYPE_PNG:
            imagepng($dst, $output_path, 6);
            break;
        case IMAGETYPE_GIF:
            imagegif($dst, $output_path);
            break;
    }

    imagedestroy($src);
    imagedestroy($dst);

    return $output_path;
}
?>