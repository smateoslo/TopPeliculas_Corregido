<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelicula</title>
</head>
<body>
<?php 

     //Creo el objeto pelicula
      class Pelicula{

        private $nombre,$isan,$año,$puntuacion;

        public function __construct($nombre,$isan,$año,$puntuacion){
              $this->nombre = $nombre;
              $this->isan = $isan;
              $this->año = $año;
              $this->puntuacion = $puntuacion;
        }

        public function getIsan(){
            return $this->isan;
        }

        public function getNombre(){
            return $this->nombre;
        } 

        public function setNombre($nombre){
            $this->nombre = $nombre;
        } 

        public function getAño(){
            return $this->año;
        }

        public function setAño($año){
            $this->año = $año;
        } 
                
        public function getPuntuacion(){
            return $this->puntuacion;
         }

        public function setRating($puntuacion){
            $this->puntuacion = $puntuacion;
        } 

        public function toString(){
            return $this->nombre . " Año: " . $this->año . " Puntuacion: " . $this->puntuacion . "/5 ";
        }
     }

    ?>            
</body>
</html>