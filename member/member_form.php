<? 
	session_start(); 
	$id = $_GET['id'];
	$id_sss = $_POST['id'];
	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head> 
<meta charset="euc-kr">
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/common.css" rel="stylesheet" type="text/css" media="all and (min-width: 481px)">
<link href="../css/member_1.css" rel="stylesheet" type="text/css" media="all and (min-width: 481px)">
<link rel="stylesheet" media="all and (max-width: 480px)" href="../css/media.css">
<style>
#inline-block{ display:inline-block;}
</style>
</head>
	<script>
function check_id()
{
	window.open("check_id.php?id="+document.member_form.id.value,"IDcheck","left=300,top=400,width=300,height=200,scrollbars=no,resizable=yes");
}

function check_input()
{
	if(!document.member_form.id.value)
	{
		alert("���̵� �Է��ϼ���");
		document.member_form.id.focus();
		return;
	}

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

	if(document.member_form.gender[0].checked == false &&  document.member_form.gender[1].checked == false)
	{
		alert("������ üũ���ּ���");	
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
		document.member_form.address2.focus();
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

			if(!document.member_form.hp1.value)
	{
		alert("��ȭ��ȣ1 �Է��ϼ���");
		document.member_form.hp1.focus();
		return;
	}

		if(!document.member_form.hp2.value)
	{
		alert("��ȭ��ȣ2 �Է��ϼ���");
		document.member_form.hp2.focus();
		return;
	}

			if(!document.member_form.hp3.value)
	{
		alert("��ȭ��ȣ3 �Է��ϼ���");
		document.member_form.hp3.focus();
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
	document.member_form.hp1.value="";
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
</head>
<body>

<!-- ù��° ��� �޴� -->
    <? include "../menu/top_menu2.php"; ?>
<!-- �ι��� ��� �޴� -->
    <? include "../menu/main_meun2.php"; ?>
	</div>

		<form name="member_form" method="post" action="insert.php">
<!--   <div id="title">
		
		</div> -->
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 well well-sm" style="width: 772px;">
            <legend>ȸ������</legend>
            <form action="member_form" method="post" class="form" role="form" action="insert.php">
            <div class="row">
                <div class="col-xs-6 col-md-6">
				<label for="">�ƾƵ�</label>
                    <input class="form-control" name="id" placeholder="���̵�" value="<?=$id_sss ?>" type="text" style="width: 326px;"required  />
						
			
				<br>
                <label for="">��й�ȣ</label> 
					<input class="form-control" name="pass"  type="password" required/><br>
				<label for="">��й�ȣ Ȯ��</label> 
					<input class="form-control" name="pass_confirm" placeholder="��й�ȣ Ȯ��" type="password" required/><br>
				<label for="">�̸�</label>
                    <input class="form-control" name="name" placeholder="�̸�" type="text"
                        required  style="width: 126px;"/><br>
					<label for="">����</label><br>
					<label class="radio-inline">
					   <input type="radio" name="gender"  value="����" required/>
				   ����
				 </label>
					 <label class="radio-inline">
						 <input type="radio" name="gender"  value="����" required />
					����
					 </label>
				</div>
				<button class="btn btn-lg btn-primary btn-block" onclick="check_id()" type="submit" style="width: 150px;height: 35px;margin-top: 22px;">
                ���̵��ߺ�Ȯ��
					</button>
            </div><br>
			<label for="">�ּ�</label>
			   <input class="form-control" name="address1" placeholder="�ּ�"  style="width: 326px;" required /><br>
			    <label for="">���ּ�</label>
				<input class="form-control" name="address2" placeholder="���ּ�"  style="width: 226px;" required /><br>
            <label for="" >
                �������</label>
            <div class="row" style="width: 300px;">
                <div class="col-xs-4 col-md-4" >
                    <select name="yyyy" required  id="" placeholder='��' style="width: 86px;background-color:#FFFFFF;
				border-radius: 7px 7px 7px 7px;
				border-top:solid 1px #cccccc;
				border-left:solid 1px #cccccc;
				border-right:solid 1px #cccccc;
				border-bottom:solid 1px #cccccc;" >
					<option value="">����
					<? $time = date('Y'); 
						for($i=$time; $i>=1900; $i--)
						
					echo "<option value ='$i'>".$i
					?>
					</select>
                </div>
                <div class="col-xs-4 col-md-4">
                    <select name="mm"  required id="" placeholder='��' style="width: 86px;background-color:#FFFFFF;
				border-radius: 7px 7px 7px 7px;
				border-top:solid 1px #cccccc;
				border-left:solid 1px #cccccc;
				border-right:solid 1px #cccccc;
				border-bottom:solid 1px #cccccc;">

					<option value="" >��
					<? for($i=1; $i<=12; $i++)
					
					echo "<option value ='$i'>".$i
					?>
					</select>
                </div>
                <div class="col-xs-4 col-md-4">
                    <select name="dd" required  id="" placeholder='��' style="width:86px;background-color:#FFFFFF;
				border-radius: 7px 7px 7px 7px;
				border-top:solid 1px #cccccc;
				border-left:solid 1px #cccccc;
				border-right:solid 1px #cccccc;
				border-bottom:solid 1px #cccccc;">
					<option value="" >��
					<? for($i=1; $i<=31; $i++)
					
					echo "<option value ='$i'>".$i
					?>
					</select>
                </div>
            </div><br>
            <label for="">
                ��ȭ��ȣ</label>
           <div class="row" style="width: 300px;">
                <div class="col-xs-4 col-md-4">
                    <input class="form-control" type ="text" name="hp1"  required id="" placeholder='' style="width: 86px;"> 
                </div>
                <div class="col-xs-4 col-md-4">
                    <input class="form-control" type ="text" name="hp2"  required id="" placeholder='' style="width: 86px;"> 
                </div>
                <div class="col-xs-4 col-md-4">
                    <input class="form-control" type ="text" name="hp3"required  id="" placeholder='' style="width: 86px;"> 
                </div>
            </div></br>
			<label for="">�̸���</label>
			<div class="row" style="width: 300px;">
                <div class="col-xs-4 col-md-4">
					<input class="form-control" name="email1" placeholder="�̸���"  required type="email"style="width: 246px;" /><div style="margin-left:270px;margin-top:-25px;">@</div>
				</div>
				
				<div class="col-xs-4 col-md-4">
					<input class="form-control" name="email2" placeholder="�̸���" required type="email" style="width: 246px; margin-left: 200px;"/> <br>	
			 </div> 
			 </div>
			<ul style="width: 500px;">
			<h4>SMS ���ŵ���</h4>&nbsp;&nbsp;&nbsp;
				
						
									<input type="checkbox" name="hp_ok" value="y" class="m_smss" >
									���Ǹ� �Ͻø� ���ڷ� �̺�Ʈ ������ �޾ƺ��Ǽ� �ֽ��ϴ�.
									
		
			<br><br>
			<h4>�̸��ϼ��ŵ���</h4>&nbsp;&nbsp;&nbsp;
						
							
								<input type="checkbox" name="email_ok" value="y" >
								���Ǹ� �Ͻø� ���ڷ� �̺�Ʈ ������ �޾ƺ��Ǽ� �ֽ��ϴ�.
							
			</ul>
	
			 <span id="inline-block"><button class="btn btn-lg btn-primary btn-block" type="submit" onclick="check_input()"style="width: 200px;">
                ȸ������
			</button></span>&nbsp;&nbsp;&nbsp;&nbsp;
			 <span id="inline-block"><button class="btn btn-lg btn-primary btn-block" type="submit" onclick="reset_form()"style="width: 200px;">
                �ٽþ���
			</button></span>
			</div> <!-- end of join2 -->
			</form>
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
