<?php include('../include/connect_DB.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../css/index.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<form method="POST" action="#">
    <table width="300" height="100" border="0">
        <tr>
            <td colspan="2"><input type="text" name="fname" placeholder="First Name" class="log"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="text" name="mini" placeholder="Middle Initial" class="log"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="text" name="lname" placeholder="Last Name" class="log"></td>
        </tr>
        <tr>
            <td colspan="2">
            	<select name="pos" class="log">
					<?php
                        //include('../function/SelectPLName');
						$query="select * from tblposition";
						$res=mysql_query($query) or die (mysql_error());
						while($r=mysql_fetch_array($res)){
							echo "<option>";
							echo "".$r['PositionName'];
							echo "</option>";
						}
                    ?>
                </select>
            </td>
     	</tr>
        <tr>
            <td colspan="2">
            	<select name="plnameab" class="log">
					<?php
                        //include('../function/SelectPLName');
						$query="select PLNameAb from tblpartylist";
						$res=mysql_query($query) or die (mysql_error());
						while($r=mysql_fetch_array($res)){
							echo "<option>";
							echo "".$r['PLNameAb'];
							echo "</option>";
						}
                    ?>
                </select>
            </td>
     	</tr>
        <tr>
        	<td>
            	<?php include('../include/insert_Photo.php'); ?>
            </td>
        </tr>
    </table>
</form>


<form method="POST" action="#">
    <table width="300" height="100" border="0">
        <tr>
            <td colspan="2"><input type="text" name="plname" placeholder="Partylist Name" class="log"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="text" name="mini" placeholder="Abbreviation" class="log"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="text" name="desc" placeholder="Description" class="log"></td>
        </tr>
    </table>
</form>


<form method="POST" action="#">
    <table width="300" height="100" border="0">
        <tr>
            <td colspan="2"><input type="text" name="fname" placeholder="First Name" class="log"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="text" name="mini" placeholder="Middle Initial" class="log"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="text" name="lname" placeholder="Last Name" class="log"></td>
        </tr>
       	<tr>
            <td colspan="2">
                <select name="year" class="log">
                    <option>1st Year</option>
                    <option>2nd Year</option>
                    <option>3rd Year</option>
                    <option>4th Year</option>
                </select>
            </td>
         </tr>
    </table>
</form>


<form method="POST" action="#">
    <table width="300" height="100" border="0">
        <tr>
            <td colspan="2"><input type="text" name="name" placeholder="Name" class="log"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="text" name="uname" placeholder="User Name" class="log"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="password" name="pwd" placeholder="Password" class="log"></td>
        </tr>
    </table>
</form>
</body>
</html>