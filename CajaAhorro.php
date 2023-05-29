<?php

class CajaAhorro extends Cuenta
{

    public function extraccionPermitida($monto) {
        if ($this->saldo - $monto >= 0) {
            return true; 
        }

        return false;
    }
}
