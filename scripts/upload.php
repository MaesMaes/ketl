<?php

//$uploaddir = getcwd().DIRECTORY_SEPARATOR.'upload'.DIRECTORY_SEPARATOR;
//$uploadfile = $uploaddir.basename($_FILES['file']['name']);

//move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);


ini_set('display_errors', 1);
error_reporting(E_ALL);
$db_host = 'localhost';
$db_user = 'host1298803_ketl';
$db_pwd = 'FMwM81';

$database = 'host1298803_ketl';
$table = 'pads';

if (!mysql_connect($db_host, $db_user, $db_pwd))
    die("Can't connect to database");

if (!mysql_select_db($database))
    die("Can't select database");

?><pre><?print_r($_POST);?></pre><?
if(isset($_POST['submit']))
{
     $fname = $_FILES['file']['name'];
     echo 'upload file name: '.$fname.' ';
     $chk_ext = explode(".",$fname);

     if(strtolower(end($chk_ext)) == "csv")
     {

         $filename = $_FILES['file']['tmp_name'];
         $handle = fopen($filename, "r");

         while (($data = fgetcsv($handle, 0, ",")) !== FALSE)
         {
            $sql = "INSERT into pads(Mark, Class, Number_kitl, Mark_origin, Number_origin, Name) values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]')";
            mysql_query($sql) or die(mysql_error());
         }

         fclose($handle);
         echo "Successfully Imported";

     }
     else
     {
         echo "Invalid File";
     }   
}
?>