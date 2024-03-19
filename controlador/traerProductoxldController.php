<?php
include('../modelo/productoDAO.php');
$pr= new ProductoDAO($_POST['nombre'], $_POST['descripcion'],$_POST['acciones']);
$rta=$pr->traerDatosProductoXid();
echo (json_encode($rta));
?>