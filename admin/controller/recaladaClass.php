<?php 
class Prueba {

    private string $nombre;
    private string $apellido;

    public function getNombre() {
        return $this->nombre;
    }

    /**
     * @version first version test
     */
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
}


$test = new Prueba();
$test->setNombre("data");
$test->getNombre();
?>
