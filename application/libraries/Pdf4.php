<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Pdf4 extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }
    
    public function Header() {
		// Logo
		$image_file = K_PATH_IMAGES.'gastron.png';
		$this->Image($image_file, 20, 10, 50, '', 'png', '', 'R', false, 700, '', false, false, 0, false, false, false);
		// Set font
		$this->SetFont('helvetica', 'U', 30);
		 
		$this->Cell(200, 35, 'TEST REPORT', 0, false, 'C', 0, '', 0, false, 'T', 'M');
        
      
    }
	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		/*$this->SetY(-15);
        
        $image_file = K_PATH_IMAGES.'footer_catalog.jpg';
		$this->Image($image_file, 0, 287, 211, '', 'JPG', '', 'BOTTOM', false, 500, '', false, false, 0, false, false, false);*/
		// Set font
		//$this->SetFont('helvetica', 'I', 8);
		// Page number
		//$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}

    
}