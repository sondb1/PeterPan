
<?
	session_start();
$id=$_SESSION['userid'];
  

	$pass=$_POST[pass];
	$name=$_POST[name];
    $yyyy=$_POST[yyyy];
	$mm=$_POST[mm];
	$dd=$_POST[dd];
	$hp1=$_POST[hp1];
	$hp2=$_POST[hp2];
	$hp3=$_POST[hp3];
    $address1=$_POST[address1];
	$address2=$_POST[address2];
	$email1=$_POST[email1];
	$email2=$_POST[email2];
    $hp_ok=$_POST[hp_ok];
	$email_ok=$_POST[email_ok];


	$hp=$hp1."-".$hp2."-".$hp3;
	$email=$email1."@".$email2;
	$date=$yyyy."-".$mm."-".$dd;
    $address=$address1."/".$address2;
	$regist_day=date("Y-m-d (H:i)");
	$ip=$_SERVER['REMOTE_ADDR'];

?>
<meta charset="euc-kr">
<?
	include "../lib/dbconn.php"; 	




   $regist_day = date("Y-m-d (H:i)");  // ������ '��-��-��-��-��'�� ����

   
   $sql = "update  peterpan_member set pass='$pass', name='$name',";
   $sql .= "date='$date', hp='$hp', is_hp='$hp_ok' ,email='$email', address ='$address' ,";
   $sql .= "is_email='$email_ok',regist_day='$regist_day' where id='$id'";

   mysql_query($sql, $connect);  // $sql �� ����� ��� ����

   mysql_close();                // DB ���� ����
 echo "
	   <script>
	   window.alert(' $name �� ������ �Ϸ�Ǿ����ϴ�.')
	 location.href = '../main.php';
	   </script>
	"; 
	
?>

   