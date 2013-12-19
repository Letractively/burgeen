<?php

require('invoice.php');
session_start();
include('database.php');



$pdf = new PDF_Invoice( 'P', 'mm', 'A4' );




			$q_get_data= "select transaction.invoice_no,transaction.date,user.first_name,user.last_name,transaction.pakage from transaction,user where user.user_id=transaction.user_id and user.user_id = '$_SESSION[user_id]' ORDER BY transaction.date DESC";
			$hq_get_data= mysql_db_query($DataBase,$q_get_data);
			
			while(list($invoice_no,$date,$first_name,$last_name,$pakage) = mysql_fetch_row($hq_get_data))
			{

$pdf->AddPage();
			
if($pakage=='pro')
{
$price ='S$99';
}else if($pakage=='global pro')
{
$price ='S$199';
}else if($pakage=='global pro extended')
{
$price='S$100';
}
if($pakage=='5_nudge')
{
$price='S$10';
}else if($pakage=='10_nudge')
{
$price='S$20';
}else if($pakage=='20_nudge')
{
$price='S$40';
}

$pdf->addSociete( "Ask.Burgeen.Com",
                  "JCU UT Campus\n" .
                  "Upper Thomson\n".
                  "Hotline: (65)-8888888 \n" );
$pdf->fact_dev( "Invoice No. ", "$invoice_no" );

$pdf->addDate( "$date");
$pdf->temporaire( "HAS BEEN PAID" );

$pdf->addPageNumber("1");
$pdf->addClientAdresse("Dear Mr/Ms. $first_name $last_name");


$cols=array( "No"    => 23,
             "ITEM"  => 78,
             "QUANTITY"     => 22,
             "PRICE"      => 26,
             "TOTAL PRICE" => 30);
$pdf->addCols( $cols);
$cols=array( "No"    => "L",
             "ITEM"  => "L",
             "QUANTITY"     => "C",
             "PRICE"      => "R",
             "TOTAL PRICE" => "R");
$pdf->addLineFormat( $cols);
$pdf->addLineFormat($cols);

$y    = 109;
$line = array( "No"    => "1.",
               "ITEM"  => "Pakage : $pakage  ",
               "QUANTITY"     => "1",
               "PRICE"      => "$price",
               "TOTAL PRICE" => "$price");
$size = $pdf->addLine( $y, $line );
$y   += $size + 2;

$pdf->total_price("$price");

$tot_prods = array( array ( "px_unit" => 600, "qte" => 1, "tva" => 1 ),
                    array ( "px_unit" =>  10, "qte" => 1, "tva" => 1 ));
$tab_tva = array( "1"       => 19.6,
                  "2"       => 5.5);
$pdf->total();
}





$pdf->Output();
?>
