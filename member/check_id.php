<?
$id = $_GET['id'];
$id_sss = $_GET['id_sss'];
?>
<meta charset="euc-kr">

<script>
function recheck()
{
	window.open("check_id.php?id="+document.member_form.id.value,"IDcheck","left=300,top=400,width=300,height=200,scrollbars=no,resizable=yes");
}
function checkok()
{	
	
	location.href = "./member_form.php?id=<?echo($id);?>";
	window.close();
}


</script>
<?

	if(!$id)
	{
		echo("���̵� �Է��ϼ���.");
	}
	else
	{
		include "../lib/dbconn.php";

		$sql="select * from  peterpan_member where id='$id'";

		$result=mysql_query($sql, $connect);
		$num_record=mysql_num_rows($result);

		if($num_record)
		{ 
?>
			<div check_ok><font color="orange" size="15">"<?=$id?>"</font></div><br>
			<form>
			���̵� �ߺ��˴ϴ�.<br>
			�ٸ� ���̵� ����ϼ���.<br>
			<input type='text' name='id' color="orange" size="12">&nbsp&nbsp&nbsp<input type='submit' value='�˻�' onclick='recheck()'><br>
			</form>
<?
		}
		else
		{ 
?>
			<div check_ok2><font color="orange" size="15">"<?=$id?>"</font></div><br>
			<form name="member_form" method="post" action="member_form.php?id_sss=<?=$id?>">
			��밡���� ���̵��Դϴ�.</br>
			<input type='submit' value='����ϱ�' onclick='checkok()' ><br>
			</form>
<?
		}

		mysql_close();
	}
?>
