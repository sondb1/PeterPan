<title>��������</title>
<?
	session_start();
	$id=$_SESSION['userid'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http:www.w3.orf/TR/html/loose.dtd">
<head>
<meta charset="euc-kr">
<link href="../css/common.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/member.css" rel="stylesheet" type="text/css" media="all">
</head>
<script>

function check_input()
{


	if(!document.member_form.pass.value)
	{
		alert("��й�ȣ�� �Է��ϼ���");
		document.member_form.pass.focus();
		return;
	}

	if(!document.member_form.pass_confirm.value)
	{
		alert("��й�ȣ Ȯ���� �Է��ϼ���");
		document.member_form.pass_confirm.focus();
		return;
	}

	if(!document.member_form.name.value)
	{
		alert("�̸��� �Է��ϼ���");
		document.member_form.name.focus();
		return;
	} 



if(!document.member_form.yyyy.value)
	{
		alert("���� �Է��ϼ���");
		document.member_form.yyyy.focus();
		return;
	}

	if(!document.member_form.mm.value)
	{
		alert("�� �Է��ϼ���");
		document.member_form.mm.focus();
		return;
	}

	if(!document.member_form.dd.value)
	{
		alert("�� �Է��ϼ���");
		document.member_form.dd.focus();
		return;
	}

		if(!document.member_form.hp2.value)
	{                       
		alert("��ȭ���� �Է��ϼ���");
		document.member_form.hp2.focus();
		return;
	}

			if(!document.member_form.hp3.value)
	{
		alert("��ȭ���� �Է��ϼ���");
		document.member_form.hp3.focus();
		return;
	}

			if(!document.member_form.address1.value)
	{
		alert("�ּҸ� �Է��ϼ���");
		document.member_form.address1.focus();
		return;
	}

				if(!document.member_form.address2.value)
	{
		alert("���ּҸ� �Է��ϼ���");
		document.member_form.address1.focus();
		return;
	}



				if(!document.member_form.email1.value)
	{
		alert("�̸��� ���̵� �Է��ϼ���");
		document.member_form.email1.focus();
		return;
	}


	
				if(!document.member_form.email2.value)
	{
		alert("�̸��� �ּҸ� �Է��ϼ���");
		document.member_form.email2.focus();
		return;
	}

	if(document.member_form.pass.value!=document.member_form.pass_confirm.value)
	{
		alert("��й�ȣ�� ��ġ���� �ʽ��ϴ�.\n �ٽ� �Է����ּ���.");
		document.member_form.pass.focus();
		document.member_form.pass.select();
		return;
	}

	document.member_form.submit();
}

function reset_form()
{
	document.member_form.id.value="";
	document.member_form.pass.value="";
	document.member_form.pass_confirm.value="";
	document.member_form.name.value="";
	document.member_form.gender.value="";
	document.member_form.hp1.value="010";
	document.member_form.hp2.value="";
	document.member_form.hp3.value="";
	document.member_form.yyyy.value="";
	document.member_form.mm.value="";
	document.member_form.dd.value="";
	document.member_form.address1.value="";
	document.member_form.address2.value="";
	document.member_form.id.focus();

	return;
}
</script>
<style>
#inline-block{ display:inline-block;}
</style>
<body>
<!-- ù��° ��� �޴� -->
    <? include "../menu/top_menu2.php"; ?>
 <!-- �ι��� ��� �޴� -->
    <? include "../menu/main_meun2.php"; ?>


<?
    include "../lib/dbconn.php";

    $sql = "select * from peterpan_member where id='$id'";
    $result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);

    $hp = explode("-", $row[hp]);
    $hp1 = $hp[0];
    $hp2 = $hp[1];
    $hp3 = $hp[2];

    $email = explode("@", $row[email]);
    $email1 = $email[0];
    $email2 = $email[1];

	  $date = explode("-", $row[date]);
    $date1 = $date[0];
    $date2 = $date[1];
  $date3 = $date[2];


    $address = explode("/", $row[address]);
    $address1 = $address[0];
    $address2 = $address[1];
  

	
    mysql_close();
?>

<form name="member_form" method="post" action="insert_modify.php">
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 well well-sm" style="width: 772px;">
            <legend>��������</legend>
            <form action="#" method="post" class="form" role="form">
            <div class="row">
                <div class="col-xs-6 col-md-6">
				<label for="">�ƾƵ�</label>
			
                    <input class="form-control" name="id" value="<?= $row[id]?>" type="text" style="width: 326px;"required autofocus /> 
				<br>
                <label for="">��й�ȣ</label> 
					<input class="form-control" name="pass" value="<?= $row[pass]?>" type="password" /><br>
				<label for="">��й�ȣ Ȯ��</label> 
					<input class="form-control" name="pass_confirm" value="<?= $row[pass]?>" type="password" /><br>
				<label for="">�̸�</label>
                    <input class="form-control" name="name" value="<?= $row[name]?>" type="text"
                        required autofocus style="width: 126px;"/>
				
				</div>
            </div><br>
			<label for="">�ּ�</label>
			   <input class="form-control" name="address1" value="<?=$address1?>"  style="width: 326px;" /><br>
			    <label for="">���ּ�</label>
				<input class="form-control" name="address2" value="<?=$address2?>"  style="width: 226px;" /><br>
            <label for="">
                �������</label>
            <div class="row" style="width: 300px;">
                <div class="col-xs-4 col-md-4">
                    <input class="form-control" type ="text" name="yyyy"   id=""value="<?= $date1?>" style="width: 86px;"> 
                </div>
                <div class="col-xs-4 col-md-4">
                    <input class="form-control" type ="text" name="mm"   id="" value="<?= $date2?>" style="width: 86px;"> 
                </div>
                <div class="col-xs-4 col-md-4">
                    <input class="form-control" type ="text" name="dd"  id="" value="<?= $date3?>"style="width:86px;"> 
                </div>
            </div><br>
            <label for="">
                ��ȭ��ȣ</label>
           <div class="row" style="width: 300px;">
                <div class="col-xs-4 col-md-4">
                    <input class="form-control" type ="text" name="hp1" value="<?=$hp1?>" style="width: 86px;"> 
                </div>
                <div class="col-xs-4 col-md-4">
                    <input class="form-control" type ="text" name="hp2" value="<?=$hp2?>" style="width: 86px;"> 
                </div>
                <div class="col-xs-4 col-md-4">
                    <input class="form-control" type ="text" name="hp3" value="<?=$hp3?>" style="width: 86px;"> 
                </div>
            </div></br>
			<label for="">�̸���</label>
			<div class="row" style="width: 300px;">
                <div class="col-xs-4 col-md-4">

					<input class="form-control" name="email1" value="<?=$email1?>" type="email"style="width: 246px;" />		

				</div>

				<div class="col-xs-4 col-md-4">
					<input class="form-control" name="email2" value="<?=$email2?>" type="email" style="width: 246px; margin-left: 200px;"/> <br>	
			 </div> 
			 </div>

<ul style="width: 500px;">
			<h4>SMS ���ŵ���</h4>
				
						<?if($row[is_hp] == "y")
							{?>
								<input type="checkbox" name="hp_ok" value="y" class="m_smss"  checked="checked">
								 ���Ǹ� �Ͻø� ���ڷ� �̺�Ʈ ������ �޾ƺ��Ǽ� �ֽ��ϴ�.
							<?}
								else{
									?>
									<input type="checkbox" name="hp_ok" value="y" class="m_smss" >
									���Ǹ� �Ͻø� ���ڷ� �̺�Ʈ ������ �޾ƺ��Ǽ� �ֽ��ϴ�.
								<?}
								?>		
		
				<br><br>
			<h4>�̸��ϼ��ŵ���</h4>
						<?if($row[is_email] == "y")
							{?>
								<input type="checkbox" name="email_ok" value="y" checked="checked">
								 ���Ǹ� �Ͻø� ���ڷ� �̺�Ʈ ������ �޾ƺ��Ǽ� �ֽ��ϴ�.
								<?}
								else
								{?>
								<input type="checkbox" name="email_ok" value="y" >
								���Ǹ� �Ͻø� ���ڷ� �̺�Ʈ ������ �޾ƺ��Ǽ� �ֽ��ϴ�.
								<?}?>
			</ul>
		
			<span id="inline-block"><button class="btn btn-lg btn-primary btn-block" type="submit" onclick="check_input()"style="width: 200px;">
                �����ϱ�
			</button></span>&nbsp;&nbsp;&nbsp;&nbsp;
			 <span id="inline-block"><button class="btn btn-lg btn-primary btn-block" type="submit" onclick="reset_form()"style="width: 200px;">
                �ٽþ���
			</button></span>
	
			</div> <!-- end of join2 -->
	
			<!-- end form_join-->

	    </form>
	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
<!--
  <div class = "bottom">
		 <? include "../menu/bottom.php"; ?>
		</div> -->
</div> <!-- end of wrap -->

</body>
</html>
