<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TopPeliculas</title>  
</head>
<body>
    <?php
        require("Pelicula.php");

            $peliculaArray = [];
            $peliculaEj = new Pelicula("Ejemplo",1111,2022,2);
            $peliculaArray[$peliculaEj->getIsan()] = $peliculaEj;

        if (isset($_POST["enviar"])){

            //Cojo los valores del formulario
            $nombre = htmlentities($_POST["nombre"]);
            $isan = htmlentities($_POST["isan"]);
            $año = htmlentities($_POST["año"]);
            $puntuacion = htmlentities($_POST["combo"]);
            $pelicula= new Pelicula($nombre,$isan,$año,$puntuacion);
            $valorAnt = $_POST["hidden"];


        if(($pelicula->getNombre() == "") && ($pelicula->getIsan() == "")){
             //Caso 1
             echo "Nombre y ISAN vacios <br>";
        } else{
            foreach ($peliculaArray as $key => $value){
                if($key == $pelicula->getIsan()){
                    //Caso 5
                    if($pelicula->getNombre() == ""){
                        //echo "Si el usuario introduce un número ISAN y no deja el nombre de la película vacío, la película se eliminará de la lista.";
                        unset($peliculaArray[$key]);
                    } 
                    //Caso 4
                    if($pelicula->getNombre() != "" && $pelicula->getAño() != "" && $pelicula->getPuntuacion()){
                        //echo "Si el número ISAN que se introdujo YA existe en la lista y el resto de apartados no están vacíos se actualizará con la información introducida en el formulario.";
                        $value->setNombre($pelicula->getNombre());
                        $value->getAño($pelicula->getAño());
                        $value->getPuntuacion($pelicula->getPuntuacion());
                    }
                } else{
                    //Caso 3
                    if(($pelicula->getNombre() != "") && ($pelicula->getIsan() == "")){
                        //echo "Si sólo el ISAN está vacío mostrará la lista de películas que contienen ese nombre" ;
                        if(str_contains($value->getNombre(),$pelicula->getNombre())){
                            echo "<p>".$value->getNombre()." Año: ".$value->getAño()."</p>";
                            unset($peliculaArray[null]);
                        }
                    } else{
                        $peliculaArray[$pelicula->getIsan()]= $pelicula;
                    }  
                }
            } 
        } 
        //Muestro la lista
        foreach($peliculaArray as $key => $value){
            echo $valorAnt . " " . $value->toString();
        }      
    }
?>


    <form action="TopPeliculas.php" method="post">
        <h1>Peliculas</h1>
        <p>Pelicula: <input type="text" name="nombre"></p>
        <p>Isan: <input type="text" name="isan"></p>
        <p>Año: <input type="text" name="año"></p>
        <label for= "combo">Puntiacion:</label>
        <select name="combo">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <p><input type="hidden" name="hidden" value="<?php  foreach($peliculaArray as $key => $value){echo $valorAnt . " " . $value->toString();}?>"></p>
        <p><input type="submit" name="enviar" value="Enviar"></p>
    </form>


</body>
</html>