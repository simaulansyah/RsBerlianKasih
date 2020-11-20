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
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'SEKOLAH MENENGAH KEJURUSAN NEEGRI 2 LANGSA',0,1,);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20,6,'No Slip',1,0);
        $pdf->Cell(85,6,'Tanggal Slip',1,0);
        $pdf->Cell(27,6,'Gaji Pokok',1,0);
        $pdf->Cell(25,6,'Tunj Jabatan',1,1);
        $pdf->SetFont('Arial','',10);
        $gaji = $this->gaji->getGaji();
        foreach ($gaji as $row){
            $pdf->Cell(20,6,$row['no_slip'],1,0);
            $pdf->Cell(85,6,$row['tgl_slip'],1,0);
            $pdf->Cell(27,6,$row['gaji_pokok'],1,0);
            $pdf->Cell(25,6,$row['tunj_jabatan'],1,1); 
        }
        $pdf->Output();
    }
}