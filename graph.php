<?php // content="text/plain; charset=utf-8"
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_line.php');
include('database.php');
session_start();

$datay1 = array(); //turnover
$datay2 = array(); //profit
$data_year = array(); //years

$q_get_finance= "select years,turnover,profit from finance where proposal_id = '$_SESSION[proposal_id]' ORDER BY years ASC";
$hq_get_finance= mysql_db_query($DataBase,$q_get_finance);
while(list($year,$turnover,$profit) = mysql_fetch_row($hq_get_finance))
{		
array_push($datay1, $turnover);
array_push($datay2, $profit);
array_push($data_year, $year);
}

function separator1000_sgd($aVal) {
    return '$'.number_format($aVal);
}


// Setup the graph
$graph = new Graph(870,300,"auto");
$graph->img->SetMargin(50,50,40,20);
$graph->SetScale("textint");

$theme_class=new UniversalTheme;

$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false);
$graph->title->Set('Finance Table');
$graph->subtitle->Set('Previous and Projected Finance' );
$graph->SetBox(false);

$graph->img->SetAntiAliasing();

$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);
$graph->xaxis->title->Set('Year');
$graph->xaxis->title->SetMargin(0);
$graph->xaxis->title->SetFont(FF_ARIAL,FS_NORMAL,11);

$graph->yaxis->title->Set('SGD');
$graph->yaxis->title->SetMargin(0);
$graph->yaxis->title->SetFont(FF_ARIAL,FS_NORMAL,11);


$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("solid");
$graph->xaxis->SetTickLabels($data_year);
$graph->xgrid->SetColor('#E3E3E3');

// Create the first line
$p1 = new LinePlot($datay1);

$graph->Add($p1);
$p1->SetColor("#6495ED");
$p1->SetLegend('TurnOver');
$p1->mark->SetType(MARK_FILLEDCIRCLE);
$p1->mark->SetFillColor("blue");
$p1->mark->SetWidth(4);
$p1->value->SetFormatCallback('separator1000_sgd');
$p1->SetCenter(0.5, 0.4);  
$p1->value->Show();

$graph->legend->SetPos(0.5,0.98,'center','bottom');
// Create the second line
$p2 = new LinePlot($datay2);
$graph->Add($p2);
$p2->SetColor("#B22222");
$p2->SetLegend('Profit');
$p2->mark->SetType(MARK_FILLEDCIRCLE);
$p2->mark->SetFillColor("red");
$p2->mark->SetWidth(4);
$p2->value->SetFormatCallback('separator1000_sgd');
 
$p2->value->Show();



$graph->legend->SetFrameWeight(1);

$graph->graph_theme=null;  
// Output line
$graph->Stroke();

?>
