<?php

class Validador {

            private $anormalidades;

            private function __contruct() {

                            $this->anormalidades = array();
            }

            private function validarNIF(nrNIF) {

                            if (strlen(nrNIF) == 9) {

                                        $caracteres = spliti("", nrNIF);
                                        foreach() {

                                                        //aqui
                                        }
                            } else {

                                        $this->preencherAnormalidades('NIF', 'O NIF informado não possui a quantidade de caracteres válidos (9)!');
                            }
            }

            private function preencherAnormalidades($chave, $valor) {

                            $this->anormalidades[$chave] = valor;
            }
}

?>