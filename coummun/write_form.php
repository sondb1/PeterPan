<? 
	session_start(); 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head> 
<link href="../css/common.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/qna.css" rel="stylesheet" type="text/css" media="all">
<meta charset="euc-kr">
</head>
<?
	$table ="peterpan_QNA";
	$id = $_SESSION['userid'];
	$name = $_SESSION['username'];
	$subject = $_POST['subject'];
	$content = $_POST['content'];
	$mode = $_GET[mode];
	$num = $_GET[num];
	if ($mode=="modify" || $mode=="response")
	{
		include "../lib/dbconn.php";

		$sql = "select * from $table where num='$num'";
		$result = mysql_query($sql, $connect);
		$row = mysql_fetch_array($result);       
	
		$item_subject     = $row[subject];
		$item_content     = $row[content];

		if ($mode=="response")
		{
			$item_subject = "[re]".$item_subject;
			$item_content = ">".$item_content;
			$item_content = str_replace("\n", "\n>", $item_content);
			$item_content = "\n\n".$item_content;
		}
		mysql_close();
	}
$table ="qna";
	if ($mode==$modify )
	{
		$sql = "select * from $table where num='$num'";
		$resultt = mysql_query($sql, $connect);

		$roww = mysql_fetch_array($resultt);       
	

		$item_file_0 = $roww[file_name_0];
		$item_file_1 = $roww[file_name_1];
		$item_file_2 = $roww[file_name_2];

		$copied_file_0 = $roww[file_copied_0];
		$copied_file_1 = $roww[file_copied_1];
		$copied_file_2 = $roww[file_copied_2];
	}
?>
<body>
<div id="wrap">
<div id="header"> <!-- ù��° ��� �޴� -->
    <? include "../menu/top_menu2.php"; ?>
	</Div> 

	<Div> <!-- �ι��� ��� �޴� -->
    <? include "../menu/main_meun2.php"; ?>
	</div>

  <div id="content">


	<div id="col2">        
		<div id="title">
			<img src="../img/title_qna.gif">
		</div>
		<div class="clear"></div>

		<div id="write_form_title">
			<img src="../img/write_form_title.gif">
		</div>
		<div class="clear"></div>
<?
	if($mode=="modify")
	{
?>
		<form  name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>"> 
<?
	}
	elseif ($mode=="response")
	{
?>
		<form  name="board_form" method="post" action="insert.php?mode=response&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>"> 
<?
	}
	else
	{
?>
		<form  name="board_form" method="post" action="insert.php?table=<?=$table?>"> 
<?
	}
?>
		<div id="write_form">
			<div class="write_line"></div>
			<div id="write_row1">
				<div class="col1"> �г��� </div>
				<div class="col2"><?=$usernick?></div>

			</div>
			<div class="write_line"></div>
			<div id="write_row2"><div class="col1"> ����   </div>
			                     <div class="col2"><input type="text" name="subject" value="<?=$item_subject?>" ></div>
			</div>
			<div class="write_line"></div>
			<div id="write_row3"><div class="col1"> ����   </div>
			                     <div class="col2"><textarea rows="13" cols="79" name="content"><?=$item_content?></textarea></div>
			</div>
			<div class="write_line"></div>
		



			<div id="write_row4"><div class="col1"> �̹�������1   </div>
			                     <div class="col2"><input type="file" name="upfile[]"></div>
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
			<div class="write_line"></div>
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
			<div class="write_line"></div>
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
		
		
		
		
		
		
		
		
		
		</div>

		<div id="write_button"><input type="image" src="../img/write.jpg">&nbsp;
								<a href="list.php?table=<?=$table?>&page=<?=$page?>"><img src="../img/list.jpg"></a>
		</div>
		</form>

	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
</div> <!-- end of wrap -->

</body>
</html>
