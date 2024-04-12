<?php
class Cliente {

    private $nombre;
    private $apellido;
    private $deBaja;
    private $tipoDocumento;
    private $numDocumento;

    public function __construct($nom,$ape,$baja,$tipoDoc,$numDoc){
        $this->nombre = $nom;
        $this->apellido = $ape;
        $this->deBaja = $baja;
        $this->tipoDocumento = $tipoDoc;
        $this->numDocumento = $numDoc;
    }

    public function getNombre (){
        return $this->nombre;
    }

    public function getApellido (){
        return $this->apellido;
    }
    
    public function getBaja (){
        return $this->deBaja;
    }
    
    public function getTipoDoc (){
        return $this->tipoDocumento;
    }
    
    public function getNumDoc (){
        return $this->numDocumento;
    }

    public function setNombre ($nuevo){
        $this->nombre = $nuevo;
    }
    
    public function setApellido ($nuevo){
        $this->apellido = $nuevo;
    }
    
    public function setBaja ($nuevo){
        $this->deBaja = $nuevo;
    }
    
    public function setTipoDoc ($nuevo){
        $this->tipoDocumento = $nuevo;
    }
    
    public function setNumDoc ($nuevo){
        $this->numDocumento = $nuevo;
    }
    
    public function _toString(){
        return $this->getNombre() . " " . $this->getApellido() . " " . $this->getBaja() . " " . $this->getTipoDoc() . " " . $this->getNumDoc() . "\n" ;
    }



}