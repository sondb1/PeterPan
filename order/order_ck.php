<?

$orderclick =$_GET[orderclick];
if($orderclick == 0)
{
	echo ("<script>
window.alert('��ǰ�� �����մϴ�');
 history.go(-1);
</script>");
}
else
{
echo"
		<script>

	   location.href = '../order/order.php?order=order&point=0';
	</script>";
}

?>