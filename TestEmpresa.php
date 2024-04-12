<?php
include_once 'Cliente.php';
include_once 'Moto.php';
include_once 'Venta.php';
include 'Empresa.php';

//1. Cree 2 instancias de la clase Cliente: $objCliente1, $objCliente2
$objCliente1 = new Cliente ("juan","lopez",false,"DNI",37474691);
$objCliente2 = new Cliente ("damian","gomez",false,"DNI",12345678);

//2. Cree 3 objetos Motos con la información visualizada en la tabla: código, costo, año fabricación, descripción, porcentaje incremento anual, activo.
$objMoto1 = new Moto (11,2230000,2022,"Benelli Imperiale 400",0.85,true);
$objMoto2 = new Moto (12, 584000,2021,"Zanella Zr 150 Ohc",0.70,true);
$objMoto3 = new Moto (13,999900,2023,"Zanella Patagonian Eagle 250",0.55,false);

//4. Se crea un objeto Empresa con la siguiente información: denominación =” Alta Gama”, dirección= “Av Argenetina 123”, colección de motos= [$obMoto1, $obMoto2, $obMoto3] , colección de clientes [$objCliente1, $objCliente2 ], la colección de ventas realizadas=[].
$coleccionMotos = [$objMoto1, $objMoto2, $objMoto3];
$coleccionClientes =[$objCliente1,$objCliente2];
$coleccionVentas = [];
$empresa1 = new Empresa ("Alta Gama","Av Argentina 123",$coleccionClientes,$coleccionMotos,$coleccionVentas);

//5. Invocar al método registrarVenta($colCodigosMoto, $objCliente) de la Clase Empresa donde el $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de códigos de motos es la siguiente [11,12,13]. Visualizar el resultado obtenido.
$colCodigoMoto = [11,12,13];
echo $empresa1->registrarVenta($colCodigoMoto,$objCliente2) . "\n";

//6. Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de códigos de motos es la siguiente [0]. Visualizar el resultado obtenido.
$colCodigo2 = [0];
echo $empresa1->registrarVenta($colCodigo2,$objCliente2) . "\n";

//7. Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de códigos de motos es la siguiente [2]. Visualizar el resultado obtenido.
$colCodigo3 = [2];
echo $empresa1->registrarVenta($colCodigo3,$objCliente2) . "\n";

//8. Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento se corresponden con el tipo y número de documento del $objCliente1
print_r ($empresa1->retornarVentasXCliente("DNI",37474691));

//9. Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento se corresponden con el tipo y número de documento del $objCliente2
print_r ($empresa1->retornarVentasXCliente("DNI",12345678));

//10. Realizar un echo de la variable Empresa creada en 2
echo $empresa1;





