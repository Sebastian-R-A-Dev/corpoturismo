<?php
function tokenBuild($email, $razon, $contra, $fecha): string {
    return "$email;$razon;$contra;$fecha";
}
?>