<?php
$pdf = new FPDF("L","cm","Legal");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
// $pdf->Image('assets/img/aplikasi/logo.png',2.5,0.5,3,2.5);
$pdf->SetX(8);            
$pdf->MultiCell(19.5,0.7,"KLINIK PRATAMA",0,'C');   
$pdf->SetFont('Times','B',14); 
$pdf->SetX(8);
$pdf->MultiCell(19.5,0.7,"RAHARDJA",0,'C');
$pdf->SetFont('Times','',12); 
$pdf->SetX(8);
$pdf->MultiCell(19.5,0.7,''.$alamat.'',0,'C');
$pdf->Line(2,3.1,31,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(2,3.2,31,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',11);
$pdf->MultiCell(31,0.7,"DATA REKAM MEDIS",0,'C'); 
$pdf->SetFont('Arial','',10);
$pdf->MultiCell(31,0.7,''.$ket.'',0,'C');
$pdf->SetFont('Arial','',10);
$pdf->Cell(5,0.6,"Di cetak pada : ".date("d/m/Y"),0,0,'C');
$pdf->ln(1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(2.5, 0.8, 'TANGGAL', 1, 0, 'C');
$pdf->Cell(2.5, 0.8, 'KODE RM', 1, 0, 'C');
$pdf->Cell(2.5, 0.8, 'KD PERIKSA', 1, 0, 'C');
$pdf->Cell(10.5, 0.8, 'KELUHAN', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'DIAGNOSIS', 1, 0, 'C');

$pdf->Cell(10, 0.8, 'TINDAKAN', 1, 0, 'C');
$pdf->ln();

if( ! empty($pemeriksaan)){
        $no = 1;
        foreach($pemeriksaan as $data){
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(1, 1.2, $no++ , 1, 0, 'C');
            $pdf->Cell(2.5, 1.2, date('d-m-Y', strtotime($data['tanggal'])),1, 0, 'C');
            $pdf->Cell(2.5, 1.2, $data['kd_rm'],1, 0, 'L');
            $pdf->Cell(2.5, 1.2, $data['id_periksa'],1, 0, 'L');
            $pdf->Cell(10.5, 1.2, $data['keluhan'],1, 0, 'L');
            // $pdf->MultiCell(8, 0.6, $data['keluhan'],1, 0, 'L');
			// $pdf->MultiCell(8, 0.6, $data['keluhan'], 'T,R,L,B', 'L');
            $pdf->Cell(4, 1.2, $data['diagnosa'],1, 0, 'L');
            $pdf->Cell(10, 1.2, $data['tindakan'],1, 0, 'L');
            $pdf->ln();
			
			
			// $cellWidth=20;
			// $cellHeight=1;
			// if($pdf->GetStringWidth($hasil['pesan']) < $cellWidth){
				// $line = 1;
			// }else{}
			
        }
    }

$pdf->Output("Laporan Rekam Medis.pdf","I");
?>