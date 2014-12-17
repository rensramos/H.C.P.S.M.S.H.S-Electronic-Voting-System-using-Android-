<?php
include('connect_DB.php');
include('getYear.php');
	# ------- The graph values in the form of associative array
	$query = "SELECT c.FirstName, COUNT( c.FirstName ) 
			  FROM tblcandidate c
			  INNER JOIN tblvotes r ON c.CID = r.CandidateID
			  AND c.PositionID=3
			  AND c.SY='$year'
			  GROUP BY c.FirstName
			  ORDER BY 1";
	$query2= "SELECT COUNT(vid) FROM tblvoter WHERE status=1 ";
	$values=array();
	$res= mysql_query($query) or die (mysql_error());
	$res2= mysql_query($query2) or die (mysql_error());
	while($num=mysql_fetch_array($res2)){
		$num1=$num['0'];
	}
	$highest=0;
	while($r=mysql_fetch_array($res)){
		$r1=$r['0'];
		$r2=round($r['1']*100/$num1,2);
		$values+= array($r1 => $r2	);
		if($r2>$highest){
			$highest=$r2;
		}
	}

 
	$img_width=400;
	$img_height=300; 
	$margins=30;

 
	# ---- Find the size of graph by substracting the size of borders
	$graph_width=$img_width - $margins * 2;
	$graph_height=$img_height - $margins * 2; 
	$img=imagecreate($img_width,$img_height);

 
	$bar_width=40;
	$total_bars=count($values);
	$gap= ($graph_width- $total_bars * $bar_width ) / ($total_bars +1);

 
	# -------  Define Colors ----------------
	$bar_color=imagecolorallocate($img,0,64,128);
	$background_color=imagecolorallocate($img,240,240,255);
	$border_color=imagecolorallocate($img,200,200,200);
	$line_color=imagecolorallocate($img,220,220,220);
 
 
	# ------ Create the border around the graph ------

	imagefilledrectangle($img,1,1,$img_width-2,$img_height-2,$border_color);
	imagefilledrectangle($img,$margins,$margins,$img_width-1-$margins,$img_height-1-$margins,$background_color);

 
	# ------- Max value is required to adjust the scale	-------
	$max_value=100;
	$ratio= $graph_height/$max_value;

 
	# -------- Create scale and draw horizontal lines  --------
	$horizontal_lines=10;
	$horizontal_gap=$graph_height/$horizontal_lines;

	for($i=1;$i<=$horizontal_lines;$i++){
		$y=$img_height - $margins - $horizontal_gap * $i;
		imageline($img,$margins,$y,$img_width-$margins,$y,$line_color);
		$v=intval($horizontal_gap * $i /$ratio );
		imagestring($img,3,6,$y-5,$v,$bar_color);

	}
 
 
	# ----------- Draw the bars here ------
	for($i=0;$i< $total_bars; $i++){ 
		# ------ Extract key and value pair from the current pointer position
		list($key,$value)=each($values); 
		if($highest==$value){
			$bar_color = imagecolorallocate($img,255,107,107);
		}
		else{
			$bar_color=imagecolorallocate($img,52,152,219);
		}
		$x1= $margins + $gap + $i * ($gap+$bar_width) ;
		$x2= $x1 + $bar_width; 
		$y1=$margins +$graph_height- intval($value * $ratio);
		$y2=$img_height-$margins;
		imagestring($img,2,$x1,$y1-13,$value."%",$bar_color);
		imagestring($img,3,$x1,$img_height-20,$key,$bar_color);		
		imagefilledrectangle($img,$x1,$y1,$x2,$y2,$bar_color);
	}
	header("Content-type:image/png");
	imagepng($img);

?>
