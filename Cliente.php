<?php

    class Cliente {

        private $nombre;
        private $cajaAhorro;
        private $cuentaCorriente;

        public function __construct($nombre)
        {
            $this->nombre = $nombre;
            $this->cajaAhorro = new CajaAhorro();
            $this->cuentaCorriente = new CuentaCorriente();
        }

        /**
         * Get the value of nombre
         */ 
        public function getNombre()
        {
            return $this->nombre;
        }

        public function extraerCC($monto) {
            $this->cuentaCorriente->extraer($monto);
        }

        public function extraerCA($monto) {
            $this->cajaAhorro->extraer($monto);
        }

        public function depositarCC($monto) {
            $this->cuentaCorriente->depositar($monto);
        }

        public function depositarCA($monto) {
            $this->cajaAhorro->depositar($monto);
        }

        public function mostrar() {
            echo "Nombre : ".$this->getNombre().PHP_EOL;
            echo "Cuenta corriente: ";
            $this->cuentaCorriente->mostrar();
            echo "Caja de ahorro: ";
            $this->cajaAhorro->mostrar();
        }        
        


    }