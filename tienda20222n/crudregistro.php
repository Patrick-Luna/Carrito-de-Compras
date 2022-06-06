<?php
include("Admin/BDD/Conexion.php");

if (isset($_POST["Enviar"]) && $_POST["Enviar"] === "Guardar") {
    $id=$_POST["id"];
    $nombre = $_POST["nombre"];
   $apellido = $_POST["apellido"];
   $usuario = $_POST["usuario"];
   $clave = $_POST["clave"];
   if(empty($id)){
    $sql="insert into usuarios(id,nombres,apellidos,usuario,clave)values(null,'$nombre','$apellido','$usuario','$clave')";
   }else{
   $sql ="update usuarios set nombres='$nombre',apellidos='$apellido',usuario='$usuario',clave='$clave' where id='$id';";
  
  }
   if($conn->query($sql)){
     echo"datos guardados";  
     header("location:usuarios.php");
  
   }else{
  echo "error al guardar";
  //header("location:usuarios.php");
   }

   
  }else if(isset($_POST["Enviar"]) && $_POST["Enviar"]=="Eliminar"){
   $id=$_POST["id"];
   $sql="delete from usuarios where id= $id";
  
   if ($conn->query($sql)) {
    echo "<script>alert ('Datos eliminados');</script> ";
    header("location:listausuarios.php");
} else {
    echo "<script>alert ('Intente nuevamente');</script> ";
}  
$conn->close();
  }
  ?>

