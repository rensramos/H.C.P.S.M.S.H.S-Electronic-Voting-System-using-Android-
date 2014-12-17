<?php
include('getYear.php');
?>
<link href="../css/main.css" rel="stylesheet" type="text/css"/>

<div id="wrapper">
		<div id="topwhite"> </div><!-- topwhite -->
        <div id="menucontainer">
           <a href="../pages/main.php"> <div id="logo">
            </div><!--logo --></a>
            <div id="iconcontainer">
                <table id="table"  width="840px" height="140px"  cellpadding="0" cellspacing="0">
                    <tr>
                        <!--<td> 
                        	<p style="padding-top:50px;"><font size="7"><?php echo $year; ?></font></p>
                        </td>-->
                        <td>
                            <ul class="navigation">
                            <div id="icon2"></div>
                            <li class="n1"><a href="student_add.php">Register</a></li>
                            <li class="n2"><a href="student_view.php">Information</a></li>
                            </ul>
                            
                        </td>
                        <td>
                            <ul class="navigation">
                            <div id="icon3"></div>
                            <li class="n1"><a href="partylist_add.php">Register</a></li>
                            <li class="n2"><a href="partylist_view.php">Information</a></li>
                           
                            </ul>
                        </td>
                        <td>
                            <ul class="navigation">
                            <div id="icon4"></div>
                           <!-- <li class="n1"><a href="partylistadd.php">Add Party List</a></li>-->
                            <li class="n1"><a href="candidate_add.php">Register</a></li>
                            <li class="n2"><a href="candidate_view.php">Information</a></li>
                            </ul>
                        </td>
                        <td>
                            <ul class="navigation">
                            <div id="icon5"></div>
                            <li class="n1"><a href="view_result.php">View Results</a></li>
                    
                        </ul>
                        </td>
                        <td>
                        <ul class="navigation">
                            <div id="icon6"></div>
                            <li class="n1"><a href="printpdf.php">Print</a></li>
                            <li class="n2"><a href="backup.php">Back-Up</a></li>
                           
                        </ul>
                        </td>
                        
                        <td>
                        	<ul  class="navigation">
                              <div  id="icon1"> </div>
                               <li class="n1"><a href="admin_add.php">Add Admin</a></li>
                               <li class="n1"><a href="admin_view.php">Information</a></li>
                               <li class="n1"><a href="admin_changePassword.php">Change Password</a></li>
                               <li class="n1"><a href="logout.php">Log out</a></li>
                           </ul>
                        </td>
                      
                    </tr>
                </table>
            </div><!-- icon container -->
		</div><!-- menu container -->
        
        <div class="Year">
		<a href="../pages/changeYear.php"><font color="#0066CC"><?php echo "$year  "; ?></font></a>
        </div>
        
	</div>



