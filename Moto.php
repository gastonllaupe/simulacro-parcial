<?php
class Moto {

    private $codigo;
    private $costo;
    private $añoFabricacion;
    private $descripcion;
    private $porcentajeIncAnual;
    private $activa;

    public function __construct($codig,$cost,$año,$desc,$porc,$act){
        $this->codigo = $codig;
        $this->costo = $cost; 
        $this->añoFabricacion = $año;
        $this->descripcion = $desc; 
        $this->porcentajeIncAnual = $porc;
        $this->activa = $act; 
    }

    public function getCodigo (){
        return $this->codigo;
    }

    public function getCosto (){
        return $this->costo;
    }

    public function getAño (){
        return $this->añoFabricacion;
    }

    public function getDescripcion (){
        return $this->descripcion;
    }

    public function getPorcentaje (){
        return $this->porcentajeIncAnual;
    }

    public function getActiva (){
        return $this->activa;
    }

    public function setCodigo ($nuevo){
        $this->codigo = $nuevo;
    }

    public function setCosto ($nuevo){
        $this->costo = $nuevo;
    }
    
    public function setAño ($nuevo){
        $this->añoFabricacion = $nuevo;
    }
    
    public function setDescripcion ($nuevo){
        $this->descripcion = $nuevo;
    }
    
    public function setPorcentaje ($nuevo){
        $this->porcentajeIncAnual = $nuevo;
    }
    
    public function setActiva ($nuevo){
        $this->activa = $nuevo;
    }

    public function darPrecioVenta (){
        $venta = -1;
        if ($this->getActiva()){
        $añosPasados = 2024 - $this->getAño();
        $venta = $this->getCosto() + $this->getCosto() * ($añosPasados * $this->getPorcentaje());
        }
        return $venta;
    }

    public function _toString (){
        return $this->getCodigo() . " " . $this->getCosto() . " " . $this->getAño() . " " . $this->getDescripcion() . " " . $this->getPorcentaje() . " " . $this->getActiva() . "\n" ;
    }
}