<?php
    include_once('conexion.php');

    require('fpdf/fpdf.php');
    $query = "SELECT thomsom_botellas.*, thomsom_clientes.ubicacion FROM thomsom_botellas INNER JOIN thomsom_clientes ON thomsom_botellas.cedula_cliente = thomsom_clientes.cedula";
    $rs = mysqli_query($con, $query) or die("Error con la Base de Datos: ".mysqli_error($con));
    $pdf = new FPDF(); 
    $pdf->AddPage();

    $pdf->SetFont('Arial','B',24);
    $pdf->Cell(80);
    $pdf->Cell(30, 10, 'Tabla de Registros', 0, 0, 'C');
    $pdf->Ln(20);
    $pdf->SetFont('Arial','B',16);
    $width_cell=array(22,35,32,32,32,38);
    $pdf->SetFillColor(193,229,252);

    $pdf->Cell($width_cell[0],10,"ID",1,0,'C',true);
    $pdf->Cell($width_cell[1],10,'CANTIDAD',1,0,'C',true);
    $pdf->Cell($width_cell[2],10,'HORA',1,0,'C',true);
    $pdf->Cell($width_cell[3],10,'FECHA',1,0,'C',true);
    $pdf->Cell($width_cell[4],10,'CLIENTE',1,0,'C',true);
    $pdf->Cell($width_cell[5],10,utf8_decode('UBICACIÓN'),1,0,'C',true);

    $pdf->SetFont('Arial','',14);
    $pdf->SetFillColor(235,236,236); 
    $fill=false;

    while($row=mysqli_fetch_array($rs)) {
        $pdf->Ln();
        $pdf->Cell($width_cell[0],10,$row[0],1,0,'C',$fill);
        $pdf->Cell($width_cell[1],10,$row[1],1,0,'C',$fill);
        $pdf->Cell($width_cell[2],10,$row[2],1,0,'C',$fill);
        $pdf->Cell($width_cell[3],10,$row[3],1,0,'C',$fill);
        $pdf->Cell($width_cell[4],10,utf8_decode($row[4]),1,0,'C',$fill);
        $pdf->Cell($width_cell[5],10,utf8_decode($row[5]),1,0,'C',$fill);
        $fill = !$fill;
    }

    $pdf->Output("I", "clientes.pdf");
?>