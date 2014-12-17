<?php
error_reporting(0);
backup_tables('localhost','root','','dbelection');//host-name,user-name,password,DB name
$img='<img src="../photo/backup2.png" height="100px" width="300px" />';
echo "$img";
/* backup the db OR just a table */
function backup_tables($host,$user,$pass,$name,$tables = '*')
{
$return = "";
$link = mysql_connect($host,$user,$pass);
mysql_select_db($name,$link);
//get all of the tables
if($tables == '*')
{
$tables = array();
$result = mysql_query('SHOW TABLES');
while($row = mysql_fetch_row($result))
{
$tables[] = $row[0];
}
}
else
{
$tables = is_array($tables) ? $tables : explode(',',$tables);
}
//cycle through
foreach($tables as $table)
{
$result = mysql_query('SELECT * FROM '.$table);
$num_fields = mysql_num_fields($result);
$return.= 'DROP TABLE IF EXISTS '.$table.';';
$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
$return.= "\n\n".$row2[1].";\n\n";
for ($i = 0; $i < $num_fields; $i++)
{
while($row = mysql_fetch_row($result))
{
$return.= 'INSERT INTO '.$table.' VALUES(';
for($j=0; $j<$num_fields; $j++)
{
$row[$j] = addslashes($row[$j]);
$row[$j] = ereg_replace("\n","\\n",$row[$j]);
if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
if ($j<($num_fields-1)) { $return.= ','; }
}
$return.= ");\n";
}
}
$return.="\n\n\n";
}
//save file
$folder = '../database_backup/';
if (!is_dir($folder))
mkdir($folder, 0777, true);
chmod($folder, 0777);
$date = date('m-d-Y'); 
$handle = fopen($folder.'db_backup-'.time().'_'.$date.'.sql','w+');
// echo $return;
fwrite($handle,$return);
fclose($handle);
}
?>  
    
   
 
   







