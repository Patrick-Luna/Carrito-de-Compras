<?php

require("fpdf/fpdf.php");
session_start();
include("Admin/BDD/Conexion.php");


class PDF extends FPDF
{
//Cabecera de página
   function Header()
   {
    //Logo
    $this->Image("img/pdf/logo.jpg" , 10 ,8, 22 , 26 , "JPG" ,"http://www.mipagina.com");
    //Arial bold 15
    $this->SetFont('Arial','B',15);
    //Movernos a la derecha
    $this->Cell(60);
    //Título
    $this->Cell(60,10,'Minimarquet Loqueta',1,0,'C');
    $this->Text(80,25,"Calidad y Precio");
    //Salto de línea
    $this->Ln(10);
      
   }
   
   //Pie de página
   function Footer()
   {
    //Posición: a 1,5 cm del final
    $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
   }
}

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont("Arial", "B", 40);
//$Fpdf->Image("img/pan.jpg",170,5,25,25,"JPG");
$pdf->SetX(150);
$pdf->Sety(15);
$textypos = 5;
$pdf->Cell(5, $textypos, "Javier");
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("Arial", "I", 10);
//$Fpdf->SetTextColor(220,50,50); para el color de letra
$sql = "Select * from clientes;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$pdf->Cell(30, 10, "Nombre:");
$pdf->Cell(65, 10, $row["nombre"]);
$pdf->Ln(5);
$pdf->Cell(30, 10, "Apellido:");
$pdf->Cell(65, 10, $row["apellido"]);
$pdf->Ln(5);

/*$pdf->Cell(30, 10, "Usuario:");
$pdf->Cell(65, 10, $row["usr"]);
$pdf->Ln(5);*/

$pdf->Ln();
// factura elements

$pdf->Cell(30, 10, "PRODUCTO", true);
$pdf->Cell(80, 10, "CANTIDAD", true);
$pdf->Cell(20, 10, "PRECIO", true);
$pdf->Cell(20, 10, "APAGAR", true);
$pdf->Ln();
foreach ($_SESSION["Carrito"] as $elemento) {
    $idp = $elemento["nombre"];
    $cantidad = $elemento["cantidad"];
    $precio = $elemento["precio"];
    $importe = $elemento["importe"];

    $pdf->Cell(30, 10, $idp, true);
    $pdf->Cell(80, 10, $cantidad, true);
    $pdf->Cell(20, 10, $precio, true);
    $pdf->Cell(20, 10, $importe, true);
    $pdf->Ln();
}

$pdf->Ln();
$pdf->SetFillColor(224, 235, 255);
$pdf->SetTextColor(0);
$pdf->SetFont("Arial", "B", 16);
$pdf->SetDrawColor(89, 154, 184);


//$Fpdf->SetLineWidth(.3);
$subtotal = 0;
$IVA = 0;
$aPagar = 0;
foreach ($_SESSION["Carrito"] as $elemento) {
    $subtotal += $elemento["importe"];
}
$IVA = $subtotal * 0.12;
$aPagar = $subtotal + $IVA;
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

$pdf->Cell(110, 10, "SUBTOTAL:", true,);
$pdf->Cell(40, 10, $subtotal, true,);
$pdf->Ln();
$pdf->Cell(110, 10, "IVA", true);
$pdf->Cell(40, 10, $IVA, true);
$pdf->Ln();
$pdf->Cell(110, 10, "TOTAL", true);
$pdf->Cell(40, 10, $aPagar, true);

$pdf->SetFont('Arial', 'B', 10);


$pdf = new FPDF($orientation = 'P', $unit = 'mm');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 20);
$textypos = 5;
$pdf->setY(12);
$pdf->setX(78);
$pdf->Image("img/pdf/logo.jpg" , 10 ,7, 28 , 28 , "JPG");
$pdf->Image("img/pdf/logo.jpg" , 180 ,7, 28 , 28 , "JPG");
// Agregamos los datos de la empresa
$pdf->Cell(10, $textypos, "Tienda Shumager");
$pdf->SetFont('Arial', 'B', 10);
$pdf->setY(40);
$pdf->setX(10);
$pdf->Cell(5, $textypos, "DE:");
$pdf->SetFont('Arial', '', 10);
$pdf->setY(45);
$pdf->setX(10);
$pdf->Cell(5, $textypos, "Javix121");
$pdf->setY(45);
$pdf->setX(10);
$pdf->Cell(5, $textypos, "");
$pdf->setY(50);
$pdf->setX(10);
$pdf->Cell(5, $textypos, "3233543");
$pdf->setY(55);
$pdf->setX(10);
$pdf->Cell(5, $textypos, "javix@1212.com");

// Agregamos los datos del cliente

$sql= "select * from clientes ;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$nombre = $row["nombre"];
$apellido = $row["apellido"];


$pdf->SetFont('Arial', 'B', 10);
$pdf->setY(40);
$pdf->setX(75);
$pdf->Cell(5, $textypos, "PARA:");
$pdf->SetFont('Arial', '', 10);
$pdf->setY(45);
$pdf->setX(75);
$pdf->Cell(5, $textypos, "$nombre");
$pdf->setY(50);
$pdf->setX(75);
$pdf->Cell(5, $textypos, "$apellido");
$pdf->setY(55);
$pdf->setX(75);
$pdf->Cell(5, $textypos, "pepitoalcachofa@gmail.com");

// Agregamos los datos del cliente
$pdf->SetFont('Arial', 'B', 10);
$pdf->setY(40);
$pdf->setX(135);
$pdf->Cell(5, $textypos, "FACTURA #12345");
$pdf->SetFont('Arial', '', 10);
$pdf->setY(45);
$pdf->setX(135);
$pdf->Cell(5, $textypos, "Fecha: 11/DIC/2019");
$pdf->setY(50);
$pdf->setX(135);
$pdf->Cell(5, $textypos, "Vencimiento: 11/ENE/2020");
$pdf->setY(55);
$pdf->setX(135);
$pdf->Cell(5, $textypos, "");
$pdf->setY(55);
$pdf->setX(135);
$pdf->Cell(5, $textypos, "");

/// Apartir de aqui empezamos con la tabla de productos
$pdf->setY(70);
$pdf->setX(135);
$pdf->Ln();
/////////////////////////////
//// Array de Cabecera
$header = array("Cod.", "Descripcion", "Cant.", "Precio", "Total");
//// Arrar de Productos


$products = array(

    array("0010", "producto 1", 2, 120, 0),
    array("0024", "Producto 2", 5, 80, 0),
    array("0001", "Producto 3", 1, 40, 0),
    array("0001", "Producto 3", 5, 80, 0),
    array("0001", "Producto 3", 4, 30, 0),
    array("0001", "Producto 3", 7, 80, 0),
);

$sqlf ="select  subtotal,IVA,total from facturas";

$result = $conn->query($sqlf);
$rowf=$result -> fetch_assoc();

$subtotal1=$rowf["subtotal"];
$IVA1= $rowf["IVA"];
$total1 =$rowf["total"];

// Column widths
$pdf->Cell(35, 10, "PRODUCTO", true);
$pdf->Cell(90, 10, "CANTIDAD", true);
$pdf->Cell(30, 10, "PRECIO", true);
$pdf->Cell(30, 10, "APAGAR", true);
$pdf->Ln();

foreach ($_SESSION["Carrito"] as $elemento) {
    $idp = $elemento["nombre"];
    $cantidad = $elemento["cantidad"];
    $precio = $elemento["precio"];
    $importe = $elemento["importe"];



    $pdf->Cell(35, 10, $idp, true);
    $pdf->Cell(90, 10, $cantidad, true);
    $pdf->Cell(30, 10, $precio, true);
    $pdf->Cell(30, 10, $importe, true);
    $pdf->Ln();
}
/////////////////////////////
//// Apartir de aqui esta la tabla con los subtotales y totales
$yposdinamic = 60 + (count($products) * 10);

$pdf->setY($yposdinamic);
$pdf->setX(235);
$pdf->Ln();
/////////////////////////////
$header = array("", "");



$IVA = $subtotal * 0.12;
$total = $subtotal + $IVA;

$data2 = array(
    array("Subtotal", $subtotal),
    array("IVA", $IVA),
    array("Total", $total),
);
// Column widths
$w2 = array(40, 40);
// Header

// Data
foreach ($data2 as $row) {
    $pdf->setX(115);
    $pdf->Cell($w2[0], 6, $row[0], 1);
    $pdf->Cell($w2[1], 6, "$ " . number_format($row[1], 2, ".", ","), '1', 0, 'R');
    $pdf->Ln();
}
/////////////////////////////

$yposdinamic += (count($data2) * 10);
$pdf->SetFont('Arial', 'B', 10);

$pdf->setY($yposdinamic);
$pdf->setX(10);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(5, $textypos, "TERMINOS Y CONDICIONES");
$pdf->SetFont('Arial', '', 10);

$pdf->Ln();
$pdf->Cell(5, $textypos, "El cliente se compromete a pagar la factura.");
$pdf->Ln();
$pdf->Cell(5, $textypos, "Condiciones conceptuadas a demanda por falta de incumplimiento.");


$pdf->output();
