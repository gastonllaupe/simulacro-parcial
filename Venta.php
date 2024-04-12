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