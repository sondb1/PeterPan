<html>
<head>
</head>
<?
$num =  $_GET[num];
?>
<form name="admin_insert" method="post" action="insert.php?num=<?=$num?>" enctype="multipart/form-data">
<div>
<select name="adminod">
<option value='�ֹ����'>�ֹ����</option>
                    <option value='�Աݽ�û'>�Աݽ�û</option>
                    <option value='�ԱݿϷ�'>�ԱݿϷ�</option>
					<option value='����غ�'>����غ�</option>
					<option value='�����'>�����</option>
                    <option value='��޿Ϸ�'>��޿Ϸ�</option>
				</select></div>
<input type="text" name="bureum">��۹�ȣ�Է�
				<div> <input type="submit" value="���" name="submit" > 
				
				
				</div>
				</html>