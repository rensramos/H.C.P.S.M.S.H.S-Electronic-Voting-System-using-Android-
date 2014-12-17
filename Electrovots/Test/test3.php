<?php
session_start();
include('../include/connect_DB.php');
include('../include/check_Login_Pages.php');
if(isset($_SESSION['sess_name'])){
	$name=$_SESSION['sess_name'];
	
}
?>
<html>
<head>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1252">
<TITLE>Make Charts from MySQL Table Data</TITLE>
<meta name="description" content="Make Charts from MySQL Table Data">
<meta name="keywords" content="Make Charts from MySQL Table Data,View MySQL Table Data as Charts,chart MySQL Table Data,php,javascript, dhtml, DHTML">

<STYLE TYPE="text/css">
BODY {margin-left:0; margin-right:0; margin-top:0;text-align:left;}
p, li, td {font:13px Verdana; color:black;text-align:left}
h1 {font:bold 28px Verdana; color:black;text-align:center}
h2 {font:bold 24px Verdana;text-align:center}
h3 {font:bold 15px Verdana;}
#myid {position:absolute;left:10px;top:117px;height:380px;border: solid 1px #000;}
#myform {position:absolute;left:50px;top:20px}
#label {position:absolute;left:400px;top:550px;}
.aDiv {
width: 68px;
border: solid 1px #000;
background-color: #e1e1e1;
font-size: 11px;
font-family: verdana;
color: #000;
padding: 5px;
overflow:hidden
}
.bDiv {
width: 68px;
border: none;
background-color: #fff;
font-size: 11px;
font-family: verdana;
color: #000;
padding: 5px;
overflow:hidden
}
</STYLE>
</head>
<body>

<div id='myform'>
<center><h1>Make Charts from MySQL Table Data</h1></center>
</div>

<?php
$month=array();
$amount=array();
$table="tblvoters";
$t=$table;
if(strlen($table) > 0){
$exists = mysql_query("SHOW TABLES LIKE '$table'") or die(mysql_error());
$num_rows = mysql_num_rows($exists);
if($num_rows>0){
$sql=mysql_query("SELECT * FROM $table");
if(mysql_num_rows($sql)>0){
unset($table);

while($row = mysql_fetch_array($sql)){
$m=htmlentities(stripslashes($row['FirstName']), ENT_QUOTES);
$a=htmlentities(stripslashes($row['VID']), ENT_QUOTES);
array_push ($amount, $a);
array_push ($month, $m);
}
$biggest=max($amount);

mysql_close();}}
else{echo '<script language="javascript">alert("No such table.");window.location="make-charts-from-mysql-table-data.php";</script>;';}
}
?>

<script language="javascript">

var m = <?php echo json_encode($month); ?>;
var a = <?php echo json_encode($amount); ?>;
var b = <?php echo json_encode($biggest); ?>;
var t = <?php echo json_encode($t); ?>;
var r=b/350;

if (a.length > 0 && m.length > 0) {
for (var i=0;i<a.length;i++){
var divTag = document.createElement("div");
divTag.id="a" + i;
divTag.setAttribute("align", "center");
divTag.style.marginLeft = (i*78+20)+"px";
divTag.style.position = "absolute";
divTag.style.bottom = 100+"px";
divTag.style.height = (a[i]/r)+"px";
divTag.className = "aDiv";
divTag.innerHTML = a[i];
document.body.appendChild(divTag);
}
for (var i=0;i<a.length;i++){
var divTag = document.createElement("div");
divTag.id="b" + i;
divTag.setAttribute("align", "center");
divTag.style.marginLeft = (i*78+20)+"px";
divTag.style.position = "absolute";
divTag.style.bottom = 70+"px";
divTag.style.height = 30+"px";
divTag.className = "bDiv";
divTag.innerHTML = m[i];
document.body.appendChild(divTag);
}

document.write("<div id='label'><h1>"+t+"</h1></div><div id='myid' style='min-width:"+(a.length*80)+"px; width:"+(a.length*80)+"px'> </div>");
}
</script>

</body>
</html>