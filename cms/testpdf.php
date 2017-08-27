<?php
//============================================================+
// File name   : example_006.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 006 for TCPDF class
//               WriteHTML and RTL support
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: WriteHTML and RTL support
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('../tcpdf/tcpdf.php');
include("../include/connection.php");

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 006');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);

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
//Code for getting dynamic data 
try{


if(isset($_POST['pdf'])){
    $ref_no = $_POST['temp_ref_no'];
}

$results = $db->query("SELECT * FROM coaching_information WHERE reference_no = '$ref_no'");
    while($row = $results->fetch_assoc()){

        $agent_name = $row['agent_fullname'];
        $os_name = $row['supervisor_name'];
        $om_name = $row['om_name'];
        $shift = $row['shift'];
        $date = $row['date'];
        $mv_fb = $row['motivational_feedback'];
        $dv_fb = $row['developmental_feedback'];
        $mf_screenshot = $row['mf_screenshot'];
        $df_screenshot = $row['df_screenshot'];
        $agent_commitment = $row['agent_commitment'];
        $timeline = $row['timeline'];
        $agent_signature = $row['agent_signature'];
        $os_signature = $row['os_signature'];
        $om_signature = $row['om_signature'];
    }

}catch(Exception $e){
    echo 'Catch!';
}

 
//OS Fullname
$results2 = $db->query("SELECT user_fullname FROM users WHERE username = '$os_name'");
    while($row = $results2->fetch_assoc()){
        $os_fullname = $row['user_fullname'];
    }

//OM Fullname
$results3 = $db->query("SELECT user_fullname FROM users WHERE username = '$om_name'");
    while($row = $results3->fetch_assoc()){
        $om_fullname = $row['user_fullname'];
    }
//End of data







// set font
$pdf->SetFont('dejavusans', '', 10);

// add a page
$pdf->AddPage();

// writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

// create some HTML content
$html = '
<img src="../images/swa-logo3.jpg" alt="test alt attribute" width="190" height="50" border="0" /><span style="font-size: 20px; text-decoration: underline">FOR REAL ANSWERS, TIMELY SOLUTIONS </span><br/>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');



$html = '<span><b>SMART Objective</b>:
               <b>S-</b>specific
               <b>M-</b>measureable
               <b>A-</b>agreed
               <b>R-</b>realistic
               <b>T-</b>timed
        </span>';

$pdf->SetFillColor(255,255,0);

$pdf->writeHTMLCell(0, 0, '', '', $html, 'LRTB', 1, 0, true, 'C', true);

// output some RTL HTML content
$html = '<div style="text-align:center">
            <b>V2T OPERATIONS</b><br/>
            <b>Scopeworks Asia, Inc.</b><br />
         </div>';
$pdf->writeHTML($html, true, false, true, false, '');


$html = '<div style="text-align:left">
            <b>Agent`s Name: </b>'.$agent_name.
            '<b> Shift: </b>'.$shift.
            '<b> Date: </b>'.$date.  
         '</div>';
$pdf->writeHTML($html, true, false, true, false, '');


// create some HTML content
$html = '
<table cellpadding="1" cellspacing="1" border="1">
    <tr style="text-align:center;">
        <td bgcolor="#000000" color="white">MOTIVATIONAL FEEDBACK</td>
    </tr>
   
    <tr>
        <td>1. Identify the Issue:<br/>
            '.$mv_fb.'
            <br /><img src="../images/'.$mf_screenshot.'" height="100" width="100"/>
        </td>
    </tr>

    <tr style="text-align:center;">
        <td bgcolor="#000000" color="white">DEVELOPMENTAL FEEDBACK</td>
    </tr>

    <tr>
        <td>2. Discuss the Problem:<br/>
            '.$dv_fb.'
            <br /><img src="../images/'.$df_screenshot.'" height="100" width="100"/>
        </td>
    </tr>

    <tr style="text-align:center;">
        <td bgcolor="#000000" color="white">ACTION PLAN</td>
    </tr>

    <tr>
        <td>3. Agent`s Commitment:<br/>
            '.$agent_commitment.'
        </td>
    </tr>

    <tr style="text-align:center;">
        <td bgcolor="#000000" color="white">TIMELINE</td>
    </tr>

    <tr>
        <td>4. Follow Ups:<br/>
            '.$timeline.'
        </td>
    </tr>
</table>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');


// test some inline CSS
$html = '<span style="font-size: small; font-style: italic;">*By affixing my signature below, I hereby confirm that the contents of this document have been fully discussed with me and that I accept and agree to all commitments, goal or agreement set herein.</span>
';
/*

$pdf->writeHTML($html, true, false, true, false, '');
// for Agent signature
$html = '<img src="../images/'.$agent_signature.'" height="80" width="80"/>';
$pdf->writeHTML($html, true, false, true, false, '');
// for Agent name
$html = $agent_name;
$pdf->writeHTML($html, true, false, true, false, '');


// for OS signature
$html = '<img src="../images/'.$os_signature.'" height="100" width="100"/>';
$pdf->writeHTML($html, true, false, true, false, '');
// for OS name
$html = $os_fullname;
$pdf->writeHTML($html, true, false, true, false, '');


// for OM signature
$html = '<img src="../images/'.$om_signature.'" height="100" width="100"/>';
$pdf->writeHTML($html, true, false, true, false, '');
// for OM name
$html = $om_fullname;
$pdf->writeHTML($html, true, false, true, false, '');

*/















// reset pointer to the last page
$pdf->lastPage();



// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('nameyourfile.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+