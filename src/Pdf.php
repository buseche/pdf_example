<?php 

namespace App;

use Fpdf\Fpdf;

class Pdf extends Fpdf
{

    protected $orientation = 'L';

    protected $unit = "mm";

    protected $size = "Legal";

    protected $title = '';

    protected $subtitle = '';

    protected $filter = '';

    protected $totalRows = 0; 

    public function __construct()
    {
        parent::__construct($this->orientation, $this->unit, $this->size);
    }


    public function header()
    {
        //$this->AddPage();
        $this->AliasNbPages();
        $this->Image("../static/coin.png", 10, 2, 40, 20, 'png');
        $this->Cell(340, 5, "{$this->title}", 0, 0, 'C');
        $this->Ln();
        $this->Ln();
        $this->Ln();
        $this->Ln();
        $this->Cell(340, 5, "{$this->subtitle}", 0, 0, "L");
        $this->Ln();
        $this->Cell(340, 5, "{$this->filter}", 0, 0, "L");
        $this->Ln();
        $header = ['id', 'Rank', 'Symbol', 'Name', 'Supply', 'Market Cap (USD)', 'Explorer'];
        /*Parseamos las cabeceras */
        $w = array(40,30,30,30,60,60,60);
        foreach($w as $k => $v)
        {
            $this->cell($v, 5, $header[$k], 1, 0, 'C');
        }
        $this->Ln();
    }

    public function table($data)
    {
        $w = array(40,30,30,30,60,60,60);
        /*Parseamos la tabla*/
        $fill = false;
        foreach ($data as $key => $value) {
            $this->Cell($w[0], 5, "{$value[0]}", "LTB", 0, "C");
            $this->Cell($w[1], 5, "{$value[1]}", "TB", 0, "C");
            $this->Cell($w[2], 5, "{$value[2]}", "TB", 0, "C");
            $this->Cell($w[3], 5, "{$value[3]}", "TB", 0, "C");
            $this->Cell($w[4], 5, "{$value[4]}", "TB", 0, "C");
            $this->Cell($w[5], 5, "{$value[5]}", "TB", 0, "C");
            $this->Cell($w[6], 5, "See", "RTB", 0, "C",false, $value[6]);
            $this->Ln();
            $fill = !$fill;
        }

    }


    public function Footer()
    {
        $this->SetY(-15);
        $date = date('d-m-Y');
        $this->SetFont("Arial", '', 12);
        $this->Cell(30, 5, "Fecha de elaboracion: {$date}");
        $this->Cell(280);
        $this->Cell(30, 5, "Pagina {$this->PageNo()} de {nb}");
        $this->Ln();
        $this->Cell(30, 5, "Total registros: {$this->totalRows}");
    }


    public function SetTitle($title, $isUTF8 = false)
    {
        return $this->title = $title;
    }

    public function SetSubtitle($subtitle)
    {
        return $this->subtitle = $subtitle;
    }

    public function SetFilter($filter)
    {
        return $this->filter = $filter;
    }

    public function SetOrientation($orientation)
    {
        return $this->orientation = $orientation;
    }

    public function SetUnit($unit)
    {
        return $this->unit = $unit;
    }

    public function SetSize($size)
    {
        return $this->size = $size;
    }

    public function SetTotalRows($totalRows)
    {
        return $this->totalRows = $totalRows;
    }

    public function getTitle()
    {
        return $this->title;
    }
}