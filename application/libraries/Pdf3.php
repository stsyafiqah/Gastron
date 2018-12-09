<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Pdf3 extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }
    
    public function Header() {
		// Logo
		/*$image_file = K_PATH_IMAGES.'gastron.jpg';
		$this->Image($image_file, 0, 10, 60, '', 'JPG', '', 'R', false, 700, '', false, false, 0, false, false, false);
		 Set font*/


		$this->SetFont('helvetica', 'B', 10);
		 
        $this->Cell(0, 20, 'GASTRONICS (Malaysia) SDN BHD', 0, false, 'C', 0, '', 0, false, 'T', 'M');
		$this->Cell(0, 30, '6 Jalan PJU 1A/13, Taman Perindustrian Jaya, Ara Damansara,47200 Petaling Jaya, Selangor, Malaysia ', 0, false, 'R', 0, '', 0, false, 'T', 'M');
        $this->Cell(0, 40, 'Tel: 03-7840 0199 Fax: 03-7840 0411 / Email:malaysia@gastron.com', 0, true, 'R', 0, '', 0, false, 'T', 'C');
        //$this->Cell(0, 40, '', 0, true, 'R', 0, '', 0, true, 'T', 'C');
      
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