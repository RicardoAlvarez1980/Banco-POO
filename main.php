<?php
    require_once('Banco.php');
    require_once('Cliente.php');
    require_once('Cuenta.php');
    require_once('CuentaCorriente.php');
    require_once('CajaAhorro.php');


    function writeln($texto) {
        echo ($texto);
        echo(PHP_EOL);
    }

    function agregarCliente($banco) {
        writeln ('Agregar'); 
        writeln ('=======');
        $nombre = readline("Nombre: ");

        $banco->agregarCliente(new Cliente($nombre));

        writeln ('Hay'.$banco->getCantidad().' clientes'); 
        writeln ('==============================');
    }

    function depositarCC($bancoAlegria) {
        writeln ('Depositar en CC'); 
        writeln ('===============');
        $nombre = readline("Nombre del cliente: ");

        $cliente = $bancoAlegria->buscarCliente($nombre);
        if ($cliente != null) {
            $monto = readline("Ingrese monto a depositar: ");
            $cliente->depositarCC($monto);
        } else {
            writeln ('No existe cliente');
        }
    }

    function depositarCA($bancoAlegria) {
        writeln ('Depositar en CA'); 
        writeln ('===============');
        $nombre = readline("Nombre del cliente: ");

        $cliente = $bancoAlegria->buscarCliente($nombre);
        if ($cliente != null) {
            $monto = readline("Ingrese monto a depositar: ");
            $cliente->depositarCA($monto);
        } else {
            writeln ('No existe cliente');
        }
    }    

    function extraerCC($bancoAlegria) {
        writeln ('Extraer en CC'); 
        writeln ('===============');
        $nombre = readline("Nombre del cliente: ");

        $cliente = $bancoAlegria->buscarCliente($nombre);
        if ($cliente != null) {
            $monto = readline("Ingrese monto a extraer: ");
            $cliente->extraerCC($monto);
        } else {
            writeln ('No existe cliente');
        }
    }

    function extraerCA($bancoAlegria) {
        writeln ('Extraer en CA'); 
        writeln ('===============');
        $nombre = readline("Nombre del cliente: ");

        $cliente = $bancoAlegria->buscarCliente($nombre);
        if ($cliente != null) {
            $monto = readline("Ingrese monto a extraer: ");
            $cliente->extraerCA($monto);
        } else {
            writeln ('No existe cliente');
        }
    }

    function tranferir($bancoAlegria){
        writeln("Tranferir fondos en CA");
        writeln(!"================");
        $nombre_origen = readline("Nombre del Cliente Origen: ");
        $nombre_destino = readline("Nombre del Cliente Destino: ");
        
        $cliente_origen = $bancoAlegria->buscarCliente($nombre_origen);
        $cliente_destino = $bancoAlegria->buscarCliente($nombre_destino);

        if ($cliente_origen and $cliente_destino != null) {
            $monto = readline("Ingrese monto a tranferir en CA: ");
            $cliente_origen->extraerCA($monto);
            $cliente_destino->depositarCA($monto);
        } else {
            writeln ('No existe cliente');
        }       
        writeln("Monto de $monto Tranferido con Exito!");

    }
    function mostrarBanco($banco) {
        writeln ('Mostrar'); 
        writeln ('=======');
        $banco->mostrar();
        writeln ('=======');
    }

    $bancoAlegria = new Banco('De la Alegria');
    $linea = null;

    while ($linea != '0') {
        writeln ('Menu principal'); 
        writeln ('==============');
        writeln ('0-Salir');
        writeln ('1-Agregar Cliente');
        writeln ('2-Depositar en CC');
        writeln ('3-Depositar en CA');
        writeln ('4-Extraer en CC');
        writeln ('5-Extraer en CA');
        writeln("6-Tranferir en CA");
        writeln ('7-Mostrar');
        $linea = readline("opcion: ");

        switch ($linea) {
            case 1: agregarCliente($bancoAlegria); break;
            case 2: depositarCC($bancoAlegria); break;
            case 3: depositarCA($bancoAlegria); break;
            case 4: extraerCC($bancoAlegria); break;
            case 5: extraerCA($bancoAlegria); break;
            case 6: tranferir($bancoAlegria); break;
            case 7: mostrarBanco($bancoAlegria); break;
            default: writeln('Error');
        }
    }




    writeln('Gracias por operar con el banco');