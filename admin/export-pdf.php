<?php

ob_start();
require('../assets/pdf/fpdf.php');

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',12);
$pdf->Image('../assets/pdf/logo.png',1,1,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'LAPORAN SISWA YANG LAYAK MENGIKUTI SNMPTN',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Indonesia',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Source Code by Ratih',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,0.7,'Laporan Hasil',0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(1.5, 0.8, 'No', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Nama', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Hasil', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Rangking', 1, 0, 'C');

$pdf->ln();

$no=1;
include '../src/koneksi.php';
              $rank = 1;
              $queryT = mysqli_query($koneksi, "SELECT * FROM hasil ORDER BY hasil DESC");
              while($dataT = mysqli_fetch_array($queryT)){
	$pdf->Cell(1.5, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(4, 0.8, $dataT['nama_siswa'],1, 0, 'C');
    $pdf->Cell(2, 0.8, $dataT['hasil'], 1, 0,'C');
     $pdf->Cell(2, 0.8, $rank++, 1, 0,'C');
	$pdf->ln();
	$no++;
}
$pdf->Output("laporan_hasil.pdf","I");

?>
