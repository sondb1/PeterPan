<?
   session_start();
   $table = "peterpan_order";
   $num=$_GET[num];
   include "../lib/dbconn.php";
	
   $sql = "update $table set progress ='�ֹ����' where num='$num'";
	
   mysql_query($sql, $connect);

   mysql_close();

   echo "
	   <script>
	   window.alert(' �ֹ��� ��ҵǾ����ϴ�.')
	   location.href = 'finishorder.php';
	   </script>
	";
?>

