<? session_start(); ?>

<meta charset="euc-kr">
<?
	$table = "peterpan_QNA";
	$id = $_SESSION['userid'];
	$name = $_SESSION['username'];
	$subject = $_POST[subject];
	$content = $_POST[content];
	$mode = $_GET[mode];
	$html_ok = $_POST[html_ok];
	$num = $_GET[num];
	if(!$id) {
		echo("
		<script>
	     window.alert('�α��� �� �̿��� �ּ���.')
	     history.go(-1)
	   </script>
		");
		exit;
	}

	if(!$subject) {
		echo("
	   <script>
	     window.alert('������ �Է��ϼ���.')
	     history.go(-1)
	   </script>
		");
	   exit;
	}

	if(!$content) {
		echo("
	   <script>
	     window.alert('������ �Է��ϼ���.')
	     history.go(-1)
	   </script>
		");
	   exit;
	}
	$regist_day = date("Y-m-d (H:i)");  // ������ '��-��-��-��-��'�� ����
	include "../lib/dbconn.php";       // dconn.php ������ �ҷ���
	
	$files = $_FILES["upfile"];
	$count = count($files["name"]);
	$upload_dir = './data/';

	for ($i=0; $i<$count; $i++)
	{
		$upfile_name[$i]     = $files["name"][$i];
		$upfile_tmp_name[$i] = $files["tmp_name"][$i];
		$upfile_type[$i]     = $files["type"][$i];
		$upfile_size[$i]     = $files["size"][$i];
		$upfile_error[$i]    = $files["error"][$i];
      
		$file = explode(".", $upfile_name[$i]);
		$file_name = $file[0];
		$file_ext  = $file[1];

		if (!$upfile_error[$i])
		{
			$new_file_name = date("Y_m_d_H_i_s");
			$new_file_name = $new_file_name."_".$i;
			$copied_file_name[$i] = $new_file_name.".".$file_ext;      
			$uploaded_file[$i] = $upload_dir.$copied_file_name[$i];

			if( $upfile_size[$i]  > 1500000 ) {
				echo("
				<script>
				alert('���ε� ���� ũ�Ⱑ ������ �뷮(1500KB)�� �ʰ��մϴ�!<br>���� ũ�⸦ üũ���ּ���! ');
				history.go(-1)
				</script>
				");
				exit;
			}

			if ( ($upfile_type[$i] != "image/gif") &&
				($upfile_type[$i] != "image/jpeg") &&
				($upfile_type[$i] != "image/pjpeg") )
			{
				echo("
					<script>
						alert('JPG�� GIF �̹��� ���ϸ� ���ε� �����մϴ�!');
						history.go(-1)
					</script>
					");
				exit;
			}

			if (!move_uploaded_file($upfile_tmp_name[$i], $uploaded_file[$i]) )
			{
				echo("
					<script>
					alert('������ ������ ���丮�� �����ϴµ� �����߽��ϴ�.');
					history.go(-1)
					</script>
				");
				exit;
			}
		}
	}
$modify = $_GET[modify];
	if ($mode=="modify")

	{	
		$num_checked = count($_POST['del_file']);
		$position = $_POST['del_file'];

		for($i=0; $i<$num_checked; $i++)                      // delete checked item
		{
			$index = $position[$i];
			$del_ok[$index] = "y";
		}

		$sql = "select * from $table";   // get target record
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);

		for ($i=0; $i<$count; $i++)					// update DB with the value of file input box
		{

			$field_org_name = "file_name_".$i;
			$field_real_name = "file_copied_".$i;

			$org_name_value = $upfile_name[$i];
			$org_real_value = $copied_file_name[$i];
			if ($del_ok[$i] == "y")
			{
				$delete_field = "file_copied_".$i;
				$delete_name = $row[$delete_field];
				
				$delete_path = "./data/".$delete_name;

				unlink($delete_path);

				$sql = "update $table set $field_org_name = '$org_name_value', $field_real_name = '$org_real_value'  where num='$num'";
				mysql_query($sql, $connect);  // $sql �� ����� ���� ����
			}
			else 
			{
				if (!$upfile_error[$i])
				{
					$sql = "insert $table set $field_org_name = '$org_name_value', $field_real_name = '$org_real_value'  where num=$num";
					mysql_query($sql, $connect);  // $sql �� ����� ���� ����					
				}
			}

		}
		$sql = "update $table set subject='$subject', content='$content' where num=$num";
		mysql_query($sql, $connect);  // $sql �� ����� ���� ����
	}
	else
	{
		if ($html_ok=="y")
		{
			$is_html = "y";
		}
		if ($mode=="response")
		{
			// �θ� �� ��������
			$sql = "select * from $table where num = $num";
			$result = mysql_query($sql, $connect);
			$row = mysql_fetch_array($result);

			// �θ� �۷� ���� group_num, depth, ord �� ����
			$group_num = $row[group_num];
			$depth = $row[depth] + 1;
			$ord = $row[ord] + 1;

			// �ش� �׷쿡�� ord �� �θ���� ord($row[ord]) ���� ū ��쿣
			// ord �� 1 ���� ��Ŵ
			$sql = "update $table set ord = ord + 1 where group_num = $row[group_num] and ord > $row[ord]";
			mysql_query($sql, $connect);  

			// ���ڵ� ����
			$sql = "insert into $table (group_num, depth, ord, id, name, subject,";
			$sql .= "content, regist_day, hit, is_html, file_name_0, file_name_1, file_name_2, file_copied_0,  file_copied_1, file_copied_2) ";
			$sql .= "values($group_num, $depth, $ord, '$id', '$name', '$subject',";
			$sql .= "'$content', '$regist_day', 0, '$html_ok', '$upfile_name[0]', '$upfile_name[1]',  '$upfile_name[2]', '$copied_file_name[0]', '$copied_file_name[1]','$copied_file_name[2]')";    

			mysql_query($sql, $connect);  // $sql �� ����� ���� ����
		}
		else
		{
			$depth = 0;   // depth, ord �� 0���� �ʱ�ȭ
			$ord = 0;


			// ���ڵ� ����(group_num ����)
			$sql = "insert into $table (depth, ord, id, name,  subject,";
			$sql .= "content, regist_day, hit, is_html, file_name_0, file_name_1, file_name_2, file_copied_0,  file_copied_1, file_copied_2) ";
			$sql .= "values($depth, $ord, '$id', '$name', '$subject',";
			$sql .= "'$content', '$regist_day', 0, '$html_ok', '$upfile_name[0]', '$upfile_name[1]',  '$upfile_name[2]', '$copied_file_name[0]', '$copied_file_name[1]','$copied_file_name[2]')";    
			mysql_query($sql, $connect);  // $sql �� ����� ���� ����

			// �ֱ� auto_increment �ʵ�(num) �� ��������
			$sql = "select last_insert_id()"; 
			$result = mysql_query($sql, $connect);
			$row = mysql_fetch_array($result);
			$auto_num = $row[0]; 

			// group_num �� ������Ʈ 
			$sql = "update $table set group_num = $auto_num where num=$auto_num";
			mysql_query($sql, $connect);
		}
	}

	mysql_close();                // DB ���� ����

	echo "
	   <script>
	    location.href = 'list.php?table=$table&page=$page';
	   </script>
	";
?>