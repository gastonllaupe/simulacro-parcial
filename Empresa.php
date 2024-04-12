<?php

class Empresa {

    private $denominacion;
    private $direccion;
    private $arrayClientes;
    private $arrayMotos;
    private $arrayVentas;

    public function __construct ($deno,$dire,$clientes,$motos,$ventas){
        $this->denominacion = $deno;
        $this->direccion = $dire;
        $this->arrayClientes = $clientes;
        $this->arrayMotos = $motos;
        $this->arrayVentas = $ventas;
    }

    public function getDenominacion (){
        return $this->denominacion;
    }
    
    public function getDireccion (){
        return $this->direccion;
    }

    
    public function getClientes (){
        return $this->arrayClientes;
    }

    
    public function getMotos (){
        return $this->arrayMotos;
    }

    public function getMotosIn ($i){
        return $this->arrayMotos[$i];
    }
    
    public function getVentas (){
        return $this->arrayVentas;
    }

    public function getVentasIn($i){
        return $this->arrayVentas[$i];
    }

    
    public function setDenominacion ($nuevo){
        $this->denominacion = $nuevo;
    }
    
    public function setDireccion ($nuevo){
        $this->direccion = $nuevo;
    }

    
    public function setClientes ($nuevo){
        $this->arrayClientes = $nuevo;
    }

    
    public function setMotos ($nuevo){
        $this->arrayMotos = $nuevo;
    }

    
    public function setVentas ($nuevo){
       $this->arrayVentas = $nuevo;
    }

/*Implementar el método retornarMoto($codigoMoto) que recorre la colección de motos de la Empresa y
retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro.*/
    public function retornarMoto($codigoMoto){
        $m = count($this->getMotos());
        $i = 0;
        $existe = false;
        $indiceMoto = -1;
        while ($i < $m && !$existe) {
            if ($this->getMotosIn($i)->getCodigo() == $codigoMoto){
                $existe = true;
                $indiceMoto = $i;
            }
            $i += 1;
        }
        return $indiceMoto;
    }

/* Implementar el método registrarVenta($colCodigosMoto, $objCliente) método que recibe por
parámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colección
se busca el objeto moto correspondiente al código y se incorpora a la colección de motos de la instancia
Venta que debe ser creada. Recordar que no todos los clientes ni todas las motos, están disponibles
para registrar una venta en un momento determinado.
El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la
venta*/
    public function registrarVenta($colCodigosMoto, $objCliente){
        $nuevaColMotos = [];
        $precioFinal = 0;
        if (!$objCliente->getBaja()){
            for($i=0; $i < count($colCodigosMoto); $i++){
            $moto = $this->retornarMoto($colCodigosMoto[$i]);
            if (!$moto == -1) {
            if ($this->getMotosIn($moto)->getActiva()){ 
                 array_push ($nuevaColMotos,$this->getMotosin($moto));
                 $precioFinal += $this->getMotosIn($moto)->darPrecioVenta();
                 
             }}
         }
        }
        $nuevaVenta = new Venta (7,"Abril",$objCliente,$nuevaColMotos,$precioFinal);
        $nuevoArregloVentas =$this->getVentas();
        array_push ($nuevoArregloVentas,$nuevaVenta);
        $this->setVentas($nuevoArregloVentas);
        return $precioFinal;
    }

/*Implementar el método retornarVentasXCliente($tipo,$numDoc) que recibe por parámetro el tipo y
número de documento de un Cliente y retorna una colección con las ventas realizadas al cliente.*/
    public function retornarVentasXCliente($tipo,$numDoc){
        $coleccionCliente = [];
        for($i=0; $i < count($this->getVentas()); $i++){
            $cliente = $this->getVentasIn($i)->getCliente();
            if ($cliente->getTipoDoc() == $tipo && $cliente->getNumDoc()==$numDoc){
                array_push($coleccionCliente,$this->getVentasIn($i));
            }
        }
        return $coleccionCliente;
    }

//para poder convertir a string el array de clientes
    public function datosClientes(){
        $coleccionCl = $this->getClientes();
        $texto = " ";
        for($i = 0; $i <count($coleccionCl); $i++){
            $texto .=  $coleccionCl[$i]->getNombre() . " " . $coleccionCl[$i]->getApellido() . " " . $coleccionCl[$i]->getBaja() . " " . $coleccionCl[$i]->getTipoDoc() . " " . $coleccionCl[$i]->getNumDoc() . "\n";
        }
        return $texto;

    }
//para poder convertir a string el array de motos
    public function datosMotos(){
        $coleccionM = $this->getMotos();
        $texto = " ";
        for($i = 0; $i <count($coleccionM); $i++){
            $texto .=  $coleccionM[$i]->getCodigo() . " " . $coleccionM[$i]->getCosto() . " " . $coleccionM[$i]->getAño() . " " . $coleccionM[$i]->getDescripcion() . " " . $coleccionM[$i]->getPorcentaje() . " " . $coleccionM[$i]->getActiva() . "\n";
        }
        return $texto;
    }

//para poder convertir a string el array de ventas, aunque faltan datos de motos y clientes
    public function datosVentas(){
        $coleccionV = $this->getVentas();
        $texto = " ";
        for($i = 0; $i <count($coleccionV); $i++){
            $clienteV = $coleccionV[$i]->getCliente();
            $motoV = $coleccionV[$i]->getMotos();
            $texto .=  $coleccionV[$i]->getNumero() . " " . $coleccionV[$i]->getFecha() . " " . $coleccionV[$i]->getPrecio() . "\n" ; 
    }
    return $texto;

}

    public function __toString (){
        return $this->getDenominacion() . " " . $this->getDireccion() . "\n" . $this->datosClientes() . " " . $this->datosMotos() . " " . $this->datosVentas() . "\n";
     }



}