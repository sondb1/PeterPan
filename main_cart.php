<?
session_start();
$id=$_SESSION['userid'];
$pid = $_GET[model];
$c_price = $_GET[price];


// 1. ���� ��Ŭ��� ����
	include "./lib/dbconn.php";

// 2. �α��� ���� ���� ȸ���� �α��� �������� ������
if(!$id){

   echo ("<script>
	     window.alert('�α����� ���ּ���.');
		 location.href = 'main.php';
	</script>");
}




// 4. ��ٱ��Ͽ� ���� �ֱ�
$sql = "insert into  peterpan_cart (id, pro_id, cart_count, cart_price) values ('$id', '$pid', '1', '.$c_price.')";
mysql_query($sql, $connect);
?>

<?

	echo("<script>
	     window.alert('��ٱ��Ͽ� ��ҽ��ϴ�.');
		 location.href = './prod/cart.php';
	</script>");
  ?>