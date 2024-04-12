<?php
class Venta {

    private $numero;
    private $fecha;
    private $objCliente;
    private $arrayMotos;
    private $precioFinal;

    public function __construct ($num,$fech,$cliente,$motos,$precio){
        $this->numero = $num;
        $this->fecha = $fech;
        $this->objCliente = $cliente;
        $this->arrayMotos = $motos;
        $this->precioFinal = $precio;
    }

    public function getNumero () {
        return $this->numero;
    }
    
    public function getFecha () {
        return $this->fecha;
    }
    
    public function getCliente () {
        return $this->objCliente;
    }
    
    public function getMotos () {
        return $this->arrayMotos;
    }
    
    public function getPrecio () {
        return $this->precioFinal;
    }

    public function setNumero ($nuevo) {
        $this->numero = $nuevo;
    }
    
    public function setFecha ($nuevo) {
        $this->fecha = $nuevo;
    }
    
    public function setCliente ($nuevo) {
        $this->objCliente = $nuevo;
    }
    
    public function setMotos ($nuevo) {
        $this->arrayMotos = $nuevo;
    }
    
    public function setPrecio ($nuevo) {
        $this->precioFinal = $nuevo;
    }

/*Implementar el método incorporarMoto($objMoto) que recibe por parámetro un objeto moto y lo
incorpora a la colección de motos de la venta, siempre y cuando sea posible la venta. El método cada
vez que incorpora una moto a la venta, debe actualizar la variable instancia precio final de la venta.
Utilizar el método que calcula el precio de venta de la moto donde crea necesario.*/
    public function incorporarMoto($objMoto){
        $incorporada = -1;
        if ($objmoto->getActiva()){ 
            array_push($arrayMotos,$objMoto);
            $precioMoto = $objMoto->darPrecioVenta();
            $this->setPrecio($this->getPrecio() + $precioMoto);
            $incorporada = 1;
        }
        return $incorporada;
    }

    public function __toString (){
        return $this->getNumero() . " " . $this->getFecha() . " " . $this->getCliente() . " " . $this->getMotos() . " " . $this->getPrecio() . "\n" ; 
    }

}