<?php
function scriptForEmptyBdUsers()
{
    try {
        //code...
        include "model/conexion_bd.php";
        include "home/session/functions/encriptar.php";
        $clave = "c2ViYXN0aWFu";

        date_default_timezone_set("America/Bogota");
        $time = date("Y-m-d");

        $imagen_nuevo_usuario_por_defecto = 'imagen_por_defecto_usuario.png';

        $sql = "SELECT COUNT(*) FROM cedula_rnt";
        $query = $conexion->prepare($sql);
        $query->execute();

        $totalCedulas = $query->fetchColumn();

        $query->closeCursor();


        if ($totalCedulas == 0) {
            // Cedulas y RNT automáticos
            $cedulas = [
                ['id' => 1, 'cedula' => '10001', 'rnt' => 'RNT001'],
                ['id' => 2, 'cedula' => '10002', 'rnt' => 'RNT002'],
                ['id' => 3, 'cedula' => '10003', 'rnt' => 'RNT003'],
                ['id' => 4, 'cedula' => '10004', 'rnt' => 'RNT004'],
            ];

            foreach ($cedulas as $c) {
                $sql = "INSERT INTO cedula_rnt (id, cedula, rnt) 
                VALUES (:id, :cedula, :rnt)";
                $query = $conexion->prepare($sql);
                $query->bindParam(':id', $c['id']);
                $query->bindParam(':cedula', $c['cedula']);
                $query->bindParam(':rnt', $c['rnt']);
                $query->execute();
                $query->closeCursor();
            }

            // Usuarios (3 normales y 1 admin)
            $usuarios = [
                [
                    'loginId' => 'admin@correo.com',
                    'cedula_rnt_id' => 1,
                    'er_nombre' => 'Admin',
                    'sec_nombre' => 'Admin',
                    'er_apellido' => 'Principal',
                    'sec_apellido' => 'Principal',
                    'contrasena' => encrypt('admin123', $clave),
                    'imagen_guia' => $imagen_nuevo_usuario_por_defecto,
                    'rol' => 'ADMIN',
                    'usuarioVerficado' => 'SI',
                    'f_creacion' => $time
                ],
                [
                    'loginId' => 'user1@correo.com',
                    'cedula_rnt_id' => 2,
                    'er_nombre' => 'Juan',
                    'sec_nombre' => 'Carlos',
                    'er_apellido' => 'Gomez',
                    'sec_apellido' => 'Diaz',
                    'contrasena' => encrypt('user123', $clave),
                    'imagen_guia' => $imagen_nuevo_usuario_por_defecto,
                    'rol' => 'USER',
                    'usuarioVerficado' => 'SI',
                    'f_creacion' => $time
                ],
                [
                    'loginId' => 'user2@correo.com',
                    'cedula_rnt_id' => 3,
                    'er_nombre' => 'Maria',
                    'sec_nombre' => 'Camila',
                    'er_apellido' => 'Lopez',
                    'sec_apellido' => 'Diaz',
                    'contrasena' => encrypt('user123', $clave),
                    'imagen_guia' => $imagen_nuevo_usuario_por_defecto,
                    'rol' => 'USER',
                    'usuarioVerficado' => 'SI',
                    'f_creacion' => $time
                ],
                [
                    'loginId' => 'user3@correo.com',
                    'cedula_rnt_id' => 4,
                    'er_nombre' => 'Pedro',
                    'sec_nombre' => 'Luis',
                    'er_apellido' => 'Martinez',
                    'sec_apellido' => 'Martelo',
                    'contrasena' => encrypt('user123', $clave),
                    'imagen_guia' => $imagen_nuevo_usuario_por_defecto,
                    'rol' => 'USER',
                    'usuarioVerficado' => 'SI',
                    'f_creacion' => $time
                ]
            ];

            foreach ($usuarios as $u) {

                try {
                    //code...
                    $sql = "INSERT INTO usuario 
                           (loginId, cedula_rnt_id, er_nombre, sec_nombre, er_apellido, sec_apellido, contrasena, imagen_guia, rol, usuarioVerficado, f_creacion) 
                           VALUES (:loginId, :cedula_rnt_id, :er_nombre, :sec_nombre, :er_apellido, :sec_apellido, :contrasena, :imagen_guia, :rol, :usuarioVerficado, :f_creacion)";
                    $query = $conexion->prepare($sql);
                    $query->bindParam(':loginId', $u['loginId']);
                    $query->bindParam(':cedula_rnt_id', $u['cedula_rnt_id']);
                    $query->bindParam(':er_nombre', $u['er_nombre']);
                    $query->bindParam(':sec_nombre', $u['sec_nombre']);
                    $query->bindParam(':er_apellido', $u['er_apellido']);
                    $query->bindParam(':sec_apellido', $u['sec_apellido']);
                    $query->bindParam(':contrasena', $u['contrasena']);
                    $query->bindParam(':imagen_guia', $u['imagen_guia']);
                    $query->bindParam(':rol', $u['rol']);
                    $query->bindParam(':usuarioVerficado', $u['usuarioVerficado']);
                    $query->bindParam(':f_creacion', $u['f_creacion']);
                    $query->execute();
                    $query->closeCursor();
                } catch (\Throwable $th) {
                    echo $th->getMessage();
                    throw $th;
                }
            }
        }

    } catch (\Throwable $th) {
        echo $th->getMessage();
        throw $th;
    }
}

scriptForEmptyBdUsers();
?>