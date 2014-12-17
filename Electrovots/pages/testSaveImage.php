
<!---------------------------------Saving Images---------------------------------------->
<?php
include('../include/connect_DB.php');

    function GetImageExtension($imagetype)
   	 {
       if(empty($imagetype)) return false;
       switch($imagetype)
       {
           case 'image/bmp': return '.bmp';
           case 'image/gif': return '.gif';
           case 'image/jpeg': return '.jpg';
           case 'image/png': return '.png';
           default: return false;
       }
     }
	 
	 
	 
if (!empty($_FILES["uploadedimage"]["name"])) {

	$file_name=$_FILES["uploadedimage"]["name"];
	$temp_name=$_FILES["uploadedimage"]["tmp_name"];
	$imgtype=$_FILES["uploadedimage"]["type"];
	$ext= GetImageExtension($imgtype);
	$imagename=date("d-m-Y")."-".time().$ext;
	$target_path = "../photo/".$imagename;
	

if(move_uploaded_file($temp_name, $target_path)) {

 	//$query_upload="insert into tblcandidate (Photo) VALUES ('".$target_path."')";
	$query_upload="update tblcandidate set Photo = '".$target_path."' where CID=5";
	mysql_query($query_upload) or die("error in $query_upload ==  ".mysql_error());  
	
}else{

   exit("Error While uploading image on the server");
} 

}

?>