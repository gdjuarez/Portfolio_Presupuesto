<?php
session_start();
if($_SESSION['logged'] == 'yes')
{
	//echo 'Usuario: '.$_SESSION['user'];

}else{

	echo '<script language=javascript>
		  alert("No te has logeado, inicia sesion")
		  self.location = "index.html"</script>';
}
?>

<?php
require('../fpdf/fpdf.php');
// Include database connection
include("../conex/conexion.php");

class PDF extends FPDF
{
//Page header
	function Header()
	{
		$this->SetFont('Times','B',15);
		$this->Cell(275,10,'Listado de proveedores',0,0,'C');
		//$this->Image('../img/logo.gif' , 265 ,10, 10 , 10,'GIF');
		$this->Ln(20);
	}

// Page footer
function Footer()
{
// Position at 1.5 cm from bottom
	$this->SetY(-15);
	$this->SetFont('Times','',10);
	$this->Cell(275, 10, 'Pag '.$this->PageNo().'   ', 0,0,'R');
}
}

//Inicio la construccion del PDF
//parametros P= portrait, mm= milimetros, a4= tipo de hoja y utf8 para simbolos especiles y acentos XD
$pdf = new PDF('L','mm','a4', 'utf8');
$pdf->AddPage();

$pdf->SetFont('times', 'B', 12);

//tabla
$pdf->SetFillColor(240,240,240);
$pdf->Cell(10, 10, 'Cod', 1,0,'C',1);
$pdf->Cell(60, 10, 'Nombre o Razon Social', 1,0,'C',1);
$pdf->Cell(25, 10, 'Cuil', 1,0,'C',1);
$pdf->Cell(50, 10, 'Domicilio', 1,0,'C',1);
$pdf->Cell(30, 10, 'Tel Fijo', 1,0,'C',1);
$pdf->Cell(30, 10, 'Tel celular', 1,0,'C',1);
$pdf->Cell(70, 10, 'EMail', 1,0,'C',1);
$pdf->Ln(10);
$pdf->SetFont('times', '', 11);

//CONSULTA
$proveedores = mysqli_query($miConexion,"SELECT * FROM proveedor order by Apellido ASC");

$item = 0;
$totaluni = 0;
$totaldis = 0;
$f=1; //inicializo $f que es si tiene fondo
while($proveedores2 = mysqli_fetch_array($proveedores)){
	$pdf->SetFillColor(240,235,230);		//pongo color de fondo
	if($f==0)								//alterno color d fondo cambiando el valor de $f
		{
			$f=1;
		}
	else
		{
			$f=0;
		};

	$item = $item+1;
		//Dibujo las celdas
		$pdf->Cell(10, 8, '',1,0,'',$f);
		$pdf->Cell(60, 8, '',1,0,'',$f);
		$pdf->Cell(25, 8, '',1,0,'',$f);
		$pdf->Cell(50, 8, '',1,0,'',$f);
		$pdf->Cell(30, 8, '',1,0,'',$f);
		$pdf->Cell(30, 8, '',1,0,'',$f);
		$pdf->Cell(70, 8, '',1,0,'',$f);
		$pdf->Ln(0);
		//Cargo los valores en las celdas
	$pdf->Cell(10, 8, $item, 0,0,'C');
	$pdf->Cell(60, 8, $proveedores2['Apellido'].' '.$proveedores2['Nombre'].' '.$proveedores2['RazonSocial'], 0);
	$pdf->Cell(25, 8, $proveedores2['codProveedor'],0,0,'C');
    $pdf->Cell(50, 8, $proveedores2['Domicilio'].' '.$proveedores2['Ciudad'],0,0);
    $pdf->Cell(30, 8, $proveedores2['TelFijo'],0,0,'C');
    $pdf->Cell(30, 8, $proveedores2['TelCelular'],0,0,'C');
    $pdf->Cell(70, 8, $proveedores2['Email'], 0);
	$pdf->Ln(8);
}
$pdf->Output();
?>