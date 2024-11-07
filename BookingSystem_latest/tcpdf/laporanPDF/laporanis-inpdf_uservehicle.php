<?php
include('../../functions.php');
date_default_timezone_set('UTC');

$tarikhBln = date('d-m-Y');

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('wedud kacak');
$pdf->SetTitle('MICTH');
$pdf->SetSubject('MICTH');
$pdf->SetKeywords('MICTH, Melaka, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' ', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

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
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
  require_once(dirname(__FILE__) . '/lang/eng.php');
  $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', 'B', 20);

// add a page
$pdf->AddPage('L', 'A4');

$pdf->Write(0, 'REKOD PENGGUNAAN KERETA MICTH', '', 0, 'L', true, 0, false, false, 0);

$pdf->SetFont('helvetica', '', 8);

$html = <<<EOF
<br/>

  <div id="chartContainer" style="height: 300px; width: 50%;">
  </div>


EOF;

$tbl = <<<EOD
<table cellspacing="0" cellpadding="1" border="0">
    <tr>
       <td>MAKLUMAT DICETAK PADA : $tarikhBln</td>
    </tr>
</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

include('../../db_conn.php');

if (!$db) {
  die("Connection failed: " . mysqli_connect_error());
}
$id = $_POST['id'];$sql = "SELECT * FROM management WHERE user_id = '$id'";


$result = $db->query($sql);

$debitOutput = '';

$i = 1;

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $debitOutput .= '<tr>';
    $debitOutput .= '<td align="center">' . $i . '</td>';
    $debitOutput .= '<td align="center">' . $row["user_name"] . '</td>';
    $debitOutput .= '<td>' . $row["date"] . ' / ' . $row["currenttime"] . '</td>';
    $debitOutput .= '<td>' . $row["start_date"] . '</td>';
    $debitOutput .= '<td>' . $row["purpose"] . '</td>';
    $debitOutput .= '<td>' . $row["destination"] . '</td>';
    $debitOutput .= '<td align="center">' . $row["model_plat"] . '</td>';
    $debitOutput .= '<td>' . ($row['fuel_card'] == 1 ? 'Fuel Card' : '') . ($row['tng_card'] == 1 ? ', Touch \'n Go Card' : '') . '</td>';
    $debitOutput .= '<td align="center">' . $row["status"] . '</td>';

    $debitOutput .= '</tr>';
    $i++;
  }
} else {
  $debitOutput .= '<tr><td colspan="8" align="center">Tiada Rekod</td></tr>';
}

$tbl = '<table cellspacing="1" cellpadding="2" border="1" width="100%">';
$tbl .= '<tr style="background-color:#CEE3F6;color:#000000;">';
$tbl .= '<td align="center" width="5%"><strong>No.</strong></td>';
$tbl .= '<td align="center" width="15%"><strong>STAFF/DRIVER NAME</strong></td>';
$tbl .= '<td align="center" width="10%"><strong>DATE OF BOOKING/TIME</strong></td>';
$tbl .= '<td align="center" width="10%"><strong>DATE USE</strong></td>';
$tbl .= '<td align="center" width="15%"><strong>PURPOSE</strong></td>';
$tbl .= '<td align="center" width="15%"><strong>DESTINATION</strong></td>';
$tbl .= '<td align="center" width="10%"><strong>PLAT NUMBER</strong></td>';
$tbl .= '<td align="center" width="8%"><strong>ADDITIONAL</strong></td>';
$tbl .= '<td align="center" width="8%"><strong>STATUS</strong></td>';
$tbl .= '</tr>';
$tbl .= $debitOutput;
$tbl .= '</table>';

$pdf->writeHTML($tbl, true, false, false, false, '');

ob_end_clean();
$pdf->Output('example_048.pdf', 'I');
