<?php

/* incluimos primeramente el archivo que contiene la clase fpdf */

include ('fpdf/fpdf.php');

/* tenemos que generar una instancia de la clase */

$pdf = new FPDF();

$pdf->AddPage();

/* seleccionamos el tipo, estilo y tamaño de la letra a utilizar */

$pdf->SetFont('Helvetica', 'B', 14);

$pdf->Write (7,"HOLA ESTOY GENERANDO MI PRIMER PDF");

$pdf->Ln();

$pdf->Write (7,"Luis Enrique");

$pdf->Ln(); //salto de linea

$pdf->Output("prueba.pdf",'I');
?>