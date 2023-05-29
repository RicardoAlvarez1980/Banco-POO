<?php

abstract class Cuenta
{

    protected $saldo;

    public function __construct()
    {
        $this->saldo = 0;
    }

    /**
     * Get the value of saldo
     */
    public function getSaldo()
    {
        return $this->saldo;
    }

    public function depositar($monto)
    {

        $this->saldo = $this->saldo + $monto;
    }

    public function extraer($monto)
    {
        if ($this->extraccionPermitida($monto)) {
            $this->saldo = $this->saldo - $monto;
        } else {
            echo ("No permitido".PHP_EOL);
        } 
    }   
    
    public function mostrar()
    {
        echo ('El saldo es: $'.$this->getSaldo());
        echo (PHP_EOL); 
    }

    abstract public function extraccionPermitida($monto);
}
