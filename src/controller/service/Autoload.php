<?php

class Autoload {

    private $arquivos;

    public function __construct() {

        spl_autoload_register(array($this, 'pastas'));
    }

    private function pastas($arquivos) {

        $this->$arquivos = array('src/controller/service/' . $arquivos . '.php');

        foreach ($arquivos as $arquivo) {

            if (file_exists($arquivo)) {

                require $arquivo;
            }
        }
    }
}
new Autoload;

?>