<?php
$invoiceItems = $_POST;	
$output = '<h2>Invoice</h2><table width="100%" border="1" cellpadding="5" cellspacing="0">
<tr>
	<th align="left">Sr No.</th>
	<th align="left">Item Name</th>
	<th align="left">Quantity</th>
	<th align="left">Price($)</th>
	<th align="left">Tax</th>
	<th align="left">Line Total</th> 
	</tr>';
	$count = 0;   
	for ($i = 0; $i < count($invoiceItems['productName']); $i++) {
		$count++;
		$output .= '<tr><td>'.$count.'</td><td>'.$invoiceItems['productName'][$i].'</td><td>'.$invoiceItems['quantity'][$i].'</td><td>'.$invoiceItems['price'][$i].'</td><td>'.$invoiceItems['taxRate'][$i].'</td><td>'.$invoiceItems['lineTotal'][$i].'</td></tr>';
			
		}
$output .= '
	<tr>
	<td align="right" colspan="5"><b>Subtotal without tax:  </b></td>
	<td align="left"><b>'.$invoiceItems['subTotal'].'</b></td>
	</tr>
	<tr>
	<td align="right" colspan="5"><b>Discount($):</b> </td>
	<td align="left"><b>'.$invoiceItems['discount'].'</b></td>
	</tr>
	<tr>
	<td align="right" colspan="5"><b>Subtotal with tax :</b></td>
	<td align="left"><b>'.$invoiceItems['totalAftertax'].'</b></td>
	</tr>
	<tr>
	<td align="right" colspan="5"><b>Total(Discount added):</b> </td>
	<td align="left"><b>'.$invoiceItems['total'].'</b></td>
	</tr>';

$output .= '
	</table>
	</td>
	</tr>
	</table>';

	$invoiceFileName = 'Invoice_1.pdf';
require_once 'dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$dompdf->loadHtml(html_entity_decode($output));
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream($invoiceFileName, array("Attachment" => false));
?>   
   