<?php
include_once 'db.php';

/*Guardar datos*/ 
if(isset($_POST['save']))
{                       /*Solo acepta string*/
    $fn = $MySQLiconn-> real_escape_string($_POST['fn']);
    $ln = $MySQLiconn-> real_escape_string($_POST['ln']);
                        /*query: el metodo para insertar*/
    $SQL = $MySQLiconn-> query("INSERT INTO data(fn, ln) VALUES('$fn','$ln') ");

    /*Verifica si no se ha ejecutado mal, "!" viene a significar si no ha pasado tal cosa*/
    if (!$SQL)
    {
        echo $MySQLiconn-> error;
    }
}

if(isset($_GET['del']))
{                                                           /* se obtiene el id */
    $SQL = $MySQLiconn-> query("DELETE FROM data WHERE id=".$_GET['del'] );
    /*Ubicación donde finaliza esta acción */
    header("Location: index.php");
}

if(isset($_GET['edit']))
{
    $SQL = $MySQLiconn-> query("SELECT * FROM data WHERE id =".$_GET['edit']);

    /*Leer los objetos de cada uno registro que recibe */
    $getROW = $SQL-> fetch_array();
}

if(isset($_POST['update']))
{   
    $SQL = $MySQLiconn-> query("UPDATE data SET fn='".$_POST['fn']."', ln='".$_POST['ln']."' WHERE id=".$_GET['edit']);
    header("Location: index.php");
}

?>