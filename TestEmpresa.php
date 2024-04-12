<?php
include_once 'Cliente.php';
include_once 'Moto.php';
include_once 'Venta.php';
include 'Empresa.php';

$objCliente1 = new Cliente ("juan","lopez",false,"DNI",37474691);
$objCliente2 = new Cliente ("damian","gomez",false,"DNI",12345678);

$objMoto1 = new Moto (11,2230000,2022,"Benelli Imperiale 400",0.85,true);
$objMoto2 = new Moto (12, 584000,2021,"Zanella Zr 150 Ohc",0.70,true);
$objMoto3 = new Moto (13,999900,2023,"Zanella Patagonian Eagle 250",0.55,false);

$coleccionMotos = [$objMoto1, $objMoto2, $objMoto3];
$coleccionClientes =[$objCliente1,$objCliente2];
$coleccionVentas = [];
$empresa1 = new Empresa ("Alta Gama","Av Argentina 123",$coleccionClientes,$coleccionMotos,$coleccionVentas);

$colCodigoMoto = [11,12,13];
echo $empresa1->registrarVenta($colCodigoMoto,$objCliente2) . "\n";
$colCodigo2 = [0];
echo $empresa1->registrarVenta($colCodigo2,$objCliente2) . "\n";
$colCodigo3 = [3];
echo $empresa1->registrarVenta($colCodigo3,$objCliente2) . "\n";
print_r ($empresa1->retornarVentasXCliente("DNI",37474691));
print_r ($empresa1->retornarVentasXCliente("DNI",12345678));
echo $empresa1;


