<?
session_start();
$id=$_SESSION['userid'];
$mode=$_POST[mode];
$pid=$_POST[i_idx];
$c_count=$_POST[cart_count];
$c_price=$_POST[cart_price];
$prod_num=$_POST[prod_num];

$num=$_POST[num];

// 1. ���� ��Ŭ��� ����
	include "../lib/dbconn.php";

// 2. �α��� ���� ���� ȸ���� �α��� �������� ������
if(!$id){

   echo("<script>
	     window.alert('�α��� ���ּ���.');
		  location.href = './prod_list.php';
		 </script>");
}

// 3. �Ѿ�� ���� �˻�
if($mode != "cart" && $mode != "direct"){
    alert("�������� ������ �ƴմϴ�.");
}

if(!$_POST[i_idx]){
    alert("��ǰ���������� ��ǰ�� ���� �� �������ּ���.");
}

if(!is_numeric($_POST[cart_count])){
    alert("��ǰ������ ���ڷ� �Է��� �ּ���.");
}

// 4. ��ٱ��Ͽ� ���� �ֱ�

?>

<?
// 5. ��ٱ������� �ٷα��������� ���� �̵�
if($mode == "cart"){
	$sql = "insert into  peterpan_cart (id, pro_id, cart_count, cart_price,cart_num) values ('$id', '$pid', '.$c_count.', '.$c_price.','.$num.')";
mysql_query($sql, $connect);
	echo("<script>
	     window.alert('��ٱ��Ͽ� ��ҽ��ϴ�.');
		  history.go(-1);
	</script>");
   // alert("��ٱ��Ͽ� ��ҽ��ϴ�.","./cart.php");
}else if($mode == "direct"){
	$_SESSION['num']=$num;
	$_SESSION['c_count']=$c_count;
		$_SESSION['c_price']=$c_price;
	echo("<script>
	     window.alert('������������ �̵��մϴ�.');
		location.href = '../order/order.php?orderclick=1';
	</script>");
	 //alert("������������ �̵��մϴ�.","./order.php");
}else{
    alert("�������� ������ �ƴմϴ�.");
}

?>