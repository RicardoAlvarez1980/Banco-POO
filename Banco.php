<?php

    class Banco {

        private $nombre;
        private $clientes;

        public function __construct($nombre)
        {
            $this->nombre = $nombre;
            $this->clientes = [];
        }

        /**
         * Get the value of nombre
         */ 
        public function getNombre()
        {
            return $this->nombre;
        }

        public function agregarCliente($cliente) {
            $this->clientes[] = $cliente;
        }

        public function buscarCliente($nombre) {

            foreach ($this->clientes as $cliente) {
                if ($cliente->getNombre() == $nombre) {
                    return $cliente;
                }
            }

            return null;
        }

        public function mostrar() {
            echo "Banco : ".$this->getNombre().PHP_EOL;
            foreach ($this->clientes as $cliente) {
                $cliente->mostrar(); 
                echo PHP_EOL;                
            }        

        }

        public function getCantidad() {

            return count($this->clientes);
        }

        
    }