<?php
//BEGIN by Mas21

// create new PDF document
$obj_pdf = new Pdf('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$title = "Salinan Petikan/Putusan";
$obj_pdf->SetCreator(PDF_CREATOR);
$obj_pdf->SetAuthor('By Mas21');
$obj_pdf->SetTitle($title);
$obj_pdf->SetSubject('Jamu Kuat');

// set document configuration
$obj_pdf->SetFont('helvetica','', 10);
$obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// remove default header/footer
$obj_pdf->setPrintHeader(false);
$obj_pdf->setPrintFooter(true);

// set auto page breaks
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set margins
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);//PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT

// add a page
$obj_pdf->AddPage();

// set some coding to print brow...
foreach ($kua as $k) {

$html = <<<EOD
<h2 style="text-align:center;">DATA SALINAN PETIKAN/PUTUSAN</h2>
<h4 style="text-align: center;">Nomor Perkara : $k->nomor_perkara<br>
Nomor Akta Cerai : $k->nomor_akta_cerai</h4><p></p>
EOD;
$obj_pdf->writeHTML($html, true, false, true, false, '');

$tbl = <<<EOD
<table>
	<tr><td width="150px">Nama</td><td width="5px">:</td><td>$k->nama_pihak1</td></tr>
	<tr><td>NIK</td><td>:</td><td>$k->nik_pihak1</td></tr>
    <tr><td>Tempat/Tanggal Lahir</td><td>:</td><td>$k->tempatlahir_pihak1 / $k->tgl_lahir_pihak1</td></tr>
    <tr><td>Alamat</td><td>:</td><td>$k->alamat_pihak1</td></tr>
    <tr><td></td><td></td><td><strong>Sebagai Penggugat/Pemohon</strong></td></tr>
</table>
<div></div>
<table>
	<tr><td width="150px">Nama</td><td width="5px">:</td><td>$k->nama_pihak2</td></tr>
    <tr><td>NIK</td><td>:</td><td>$k->nik_pihak2</td></tr>
    <tr><td>Tempat/Tanggal Lahir</td><td>:</td><td>$k->tempatlahir_pihak2 / $k->tgl_lahir_pihak2</td></tr>
    <tr><td>Alamat</td><td>:</td><td>$k->alamat_pihak2</td></tr>
    <tr><td></td><td></td><td><strong>Sebagai Tergugat/Termohon</strong></td></tr>
</table>
<div></div>
EOD;
if($k->jenis_perkara_id==347){
$tbl .= <<<EOD
<table>
	<tr><td width="150px">Amar Putusan</td><td width="5px">:</td><td width="350px">$k->amar_putusan</td></tr>
</table>
EOD;
}else{
$tbl .= <<<EOD
<table>
	<tr><td width="150px">Tanggal Ikrar Talak</td><td width="5px">:</td><td width="350px">$k->tgl_ikrartalak</td></tr>
    <tr><td>Amar Ikrar Talak</td><td>:</td><td>$k->amar_ikrar_talak</td></tr>
</table>
<div></div>
EOD;
};
$tbl .= <<<EOD
<table>
<tr><td width="150px">Tanggal Inkrah</td><td width="5px">:</td><td>$k->tgl_bht</td></tr>
EOD;
if($k->perceraian_ke==null){
$tbl .= <<<EOD
<tr><td>Perceraian Ke-</td><td width="5px">:</td><td>-</td></tr>
EOD;
}else{
$tbl .= <<<EOD
<tr><td>Perceraian Ke-</td><td width="5px">:</td><td>$k->perceraian_ke</td></tr>
EOD;
};
$tbl .= <<<EOD
<tr><td width="150px">Keadaan Isteri</td><td width="5px">:</td>
EOD;
if($k->qobla_bada==0){
$tbl .= <<<EOD
<td>Qobla Dukhul</td>
EOD;
}elseif($k->qobla_bada==1){
$tbl .= <<<EOD
<td>Ba&#39;da Dukhul</td>
EOD;
}else{
$tbl .= <<<EOD
<td>-</td>
EOD;
};
$tbl .= <<<EOD
</tr>
<tr><td width="150px">Kondisi Isteri</td><td width="5px">:</td>
EOD;
if($k->keadaan_istri==1){
$tbl .= <<<EOD
<td>Suci</td>
EOD;
}elseif($k->keadaan_istri==2){
$tbl .= <<<EOD
<td>Haid</td>
EOD;
}elseif($k->keadaan_istri==3){
$tbl .= <<<EOD
<td>Hamil</td>
EOD;
}elseif($k->keadaan_istri==4){
$tbl .= <<<EOD
<td>Tidak Diketahui</td>
EOD;
}else{
$tbl .= <<<EOD
<td>-</td>
EOD;
};
$tbl .= <<<EOD
</tr></table>
EOD;

// output the HTML content
$obj_pdf->writeHTML($tbl, true, false, true, false, '');
};

//Close and output PDF document
$obj_pdf->Output('Salinan_Petikan_Putusan.pdf', 'I');

//END by Mas21
?>