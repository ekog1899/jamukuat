<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Pdf extends TCPDF
{ 

	function __construct() 
	{ 
		parent::__construct(); 
	}

	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		//$this->SetY(-15);
		// Set font
		$this->SetFont('helvetica', 'I', 8);
		// Page number
		//$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
		$this->Cell(0, 10, 'Dokumen ini di cetak melalui aplikasi JAMU KUAT © 2023', 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}
}