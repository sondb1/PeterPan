<?
   session_start();
   	$id = $_SESSION['userid'];
	$name = $_SESSION['username'];
	$ripple_content = $_POST[ripple_content];
	$num = $_GET[num];
?>
<meta charset="euc-kr">
<?
   if(!$id) {
     echo("
	   <script>
	     window.alert('�α��� �� �̿��ϼ���.')
	     history.go(-1)
	   </script>
	 ");
	 exit;
   }   
   include "../lib/dbconn.php";       // dconn.php ������ �ҷ���

   $regist_day = date("Y-m-d (H:i)");  // ������ '��-��-��-��-��'�� ����

   // ���ڵ� ���� ���
   $sql = "insert into  peterpan_review_ripple (parent, id, name, content, regist_day) ";
   $sql .= "values($num, '$id', '$name', '$ripple_content', '$regist_day')";    
   
   mysql_query($sql, $connect);  // $sql �� ����� ��� ����
   mysql_close();                // DB ���� ����

   echo "
	   <script>
	    location.href = 'view.php?table=$table&num=$num';
	   </script>
	";
?>

   
