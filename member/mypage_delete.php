<?
session_start();
	$table = "peterpan_member";
   include "../lib/dbconn.php";
   $id = $_SESSION['userid'];

   $sql = "delete from $table where id = '$id'";
   mysql_query($sql, $connect);

   mysql_close();

   echo("
       <script>
          alert('[Ż�𼺰�] ���������� ȸ������ Ż���ϼ̽��ϴ�.');
        location.href = '../main.php'; 
		</script>
       ");
   unset($_SESSION['userid']);

?>




