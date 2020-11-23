<?php
Class Laporanpdf extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('Gaji_model', 'gaji');
    }
    
    function index(){
        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',11);
        // mencetak string 

        $pdf->SetFont('Arial','B',20);

        /*Cell(width , height , text , border , end line , [align] )*/
        
        $pdf->SetFont('Arial','B',15);
        $pdf->Cell(71 ,5,'RS BERLIAN KASIH',0,0);
        $pdf->Cell(59 ,5,'',0,0);
        $pdf->Cell(59 ,5,'Details',0,1);
        
        $pdf->SetFont('Arial','',10);
        
        $pdf->Cell(130 ,5,'Jln Raya Serang N0 20',0,0);
        $pdf->Cell(25 ,5,'No Slip Gaji:',0,0);
        $pdf->Cell(34 ,5,'0012',0,1);
        
        $pdf->Cell(130 ,5,'Kec. Cimalaka - Sumedang 45353',0,0);
        $pdf->Cell(25 ,5,'Tanggal:',0,0);
        $pdf->Cell(34 ,5,'12th Jan 2019',0,1);
         
        $pdf->Cell(130 ,5,'',0,0);
        
        $pdf->Cell(34 ,5,'',0,1);
    
        $pdf->Line(0,28,210,28);
        $pdf->SetFont('Arial','B',18);
        $pdf->Cell(180,5,'SLIP GAJI',0,1,'C');
        $pdf->Line(0,37,210,37);
       
       
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(25 ,5,'Nip :',0,0);
        $pdf->Cell(59 ,5,'',0,0);
        $pdf->Cell(25 ,5,'Alamat :',0,1);
        $pdf->Cell(25 ,5,'Nama Karyawan :',0,0);
        $pdf->Cell(59 ,5,'',0,0);
        $pdf->Cell(25 ,5,'Telepon :',0,1);

        $pdf->Line(0,55,210,55);

        $pdf->Cell(189 ,10,'',0,1);
/*make a dummy empty cell as a vertical spacer*/

        $pdf->SetFont('Arial','B',10);

        $pdf->Cell(10 ,6,'No',1,0,'C');
        $pdf->Cell(80 ,6,'Keterangan',1,0,'C');
        $pdf->Cell(105 ,6,'Jumlah',1,1,'R');
      


       
        $pdf->Output();
    }
}