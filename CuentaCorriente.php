<?php

class CuentaCorriente extends Cuenta
{
    private static $limite = -100000;

    public function extraccionPermitida($monto) {
        if ($this->saldo - $monto >= self::$limite) {
            return true; 
        }

        return false;
    }
}
