<?
	session_start();
	include "../../../init.php";
	include "../../../includes/dbconfig.php";

	//Table Base Classs
	require_once("../../../fpdf/class.fpdf_table.php");

	//Class Extention for header and footer	
	require_once("../../../fpdf/header_footer.inc");

	
	//Table Defintion File
	require_once("../../../fpdf/table_def.inc");


    class PDF extends FPDF
    {

    	function MultiCell($w,$h,$txt,$border=0,$align='J',$fill=0,$maxline=0)
    	{
    		//Output text with automatic or explicit line breaks, maximum of $maxlines
    		$cw=&$this->CurrentFont['cw'];
    		if($w==0)
    			$w=$this->w-$this->rMargin-$this->x;
    		$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
    		$s=str_replace("\r",'',$txt);
    		$nb=strlen($s);
    		if($nb>0 and $s[$nb-1]=="\n")
    			$nb--;
    		$b=0;
    		if($border)
    		{
    			if($border==1)
    			{
    				$border='LTRB';
    				$b='LRT';
    				$b2='LR';
    			}
    			else
    			{
    				$b2='';
    				if(is_int(strpos($border,'L')))
    					$b2.='L';
    				if(is_int(strpos($border,'R')))
    					$b2.='R';
    				$b=is_int(strpos($border,'T')) ? $b2.'T' : $b2;
    			}
    		}
    		$sep=-1;
    		$i=0;
    		$j=0;
    		$l=0;
    		$ns=0;
    		$nl=1;
		
    		$count = 0;
    		while($i<$nb)
    		{
    			//Get next character
    			$c=$s[$i];
    			if($c=="\n")
    			{
    				//Explicit line break
    				if($this->ws>0)
    				{
    					$this->ws=0;
    					$this->_out('0 Tw');
    				}
    				$this->Cell($w,$h,substr($s,$j,$i-$j),$b,2,$align,$fill);
    				$i++;
    				$sep=-1;
    				$j=$i;
    				$l=0;
    				$ns=0;
    				$nl++;
    				if($border and $nl==2)
    					$b=$b2;
    				if ( $maxline  && $nl > $maxline )
    					return substr($s,$i);

    				$count++;
    				continue;
    			}
    			if($c==' ')
    			{
    				$sep=$i;
    				$ls=$l;
    				$ns++;
    			}
    			$l+=$cw[$c];
    			if($l>$wmax)
    			{
    				//Automatic line break
    				if($sep==-1)
    				{
    					if($i==$j)
    						$i++;
    					if($this->ws>0)
    					{
    						$this->ws=0;
    						$this->_out('0 Tw');
    					}
    					$this->Cell($w,$h,substr($s,$j,$i-$j),$b,2,$align,$fill);
    				}
    				else
    				{
    					if($align=='J')
    					{
    						$this->ws=($ns>1) ? ($wmax-$ls)/1000*$this->FontSize/($ns-1) : 0;
    						$this->_out(sprintf('%.3f Tw',$this->ws*$this->k));
    					}
    					$this->Cell($w,$h,substr($s,$j,$sep-$j),$b,2,$align,$fill);
    					$i=$sep+1;
    				}
    				$sep=-1;
    				$j=$i;
    				$l=0;
    				$ns=0;
    				$nl++;
    				if($border and $nl==2)
    					$b=$b2;
    				if ( $maxline  && $nl > $maxline )
    					return substr($s,$i);
    				$count++;
    			}
    			else
    				$i++;
            }
    		//Last chunk
    		if($this->ws>0)
    		{
    			$this->ws=0;
    			$this->_out('0 Tw');
    		}
    		if($border and is_int(strpos($border,'B')))
    			$b.='B';
    		$this->Cell($w,$h,substr($s,$j,$i-$j),$b,2,$align,$fill);
    		$this->x=$this->lMargin;

    		$count++;
    		return $count;
    	}
    }



	$pdf = new pdf_usage();		
	$pdf->Open();
	$pdf->SetAutoPageBreak(true, 20);
    $pdf->SetMargins(1, 20, 0);
	$pdf->AddPage();
	$pdf->AliasNbPages(); 

	$pdf->Ln(15);
	

	$bg_color1 = array(234, 255, 218);
	$bg_color2 = array(0, 0, 0);
	$bg_color3 = array(255, 252, 249);	
	
	
	$columns = 7;
	
	//Initialize the table class
	$pdf->tbInitialize($columns, true, true);
	
	//set the Table Type
	$pdf->tbSetTableType($table_default_table_type);
	
	//Table Header
	for($i=0; $i<$columns; $i++) $header_type[$i] = $table_default_header_type;
	
	for($i=0; $i<$columns; $i++) {
		$header_type1[$i] = $table_default_header_type;
		$header_type2[$i] = $table_default_header_type;
		
		$header_type2[$i]['T_COLOR'] = array(10,20, 100);
		$header_type2[$i]['BG_COLOR'] = $bg_color2;
	}

	$header_type1[0]['WIDTH'] = 8;
	$header_type1[1]['WIDTH'] = 30;
	$header_type1[2]['WIDTH'] = 20;
	$header_type1[3]['WIDTH'] = 35;
	$header_type1[4]['WIDTH'] = 35;
	$header_type1[5]['WIDTH'] = 40;
	$header_type1[6]['WIDTH'] = 30;

	
	$header_type1[0]['TEXT'] = "No.";
	$header_type1[1]['TEXT'] = "No. Surat/Memo";
	$header_type1[2]['TEXT'] = "Tgl. Surat/Memo";
	$header_type1[3]['TEXT'] = "Pengirim";
	$header_type1[4]['TEXT'] = "Diteruskan/Ditujukan";
	$header_type1[5]['TEXT'] = "Subyek";
	$header_type1[6]['TEXT'] = "Paraf";
	
	
	$aHeaderArray = array(
		$header_type1
	);	

	//set the Table Header
	$pdf->tbSetHeaderType($aHeaderArray, true);
	
	//Draw the Header
	$pdf->tbDrawHeader();
	
	
	switch($_SESSION['s_report_type'])
	{
		case "inbox" :
			//Details
			$q_list		= "SELECT 
							$TDocuments.doc_id, 
							$TDocuments.doc_number, 
							$TDocuments.dates, 
							$TDocuments.sender_id, 
							$TSender.sender_name,
							$TDocuments.sender_notes,
							$TDocuments.description, 
							$TDocuments.subject
							FROM $TDocuments
								LEFT OUTER JOIN $TSender on ($TDocuments.sender_id = $TSender.sender_id)
							WHERE 
								($TDocuments.user_id = '$_SESSION[s_user_id]') AND 
								($TDocuments.doc_id IN $_SESSION[s_doc_id])";
								
			//echo $q_list;					
			$hq_list	= mysql_db_query($DataBase,$q_list);
			$idx = 0;
			while(list($doc_id, $doc_number, $dates, $sender_id, $sender_name, $sender_notes, $description,$subject) = mysql_fetch_row($hq_list))
			{
				$lists[$idx]["doc_id"]		= $doc_id;
				$lists[$idx]["doc_number"]	= $doc_number;
				$lists[$idx]["dates"]		= $dates;
				
				if ($sender_id == "0")
				{
					$lists[$idx]["sender_name"]	= $sender_notes;
				}
				else
				{
					$lists[$idx]["sender_name"]	= $sender_name;
				}

				$lists[$idx]["description"]		= $description;
				$lists[$idx]["subject"]			= $subject;
				$lists[$idx]["to_user_name"]	= $_SESSION["s_user_name"];

				$idx++;
			}
			
								
			break;

		case "outbox" :
			//Details
			$q_list		= "SELECT 
							$TDocuments.doc_id, 
							$TDocuments.doc_number, 
							$TDocuments.dates, 
							$TDocuments.sender_id, 
							$TSender.sender_name,
							$TDocuments.sender_notes,
							$TDocuments_D.to_user, 
							$TUsers.user_name, 
							$TDocuments.subject
							FROM $TDocuments
								LEFT OUTER JOIN $TSender on ($TDocuments.sender_id = $TSender.sender_id)
								INNER JOIN $TDocuments_D on ($TDocuments.doc_id = $TDocuments_D.doc_id)
								INNER JOIN $TUsers on ($TDocuments_D.to_user = $TUsers.user_id)
							WHERE ($TDocuments_D.from_user = '$_SESSION[s_user_id]') AND 
							($TDocuments_D.inbox_id IN $_SESSION[s_doc_id])";
							
			//echo $q_list;					
			$hq_list	= mysql_db_query($DataBase,$q_list);
			$idx = 0;
			while(list($doc_id, $doc_number, $dates, $sender_id, $sender_name, $sender_notes, $to_user, $to_user_name, $subject) = mysql_fetch_row($hq_list))
			{
				$lists[$idx]["doc_id"]		= $doc_id;
				$lists[$idx]["doc_number"]	= $doc_number;
				$lists[$idx]["dates"]		= $dates;
				
				if ($sender_id == "0")
				{
					$lists[$idx]["sender_name"]	= $sender_notes;
				}
				else
				{
					$lists[$idx]["sender_name"]	= $sender_name;
				}

				$lists[$idx]["subject"]			= $subject;
				$lists[$idx]["to_user_name"]	= $to_user_name;

				$idx++;
			}
							

			break;

			
	}

	//echo $q_list;

	//Table Data Settings
	$data_type = Array();//reset the array
	for ($i=0; $i<$columns; $i++) $data_type[$i] = $table_default_data_type;

	$pdf->tbSetDataType($data_type);
	
	for ($j=0; $j < $idx; $j++)
	{
		$data = Array();
		$no	= $j + 1;
		$data[0]['TEXT'] 		= $no;
		$data[0]['T_ALIGN'] 	= "L";
		$data[0]['V_ALIGN'] 	= "T";
		
		$data[1]['TEXT'] 		= $lists[$j]["doc_number"];
		$data[1]['T_ALIGN'] 	= "L";
		$data[1]['V_ALIGN'] 	= "T";

		$data[2]['TEXT'] 		= $lists[$j]["dates"];
		$data[2]['T_ALIGN'] 	= "L";
		$data[2]['V_ALIGN'] 	= "T";
		
		$data[3]['TEXT'] 		= $lists[$j]["sender_name"];
		$data[3]['T_ALIGN'] 	= "L";
		$data[3]['V_ALIGN'] 	= "T";

		$data[4]['TEXT'] 		= $lists[$j]["to_user_name"];
		$data[4]['T_ALIGN'] 	= "L";
		$data[4]['V_ALIGN'] 	= "T";

		$data[5]['TEXT'] 		= $lists[$j]["subject"];
		$data[5]['T_ALIGN'] 	= "L";
		$data[5]['V_ALIGN'] 	= "T";
		
		$data[6]['TEXT'] 		= "";
		$data[6]['T_ALIGN'] 	= "L";
		$data[6]['V_ALIGN'] 	= "T";

		$pdf->tbDrawData($data);
	}

	
	
	//output the table data to the pdf
	$pdf->tbOuputData();
	
	//draw the Table Border
	$pdf->tbDrawBorder();	

	$pdf->Output();
	
	
	
	/*
    //$page = array(200,190);
    $pdf  =new PDF("P","mm","A4");
	
    $pdf->AliasNbPages();
	
	//Halaman Sampul
    $pdf->AddPage("P");
    $pdf->SetMargins(5,1,1);
	$pdf->Ln(1.5);
	
	$x=10;
	$y=10;
	
	$pdf->SetXY($x, $y);
	$pdf->Image("../../../images/logo-report.jpg", $x, $y);

	$x	= $x + 120;
	$y	= $y + 5;
	$pdf->SetXY($x, $y);
	$pdf->SetFont('Times','BU',20);
    $pdf->MultiCell(70, 10, $_SESSION[s_report_type], 0, "C");

	switch($_SESSION['s_report_type'])
	{
		case "inbox" :
			//Details
			$q_list		= "SELECT 
							$TDocuments.doc_id, $TDocuments.doc_number, $TDocuments.dates, 
							$TDocuments.sender_id, $TSender.sender_name, 
							$TDocuments.description
							FROM $TDocuments
								LEFT OUTER JOIN $TSender on ($TDocuments.sender_id = $TSender.sender_id)
							WHERE 
								($TDocuments.user_id = '$_SESSION[s_user_id]') AND 
								($TDocuments.doc_id IN $_SESSION[s_doc_id])";
			break;

		case "outbox" :
			//Details
			$q_list		= "SELECT 
							$TDocuments.doc_id, $TDocuments.doc_number, $TDocuments.dates, 
							$TDocuments_D.to_user, $TUsers.user_name, 
							$TDocuments_D.description
							FROM $TDocuments
								INNER JOIN $TDocuments_D on ($TDocuments.doc_id = $TDocuments_D.doc_id)
								INNER JOIN $TUsers on ($TDocuments_D.to_user = $TUsers.user_id)
							WHERE ($TDocuments_D.from_user = '$_SESSION[s_user_id]') AND 
							($TDocuments_D.inbox_id IN $_SESSION[s_doc_id])";

			break;

			
	}

	//echo $q_list;
	$hq_list	= mysql_db_query($DataBase,$q_list);
	$i = 0;
	while(list($doc_id, $doc_number, $dates, $receiver_id, $receiver_name, $description) = mysql_fetch_row($hq_list))
	{
		$lists[$i]["doc_id"]		= $doc_id;
		$lists[$i]["doc_number"]	= $doc_number;
		$lists[$i]["dates"]			= $dates;
		$lists[$i]["sender_name"]	= $receiver_name;

		$lists[$i]["description"]		= $description;

		$i++;
	}

	$x	= 10;
	$y	= $y + 20;
	$pdf->SetXY($x, $y);
	$pdf->SetFont("Times", "", 12);

    $pdf->Cell(25, 10, "No. Surat", 1, 0, "C");
    $pdf->Cell(25, 10, "Tanggal", 1, 0, "C");
    $pdf->Cell(55, 10, "Pengirim / Penerima", 1, 0, "C");
    $pdf->Cell(70, 10, "Perihal", 1, 1, "C");
	
	$x	= 10;
	$y	= $y + 10;
	$y_new	= $y;
	$pdf->SetXY($x, $y);
	
	
	$row_height	= 10;
	for ($idx = 0;$idx < $i; $idx++)
	{
		$pdf->SetXY($x,$y_new);
		$y	= $pdf->GetY();
		
	    $pdf->MultiCell(25, 7, $lists[$idx]["doc_number"], 0, "L");
		$x	= $x + 105;
		$y_number	= $pdf->GetY();
		$height_number	= $y_number - $y;
		
		$pdf->SetXY($x,$y);

		$pdf->MultiCell(70, 8, $lists[$idx]["description"], 0, "L");
		$y_desc	= $pdf->GetY();
		$height_desc	= $y_desc - $y;
		
		if ($height_number > $height_desc)
		{
			$row_height	= $height_number;
		}
		else
		{
			$row_height	= $height_desc;
		}
		
		$x = 10;
		$pdf->SetXY($x,$y_new);


	    $pdf->Cell(25, $row_height, "", 1, 0, "L");
	    $pdf->Cell(25, $row_height, $lists[$idx]["dates"], 1, 0, "T");
	    $pdf->Cell(55, $row_height, $lists[$idx]["sender_name"], 1, 0, "L");
	    $pdf->Cell(70, $row_height, "", 1, 1, "L");

		
		$x = 10;
	
	}
	
    $pdf->Output();
	*/
	
	
?>
