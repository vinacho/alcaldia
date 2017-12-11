<?php

//Llamado a la libreria FPDF
$this->load->library('fpdf/fpdf');

//Se crea la clase para adicionar la cabecera
class PDF extends Fpdf

{
    // Cabecera de página
    function Header(){
        // Fondo Completo del Documento
        $this->Image('assets/img/footer_certificado.jpg',0,0,215);
        // Seleccionar fuente por defecto, letra, negrita, tamaño
        $this->SetFont('Arial','B',15);
        // Movernos a la derecha 80
        $this->Cell(80);
        // Título
        //$this->Cell(30,10,'Title',1,0,'C');
        // Salto de línea
        $this->Ln(20);
    }
}

$nombre="data";

$fpdf = new PDF();

ob_end_clean();

//inicializa pagina pdf
$fpdf->AliasNbPages();
$fpdf->AddPage('l','Legal');
$fpdf->SetFont('Arial','B',11);
$fpdf->SetLeftMargin(10);
$fpdf->SetRightMargin(15);
$fpdf->SetAuthor('personeriaIbague', true);
$fpdf->SetCreator('personeriaIbague', true);

//Contenido del documento
$fpdf->Cell(10,10,'',0,1,'c');
$fpdf->Cell(0,5,'ALCALDIA MUNICIPAL RONCESVALLES TOLIMA',0,1,'C');
$fpdf->Cell(0,5,utf8_decode($titulo),0,1,'C');
$fpdf->Cell(10,10,'',0,1,'c');
$fpdf->SetFont('Arial','',7);

foreach($cabecera as $col)
    $fpdf->Cell(40, 7, $col, 1);
    $fpdf->Ln();

//Llena el contenido de la tabla
if($info != null){
    foreach($info as $col1){
        $fpdf->Cell(40, 5, $col1['NUM_PQR'], 1);
        $fpdf->Cell(40, 5, $col1['ANIO_PQR'], 1);
        $fpdf->Cell(40, 5, $col1['NUM_TIC_PQR'], 1);
        $fpdf->Cell(40, 5, $col1['HOR_RAC_PQR'], 1);
        $fpdf->Cell(40, 5, $col1['ASU_PQR'], 1);
        $fpdf->Cell(40, 5, $col1['CAN_FOL_PQR'], 1);
        $fpdf->Cell(40, 5, $col1['NOM_DOC'], 1);
        $fpdf->Cell(40, 5, $col1['NOM_PER'], 1);
        $fpdf->Ln();
    }
}

//finaliza y muestra en pantalla pdf
$fpdf->Output($nombre.".pdf","I");
