<?php
    include_once('conexion.php');
    require('fpdf/fpdf.php');
    $query = "SELECT * FROM thomsom_clientes";
    $rs = mysqli_query($con, $query) or die("Error con la Base de Datos: ".mysqli_error($con));
    $pdf = new FPDF(); 
    $pdf->AddPage();

    $pdf->SetFont('Arial','B',24);
    $pdf->Cell(80);
    $pdf->Cell(30, 10, 'Tabla de Clientes', 0, 0, 'C');
    $pdf->Ln(20);
    $pdf->SetFont('Arial','B',16);
    $width_cell=array(63,63,63);
    $pdf->SetFillColor(193,229,252);

    $pdf->Cell($width_cell[0],10,utf8_decode("CÉDULA"),1,0,'C',true);
    $pdf->Cell($width_cell[1],10,'NOMBRE',1,0,'C',true);
    $pdf->Cell($width_cell[2],10,utf8_decode('UBICACIÓN'),1,0,'C',true);

    $pdf->SetFont('Arial','',14);
    $pdf->SetFillColor(235,236,236); 
    $fill=false;

    while($row=mysqli_fetch_array($rs)) {
        $pdf->Ln();
        $pdf->Cell($width_cell[0],10,$row['cedula'],1,0,'C',$fill);
        $pdf->Cell($width_cell[1],10,utf8_decode($row['nombre']),1,0,'C',$fill);
        $pdf->Cell($width_cell[2],10,utf8_decode($row['ubicacion']),1,0,'C',$fill);
        $fill = !$fill;
    }

    $pdf->Output("I", "clientes.pdf");
?>