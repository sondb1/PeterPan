<? 
	session_start(); 
	include "../lib/dbconn.php";

	$modify = $_GET[modify];
	$num = $_GET[num];
	$page =$_POST[page];
	$subject = $_POST[subject];
		$content = $_POST[content];

  	$table = "peterpan_FAQ";

	if ($mode==$modify )
	{
		$sql = "select * from $table where num='$num'";
		$result = mysql_query($sql, $connect);

		$row = mysql_fetch_array($result);       
	
		$item_subject     = $row[subject];
		$item_content     = $row[content];

		$item_file_0 = $row[file_name_0];
		$item_file_1 = $row[file_name_1];
		$item_file_2 = $row[file_name_2];

		$copied_file_0 = $row[file_copied_0];
		$copied_file_1 = $row[file_copied_1];
		$copied_file_2 = $row[file_copied_2];
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head> 
<meta charset="euc-kr">
<link href="../css/common.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/concert.css" rel="stylesheet" type="text/css" media="all">

<script>
  function check_input()
   {
      if (!document.board_form.subject.value)
      {
          alert("������ �Է��ϼ���!");    
          document.board_form.subject.focus();
          return;
      }

      if (!document.board_form.content.value)
      {
          alert("������ �Է��ϼ���!");    
          document.board_form.content.focus();
          return;
      }
      document.board_form.submit();
   }
</script>
</head>

<body>

    <? include "../menu/top_menu2.php"; ?>
	
    <? include "../menu/main_meun2.php"; ?>
	<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-9 padding-right">
				<div class="features_items">      
					<h2 class="title text-center">FAQ</h2>

<?
	if($mode==$modify)
	{

?>
		<form  name="board_form" method="post" action="insert.php?num=<?=$num?>&page=<?=$page?>&table=<?=$table?>" enctype="multipart/form-data"> 
<?
	}
	else
	{
?>
		<form  name="board_form" method="post" action="insert.php?table=<?=$table?>" enctype="multipart/form-data"> 
<?
	}
?>
		<div id="write_form">
			
			<div class="write_line"></div>
			<div id="write_row2"><div class="col1"> ���� </div>
			                     <div class="col2"><input type="text" name="subject" value="<?=$item_subject?>" ></div>
			</div>
		
		
			<div id="write_row3" style="margin-top:8px;"><div class="col1" style="height:280px;"> ����   </div>
			
			                     <div class="col2"><textarea rows="15" cols="79" name="content" style="background-color:#FFFFFF"><?=$item_content?></textarea></div>
								 <br>
			</div>
	<br>
			<br>
			<div id="write_row2" style="margin-top:220px;"><div class="col1">���ǳ���  </div> &nbsp;
			<select name="find" style="width:500px;height:22px;">
                    <option value='ȸ������/����'>ȸ������/����</option>
					<option value='��ǰ����'>��ǰ����</option>
                    <option value='�ֹ�/����'>�ֹ�/����</option>
                    <option value='��۰���'>��۰���</option>
					<option value='����Ʈ ����'>����Ʈ ����</option>
					<option value='��Ÿ'>��Ÿ</option>   </div>
				</select>

			
			<div id="write_row4"><div class="col1" style="margin-left:-160px ;margin-top:10px;"> �̹�������1   </div>
			                     <div class="col2" style="margin-top:10px;"><input type="file" name="upfile[]"></div>
			</div>
			<div class="clear"></div>
<? 	if ($mode==$modify && $item_file_0)
	{
?>
			<div class="delete_ok"><?=$item_file_0?> ������ ��ϵǾ� �ֽ��ϴ�. <input type="checkbox" name="del_file[]" value="0"> ����</div>
			<div class="clear"></div>
<?
	}
?>
			
			<div id="write_row5"><div class="col1"> �̹�������2  </div>
			                     <div class="col2"><input type="file" name="upfile[]"></div>
			</div>
<? 	if ($mode==$modify && $item_file_1)
	{
?>
			<div class="delete_ok"><?=$item_file_1?> ������ ��ϵǾ� �ֽ��ϴ�. <input type="checkbox" name="del_file[]" value="1"> ����</div>
			<div class="clear"></div>
<?
	}
?>
			
			<div class="clear"></div>
			<div id="write_row6"><div class="col1"> �̹�������3   </div>
			                     <div class="col2"><input type="file" name="upfile[]"></div> 
			</div>
<? 	if ($mode==$modify && $item_file_2)
	{
?>
			<div class="delete_ok"><?=$item_file_2?> ������ ��ϵǾ� �ֽ��ϴ�. <input type="checkbox" name="del_file[]" value="2"> ����</div>
			<div class="clear"></div>
<?
	}
?>
			

			<div class="clear"></div>
		</div>
		<br>		<br>		<br>		<br> 		<br>		<br>
		<div id="write_button"><a href="#"><img src="../img/wr.png" onclick="check_input()"></a>&nbsp;
								<a href="list.php?table=<?=$table?>&page=<?=$page?>"><img src="../img/list.png" ></a>
		</div>

		</form>

	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
</div> <!-- end of wrap -->

</body>
</html>
