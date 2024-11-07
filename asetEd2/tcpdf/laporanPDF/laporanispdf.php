<?php
include('../../configis.php') ;date_default_timezone_set('UTC');
//$tarikhBln = $_REQUEST['tarikhBln'];
/*$feri1 = $_REQUEST['feri1'];
$statuspas1 = $_REQUEST['statuspas1'];
$kodferi1 = $_REQUEST['kodferi1'];*/
//$tarikhBln = date('d-m-Y');


// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8',false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Razliah Rahmat');
$pdf->SetTitle('MICTH');
$pdf->SetSubject('MICTH');
$pdf->SetKeywords('MICTH, Melaka, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' ', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', 'B', 20);

// add a page
$pdf->AddPage('L', 'A4');

//$tarikh = date("d.m.Y");

$pdf->Write(0, 'Senarai Surat Keluar MICTH', '', 0, 'L', true, 0, false, false, 0);

$pdf->SetFont('helvetica', '', 8);


// define some HTML content with style
$html = <<<EOF
<br/>

  <div id="chartContainer" style="height: 300px; width: 50%;">
  </div>


EOF;
//require 'barchart.php';
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// --------------------------------------------------- table view records ------
$tbl = <<<EOD
<table cellspacing="0" cellpadding="1" border="0">
    <tr>
       <td>Maklumat Dicetak Pada : $tarikhBln</td>
    </tr>

</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

// -------- view XHTML ---------------------------------------------------------
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// -----------------------------------------------------------------------------
	
		/*$sqlvtp1 = mysql_query("SELECT * FROM departure WHERE tarikh_berlepas = '$tarikh1' AND kod_feri = '$kodferi1' AND status = '$statuspas1'");

		$debitOutput = "";
		$i = $offset + 1;
		while ($result1 = mysql_fetch_array($sqlvtp1))
		{
			$debitOutput = '
			<tr>
				<td align="center">'.$i.'</td>
				<td align="left">&nbsp;&nbsp;&nbsp;'.$result1['nama'].'</td>
				<td align="left">&nbsp;&nbsp;&nbsp;'.$result1['passport_no'].'<br/>&nbsp;&nbsp;&nbsp;'.$result1['ic_no'].'</td>
				<td align="center">'.$result1['jantina'].'</td>
				<td align="center">'.$result1['umur'].'</td>
				<td align="center">'.$result1['bangsa'].'</td>
				<td align="left">&nbsp;&nbsp;&nbsp;'.$result1['kerakyatan'].'</td>
			</tr>';
			$i++;
		}*/
		
//---------

if ($tarikhBln<>"")
{
	$y = date("M");
	if(($y = "Jan")||($y = "March")||($y = "May")||($y = "Jul")||($y = "Sept")||($y = "Nov"))
	{
		$max = "31";
	}
	elseif($y = "Feb")
	{
		$max = "28";
	}
	else
	{
		$max = "30";
	}
				
	$debitOutput = "";
	$offset = 0;
	$i=$offset+1;		
					
	while ($i<$max) 
	{
		//Bengkalis  -- kod:01, cajPenumpang=(berlepas*RM10), cajBoarding=(berlepas*RM10)
		$sqlBP = mysql_query("SELECT count(*) as bilBP, tarikh_berlepas FROM departure WHERE tarikh_berlepas LIKE '%$i-$tarikhBln%'
		AND destinasi = 'Bengkalis' AND STATUS =  'Pelepasan'");
		$rowvtp2 = mysql_fetch_assoc($sqlBP);
				
		$sqlBK = mysql_query("SELECT count(*) as bilBK, tarikh_berlepas FROM departure WHERE tarikh_berlepas LIKE '%$i-$tarikhBln%'
		AND destinasi = 'Bengkalis' AND STATUS =  'Ketibaan'");
		$rowvtp3 = mysql_fetch_assoc($sqlBK);
		//-----
						
		//Dumai -- kod:02
		$sqlDP = mysql_query("SELECT count(*) as bilDP, tarikh_berlepas FROM departure WHERE tarikh_berlepas LIKE '%$i-$tarikhBln%'
		AND destinasi = 'Dumai' AND STATUS =  'Pelepasan'");
		$rowvtp = mysql_fetch_assoc($sqlDP);
						
		$sqlDK = mysql_query("SELECT count(*) as bilDK, tarikh_berlepas FROM departure WHERE tarikh_berlepas LIKE '%$i-$tarikhBln%'
		AND destinasi = 'Dumai' AND STATUS =  'Ketibaan'");
		$rowvtp1 = mysql_fetch_assoc($sqlDK);
						
		//---- Ada 
		//Caj Bagasi -- 1 feri = RM100 , --> masuk = RM100, keluar = RM100
		$sqlcbbilferikluar = mysql_query("SELECT count(kod_feri) as bilcbkluar, tarikh_berlepas FROM departure WHERE tarikh_berlepas LIKE '%$i-$tarikhBln%'
		AND STATUS =  'Pelepasan'");
		$rowvcbbilferikluar = mysql_fetch_assoc($sqlcbbilferikluar);
						
		$sqlcbbilferimasuk = mysql_query("SELECT count(kod_feri) as bilcbmasuk, tarikh_berlepas FROM departure WHERE tarikh_berlepas LIKE '%$i-$tarikhBln%'
		AND STATUS =  'Ketibaan'");
		$rowvcbbilferimasuk = mysql_fetch_assoc($sqlcbbilferimasuk);
						
		$sqlcbbilcajLain2 = mysql_query("SELECT count(kod_feri) as bilcajLain2, tarikh_berlepas FROM departure WHERE tarikh_berlepas LIKE '%$i-$tarikhBln%'
		AND STATUS LIKE '%Pelbagai%'");
		$rowvcbbilcajLain2 = mysql_fetch_assoc($sqlcbbilcajLain2);
						
						
	
	//$sqlvtp = mysql_query("SELECT * FROM departure WHERE tarikh_berlepas = '$tarikh1' AND kod_feri = '$kodferi1' AND status = '$statuspas1'");

	//$debitOutput = "";
	//$i = $offset + 1;
	//while ($result=mysql_fetch_array($sqlvtp))
	//{
	$z = $i-"0";
		$debitOutput .= '
		<tr>
			<td align="center">'.$i.'-'.$tarikhBln.'</td>
			<td align="left">'.date("l", strtotime("+".$z." day ".date('M')."-".date('Y')."")).'</td>
			<td align="center">'.$rowvtp1['bilDK'].'</td>
			<td align="center">'.$rowvtp['bilDP'].'</td>
			<td align="center">'.$Dcp = (10* $rowvtp['bilDP']).'</td>
			<td align="center">'.$Dcb = (10* $rowvtp['bilDP']).'</td>
			<td align="center">'.$rowvtp3['bilBK'].'</td>
			<td align="center">'.$rowvtp2['bilBP'].'</td>
			<td align="center">'.$Bcp = (10* $rowvtp2['bilBP']).'</td>
			<td align="center">'.$Bcb = (10* $rowvtp2['bilBP']).'</td>
			<td align="center">'.$cukaiTerminal = (100 * $rowvcbbilferikluar['bilcbkluar']).'</td>
			<td align="center">'.$cajBagasi = (1 * $rowvcbbilferimasuk['bilcbmasuk']).'</td>
			<td align="center">'.$Lain2caj = $rowvcbbilcajLain2['bilcajLain2'].'</td>
			<td align="center">'.$Jumlah = ((10* $rowvtp['bilDP']) + (10* $rowvtp['bilDP']) + (10* $rowvtp2['bilBP']) + (10* $rowvtp2['bilBP']) + (100 * $rowvcbbilferikluar['bilcbkluar']) + (1 * $rowvcbbilferimasuk['bilcbmasuk']) + $rowvcbbilcajLain2['bilcajLain2']).'</td>			
		</tr>';
		$i++;
	}
	
}



$tbl = '
		<table cellspacing="1" cellpadding="2" border="1" width="100%">
			<tr style="background-color:#CEE3F6;color:#000000;">
				<td align="center" width="7%" ><strong>Bil</strong></td>
				<td align="center" width="7%" ><strong>Tarikh</strong></td>
				<td align="center" width="26%" ><strong>No. Rujukan Surat</strong></td>
				<td align="center" width="26%" ><strong>Pengirim</strong></td>	
				<td align="center" width="10%" ><strong>Penerima</strong></td>
				<td align="center" width="7%" ><strong>Perkara / Tajuk Surat</strong></td>
				<td align="center" width="10%" ><strong>Kaedah Penghantaran</strong></td>
				<td align="center" width="10%" ><strong>Remarks</strong></td>
			</tr>
				'.$debitOutput.'
		</table>
		';
		




$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_048.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
