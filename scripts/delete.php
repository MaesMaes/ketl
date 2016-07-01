<?
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



$sql = "DELETE FROM pads";
mysql_query($sql) or die(mysql_error());
echo "База данных очищена";


?>