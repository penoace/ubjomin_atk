<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FPeminjaman
 *
 * @author wonk4rol
 *
 */
Yii::import('ext.fpdf.fpdf');
Yii::import('ext.fungsiku.Fungsi');

class FBarangMasuk extends fpdf{
    private $data = array();
    private $options = array(
        'filename'  => '' ,
        'destinationfile'  => '' ,
        'paper_size' =>'' ,
        'orientation' =>''
        );
    private $periode;

    function __construct($data = array(), $options = array(), $periode) {
        parent::__construct();
        $this->data = $data;
        $this->options = $options;
        $this->periode = $periode;
    }

    //put your code here
    function master() {
        $this->SetFont('Times', 'B', 16);
        $this->Cell(530, 10, 'LAPORAN BARANG MASUK', 0, 0, 'C');
        $this->Ln();
        $this->Ln();
        $y = 60;
        $this->Line(50, $y, 530, $y);
        $this->Ln();
        $this->Ln();
        $this->Ln();
        $this->tanggal = new Fungsi();
            $this->SetFont('Times', 'B', 12);
            $this->Cell(100, 20, 'Tanggal                : '.$this->tanggal->waktuIndo($this->periode['awal']). ' s/d '. $this->tanggal->waktuIndo($this->periode['akhir']), 0, 0, 'L');
            $this->Ln();
        $this->Ln();
    }

    public function detil() {
        //
        $h = 15;
        #tableheader
        $this->SetFillColor(200,200,200);
        $w = array(30, 250, 150, 50);
        $this->SetFont("Times", "B", 12);
        $this->Cell($w[0],$h,'NO' ,1,0,'C' ,true);
        $this->Cell($w[1],$h,'Nama Barang' ,1,0,'C' ,true);
        $this->Cell($w[2],$h,'Satuan' ,1,0,'C' ,true);
        $this->Cell($w[3],$h,'Jumlah' ,1,0,'C' ,true);
        $this->Ln();

        $this->SetFont('Times' ,'' ,12);
        $this->SetWidths($w);
        $this->SetAligns(array('C' ,'L' ,'L','C'));
        $no = 1; $this->SetFillColor(255);
        $tot = 0;
        foreach ($this->data as $baris) {
            $this->Row(
            array(
                $no++,
                $baris['nama'],
                $baris['satuan'],
                $baris['jumlah'],
            ));
            $tot = $tot+$baris['jumlah'];
        
        }
        $this->SetFont("Times", "B", 12);
        $this->Cell($w[0]+$w[1]+$w[2],$h,'Total' ,1,0,'R' ,true);
        $this->Cell($w[3],$h, $tot,1,0,'C' ,true);
    }

    public function bawah() {
        $this->Ln(50);
        $this->SetFont("Times", "", 10);
        $this->Cell(410, 8, 'Catatan : formulir ini harus dibawa ketika pengembalian buku', 0, 0, 'L');
        $this->Ln(20);
        $this->SetFont("Times", "", 12);
        $this->Cell(310);
        $this->Cell(100, 8, 'Indramayu, '. $this->tanggal->tanggaldmy(date('Y-m-d')), 0,0,'C');
        $this->Ln(70);
        $this->Cell(310);
        $this->Cell(100, 8, 'Petugas ', 0,0,'C');
    }

    public function printPDF () {
//        if ($this->options['paper_size' ] == "F4") {
//            $a = 8.3 * 72; //1 inch = 72 pt
//            $b = 13.0 * 72;
//            $this->FPDF($this->options['orientation' ], "pt", array($a,$b));
//        } else {
//            $this->FPDF($this->options['orientation' ], "pt", $this->options['paper_size' ]);
//        }
        $a = 8.3 * 72; //1 inch = 72 pt
        $b = 11.7 * 72;
        $this->FPDF('P', "pt", array($a,$b));
        $this->SetLeftMargin(50);
        $this->AddPage();
        $this->AliasNbPages();
        $this->SetAutoPageBreak(true,60);
        $this->SetFont("helvetica", "B", 10);

        //$this->AddPage();
        $this->master();
        $this->detil();
        //$this->bawah();

        $this->Output($this->options['filename' ],$this->options['destinationfile' ]);
    }

    private $widths;
    private $aligns;

    function SetWidths($w)
    {
        //Set the array of column widths
        $this->widths=$w;
    }

    function SetAligns($a)
    {
        //Set the array of column alignments
            $this->aligns=$a;
    }

    function Row($data)
    {
        //Calculate the height of the row
        $nb=0;
        for($i=0;$i<count($data);$i++)
            $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
        $h=20*$nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);
        //Draw the cells of the row
        for($i=0;$i<count($data);$i++)
        {
            $w=$this->widths[$i];
            $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L' ;
            //Save the current position
            $x=$this->GetX();
            $y=$this->GetY();
            //Draw the border
            $this->Rect($x,$y,$w,$h);
            //Print the text
            $this->SetXY($x, $y+4);
            $this->MultiCell($w,10,$data[$i],0,$a);
            //Put the position to the right of the cell
            $this->SetXY($x+$w,$y);
        }
        //Go to the next line
        $this->Ln($h);
    }

    function CheckPageBreak($h)
    {
    //If the height h would cause an overflow, add a new page immediately
    if($this->GetY()+$h>$this->PageBreakTrigger)
        $this->AddPage($this->CurOrientation);
    }

    function NbLines($w,$txt)
    {
        //Computes the number of lines a MultiCell of width w will take
        $cw=&$this->CurrentFont['cw' ];
        if($w==0)
            $w=$this->w-$this->rMargin-$this->x;
        $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
        $s=str_replace("\r",'' ,$txt);
        $nb=strlen($s);
        if($nb>0 and $s[$nb-1]=="\n")
            $nb--;
        $sep=-1;
        $i=0;
        $j=0;
        $l=0;
        $nl=1;
        while($i<$nb)
        {
            $c=$s[$i];
            if($c=="\n")
        {
        $i++;
        $sep=-1;
        $j=$i;
        $l=0;
        $nl++;
        continue;
        }
        if($c==' ' )
            $sep=$i;
        $l+=$cw[$c];
        if($l>$wmax)
        {
            if($sep==-1)
            {
                if($i==$j)
                    $i++;
            }
                else
                    $i=$sep+1;
            $sep=-1;
        $j=$i;
        $l=0;
        $nl++;
        }
        else
        $i++;
        }
        return $nl;
        }
    } //end of class

    //contoh penggunaan
    //$tabel = new RSchedules($data, $options);
    //$tabel->printPDF();
?>
