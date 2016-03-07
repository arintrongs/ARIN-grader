<?php
	include 'connect.php';
	include 'SupremeLibrary.php';
	$myJudge = new SupremeClass;
	while(true)
	{

		$str = "SELECT * FROM uploads WHERE checkt = 0";
		$query = mysql_query($str);	
		
		if(mysql_num_rows($query)!=0)
		{
			//echo "first";
			while($objResult = mysql_fetch_array($query))
			{
				$cq = "UPDATE uploads SET checkt = 1";
				mysql_query($cq);
				$strr = "SELECT * FROM problems WHERE id = ".$objResult["pnum"];
				$queryy = mysql_query($strr);
				$qRes = mysql_fetch_array($queryy);
				$myJudge->code = 'uploads/'.$objResult["own"].'/'.$objResult["name"];
				$myJudge->exct = 'a.out'; 
				$myJudge->ans = 'ans.sol'; 
				$myJudge->chk = 'check_general.cpp';
				$myJudge->lim = 'timeout';
				$myJudge->lim_mem = $qRes["mem"];
				$myJudge->lim_time = $qRes["time"];
				//echo $myJudge->code;
				if($myJudge->compile())
				{	
					//echo '5555';
					$result = '';
					$ut=0;
					$check =0 ;
					$score =0;
				    for($i = 1; $i <= $qRes["testcase"]; $i++)
				    {
				
				        $myJudge->in = 'problems/'.$objResult["pnum"].'/'.$i.'.in'; 
				        $myJudge->key = 'problems/'.$objResult["pnum"].'/'.$i.'.sol'; 
						$j_exec = $myJudge->execute();
						//echo $j_exec;
				        if($j_exec == 'F')
				        {
				        	if($myJudge->check() == '1')
				        	{
				        		$result .= 'P';
				        		$score++;
				        	}
				        	else
				        	{
				        		$result .= '-';
				        	}
							//echo $myJudge->check();
				            
				        }
				        else
				        {
				        	if($j_exec=='T')
				        		{
				        			$result .= 'T';
				        		}
				        		else
				        		{
				        			$result .= 'X';
				        		}
				        	$check++;
				        }
				        $ut+=$myJudge->use_time;
				        
				    }
				    $ORSown = $objResult["own"];
				    $ORSpnum = $objResult["pnum"];
				    $score = ($score/$qRes["testcase"])*100;
				    $str = "SELECT * FROM members WHERE username = '$ORSown' ";
				    $Result = mysql_fetch_array(mysql_query($str));
				    if($check == 0)
				    {
				    	if($Result["$ORSpnum"]==0)
				    	{
				    	$sth = "UPDATE problems SET passed = passed + 1 WHERE id = $ORSpnum";
				    	mysql_query($sth);
				    	}
				    	$sth = "UPDATE members SET `$ORSpnum` = 1 WHERE username = '$ORSown' ";
				    	mysql_query($sth);
				    	//echo $sth;
				    }
				    if($check > 0)
				    {
				    	$sth = "UPDATE members SET `$ORSpnum` = 2 WHERE username = '$ORSown' ";
				    	mysql_query($sth);
				    }
				    $sth = "UPDATE u_result SET `$ORSpnum` = '$result' WHERE username = '$ORSown' ";
				    mysql_query($sth);
				    $sth = "UPDATE u_score SET `$ORSpnum` = $score WHERE username = '$ORSown' ";
				    mysql_query($sth);
					$sth = "UPDATE uploads SET result = '$result', time = $ut, memory = $myJudge->use_mem, score = $score WHERE id = ".$objResult["id"];
					mysql_query($sth);
					
				}
			}
			
		}
		sleep(1);
	}
?>