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

    public function __toString (){
        return $this->getDenominacion() . " " . $this->getDireccion() . " " . $this->getClientes() . " " . $this->getMotos() . " " . $this->getVentas() . "\n";
     }



}