 <?php
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


         $fname = $_FILES['sel_file']['name'];
         //echo 'upload file name: '.$fname.' ';
         $chk_ext = explode(".",$fname);

         if(strtolower(end($chk_ext)) == "csv")
         {

             $filename = $_FILES['sel_file']['tmp_name'];
             $handle = fopen($filename, "r");

             while (($data = fgetcsv($handle, 0, ",")) !== FALSE)
             {
                $sql = "INSERT  into pads(Mark, Class, Number_kitl, Mark_origin, Number_origin, Number_trw, Name)
                                values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]')";
                mysql_query($sql) or die(mysql_error());
             }

             fclose($handle);
             echo "Обновление базы завершено";

         }
         else
         {
             echo "Неверный формат файла";
         }

    ?>
