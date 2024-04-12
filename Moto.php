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
    
/* Implementar el método darPrecioVenta el cual calcula el valor por el cual puede ser vendida una moto.
Si la moto no se encuentra disponible para la venta retorna un valor < 0. Si la moto está disponible para
la venta, el método realiza el siguiente cálculo:
$_venta = $_compra + $_compra * (anio * por_inc_anual)
donde $_compra: es el costo de la moto.
anio: cantidad de años transcurridos desde que se fabricó la moto.
por_inc_anual: porcentaje de incremento anual de la moto.*/
    public function darPrecioVenta (){
        $venta = -1;
        if ($this->getActiva()){
        $añosPasados = 2024 - $this->getAño();
        $venta = $this->getCosto() + $this->getCosto() * ($añosPasados * $this->getPorcentaje());
        }
        return $venta;
    }

    public function __toString (){
        return $this->getCodigo() . " " . $this->getCosto() . " " . $this->getAño() . " " . $this->getDescripcion() . " " . $this->getPorcentaje() . " " . $this->getActiva() . "\n" ;
    }
}