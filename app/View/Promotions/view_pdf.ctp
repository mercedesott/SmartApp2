<?php 
App::import('Vendor','xtcpdf');  
// create new PDF document
$tcpdf = new XTCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false); 
$textfont = 'freesans'; // looks better, finer, and more condensed than 'dejavusans' 

// set document information
$tcpdf->SetAuthor("SmartApp- Mercedes Ott, Elisa Peirano, Nicolas Saiz, Constanza Trigo"); 
$tcpdf->SetCreator(PDF_CREATOR);
$tcpdf->SetTitle('Reporte de Promociones');

// set default header and footer data 
$tcpdf->SetHeaderData('', '', 'Reporte de Promociones', '');
$tcpdf->setHeaderFont(array($textfont,'',40)); 
$tcpdf->xheadercolor = array(150,0,0); 
$tcpdf->xheadertext = 'Reporte de Promociones'; 
//$tcpdf->xheadertext = '';
$tcpdf->xfootertext = 'Copyright SmartApp. All rights reserved.';

//set margins
$tcpdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$tcpdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$tcpdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$tcpdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// add a page (required with recent versions of tcpdf) 
$tcpdf->AddPage(); 

// Now you position and print your page content 
// example:  

$tcpdf->SetTextColor(0, 0, 0); 
$tcpdf->SetFont($textfont,'',10); 
//$tcpdf->Cell(0,14, "Hello World", 0,1,'L');


	$tbl_header = '<table>
						<tr>
							<th style= "font-weight:bold";>Producto</th>
							<th style= "font-weight:bold";>Fecha de Inicio</th>
							<th style= "font-weight:bold";>Fecha de Fin</th>
							<th style= "font-weight:bold";>Hora de Inicio</th>
							<th style= "font-weight:bold";>Hora de Fin</th>
							<th style= "font-weight:bold";>Descripcion</th>
							<th style= "font-weight:bold";>Precio Promocion</th>
							<th style= "font-weight:bold";>Precio Original</th>
						</tr>';
	$tbl_footer = '</table>';
	$tbl = '';

foreach ($promotions as $promotion):
	//$id = $promotion['Promotion']['id'];
	$product = $promotion['Product']['name'];
	$start_date = $promotion['Promotion']['start_date'];
	$finish_date = $promotion['Promotion']['finish_date'];
	$start_time = $promotion['Promotion']['start_time'];
	$finish_time = $promotion['Promotion']['finish_time'];
	$description = $promotion['Promotion']['description'];
	$new_price = $promotion['Promotion']['new_price'];
	$old_price = $promotion['Promotion']['old_price'];
	//$tcpdf->Cell(0,14, $id.'-'.$product.'-'.$start_date.'-'.$finish_date.'-'.$start_time.'-'.$finish_time.'-'.$description.'-'.$new_price.'-'.$old_price, 0,1,'L');



	// foreach item in your array...
	$tbl .= '
    	<tr>
        	<td>'.$product.'</td>
        	<td>'.$start_date.'</td>
        	<td>'.$finish_date.'</td>
        	<td>'.$start_time.'</td>
        	<td>'.$finish_time.'</td>
        	<td>'.$description.'</td>
        	<td>'.$new_price.'</td>
        	<td>'.$old_price.'</td>
    	</tr>
	';

endforeach;

$tcpdf->writeHTML($tbl_header . $tbl . $tbl_footer, true, false, false, false, 'C');

// ... 
// etc. 
// see the TCPDF examples  
$today = date("Y-m-d");

echo $tcpdf->Output('Reporte de Promociones '.$today.'.pdf', 'D'); 

?>