<?php
Class Laporanpdf extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('Gaji_model', 'gaji');
    }
    
    function index(){

        //get data parameter
        $value = $_GET['param'];
        //echo "Nilai parameter: ".$value;

        //query get gaji
       $data = $this->gaji->getGajiPegawai($value);
       
        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        foreach ($data as $g) {
        $pdf->SetFont('Arial','B',11);
        // mencetak string 

        $pdf->SetFont('Arial','B',20);

        /*Cell(width , height , text , border , end line , [align] )*/
        $pdf->Image(base_url('vendor/img/logo1.jpg'),5,5,20,0,'JPG');
        $pdf->SetFont('Arial','B',15);
        $pdf->Cell(18 ,5,'',0,0);
        $pdf->Cell(71 ,5,'RS BERLIAN KASIH',0,0);
        $pdf->Cell(59 ,5,'',0,1);
        
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(18 ,5,'',0,0);
        $pdf->Cell(115 ,5,'Jln Raya Serang N0 20',0,0);
        $pdf->Cell(25 ,5,'No Slip Gaji:',0,0);
        $pdf->Cell(34 ,5,$g['no_slip'],0,1);
        
        $pdf->Cell(18 ,5,'',0,0);
        $pdf->Cell(115 ,5,'Kec. Cimalaka - Sumedang 45353',0,0);
        $pdf->Cell(25 ,5,'Tanggal:',0,0);
        $pdf->Cell(34 ,5,$g['tgl_slip'],0,1);
         
        $pdf->Cell(130 ,5,'',0,0);
        
        $pdf->Cell(34 ,5,'',0,1);
    
        $pdf->Line(0,28,210,28);
        $pdf->SetFont('Arial','B',18);
        $pdf->Cell(180,5,'SLIP GAJI',0,1,'C');
        $pdf->Line(0,37,210,37);
       
       
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(8 ,5,'Nip :',0,0);
        $pdf->Cell(115 ,5,$g['nip'],0,0);
        $pdf->Cell(25 ,5,'',0,0);
        $pdf->Cell(17 ,5,'Jabatan :',0,0);
        $pdf->Cell(25 ,5,$g['nama_jabatan'],0,1);
        $pdf->Cell(31 ,5,'Nama Karyawan :',0,0);
        $pdf->Cell(117 ,5,$g['nama_pegawai'],0,0);
        $pdf->Cell(17 ,5,'Telepon :',0,0);
        $pdf->Cell(25 ,5,$g['no_telp'],0,1);

        $pdf->Line(0,55,210,55);

        $pdf->Cell(189 ,10,'',0,1);
/*make a dummy empty cell as a vertical spacer*/

        $pdf->SetFont('Arial','B',10);

        $pdf->Cell(10 ,6,'No',1,0,'C');
        $pdf->Cell(80 ,6,'Keterangan',1,0,'C');
        $pdf->Cell(105 ,6,'Jumlah',1,1,'R');
        $pdf->Cell(10 ,6,'1',1,0,'R');
        $pdf->Cell(80 ,6,'Gaji Pokok',1,0,'L');
        $pdf->Cell(105 ,6,$g['gaji_pokok'],1,1,'R');
        $pdf->Cell(10 ,6,'2',1,0,'R');
        $pdf->Cell(80 ,6,'Tunjangan Jabatan',1,0,'L');
        $pdf->Cell(105 ,6,$g['tunj_jabatan'],1,1,'R');
        $pdf->Cell(10 ,6,'3',1,0,'R');
        $pdf->Cell(80 ,6,'Potongan',1,0,'L');
        $pdf->Cell(105 ,6,$g['potongan'],1,1,'R');
        $pdf->Cell(10 ,6,'4',1,0,'R');
        $pdf->Cell(80 ,6,'Keterangan',1,0,'L');
        $pdf->Cell(105 ,6,$g['keterangan'],1,1,'R');
        $pdf->Cell(10 ,6,'5',1,0,'R');
        $pdf->Cell(80 ,6,'Gaji yang Diterima',1,0,'L');
        $pdf->Cell(105 ,6,$g['gaji_bersih'],1,1,'R');
        $pdf->Cell(25 ,5,'',0,1);
        $pdf->Cell(25 ,5,'',0,1);
        $pdf->Cell(5 ,5,'',0,0);
        $pdf->Cell(150 ,5,'Penerima ',0,0);
        $pdf->Cell(8 ,5,$g['tgl_slip'],0,1);
        $pdf->Cell(25 ,5,'',0,1);
        $pdf->Cell(25 ,5,'',0,1);
        $pdf->Cell(150 ,5,"( ".$g['nama_pegawai'] . "  )",0,0);
        $pdf->Cell(0 ,5,'HRD Berlian Kasih ',0,1);
        
        // Insert a logo in the top-left corner at 300 dpi
//$pdf->Image('logo.png',10,10,-300);
// Insert a dynamic image from a URL

        

        }
      


       
        $pdf->Output();
    }
}