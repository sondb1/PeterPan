    
	<head>
	
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.7.min.js"></script>
    <script src="js/topscroll.js"></script>

		<style>
/* ���ٴϴ� �޴� (Floating Menu) */
#floatdiv {
    position:fixed; _position:absolute; _z-index:-1;
    width:200px; /* ������ ����*/
    overflow:hidden;
    right:45%;
    top:24%; /* �̹��� ���� ���� */
    background-color: transparent;
    margin-right: -690px; /* �¿��� ���� ���� */
    padding:0;
}#floatdiv ul  { list-style: none; }
#floatdiv li  { margin-bottom: 2px; text-align: center; }
#floatdiv a   { color: #5D5D5D; border: 0; text-decoration: none; display: block; }
#floatdiv a:hover, #floatdiv .menu  { background-color: #5D5D5D; color: #fff; }
#floatdiv .menu, #floatdiv .last    { margin-bottom: 0px; }
</style>
</head>
<div class="header-middle">
			<div class="header_top"style="background: #FE980F;">
				<div class="row">
					<div class="col-sm-4" style="padding-left: 50px;">
						<div class="logo pull-left">
							<a href="./main.php"><img src="./img/home/logo.png" alt="" /></a>
						</div>

						<div class=" "><!--����� ���ľȵ�-->
							<div class="">
							</div>
							<div class="">
							</div>
						</div>
					</div><!--������� �����ȵǿ�-->

					<div class="col-sm-8"style="padding-right: 30px;">
						<div class="shop-menu pull-right">                         
							<ul class="nav navbar-nav">
	

								<?

								if(!$id)
								{
								?>
								

								<li><a href="./login/login_from.php"><i class="fa fa-lock"></i> �α���</a></li>
								<li><a href="./member/member.php">ȸ������</a></li>
								<?}
								else
								{
								?>
								
								
							

								<li><a href="./login/logout.php"><i class="fa fa-lock"></i> �α׾ƿ�</a></li>

								<li><a href="./member/member_form_modify.php"><i class="fa fa-user"></i>��������</a></li>

								<li><a href="./member/mypage.php"><i class="fa fa-user"></i>����������</a></li>

								<li><a href="./prod/cart.php"><i class="fa fa-shopping-cart"></i>��ٱ���</a></li>

								<li><a href="./order/finishorder.php">�ֹ�/���</a></li>

								
									<li><a href="#"><?= $name ?>�� � ������</a> </li>
							
								<?
								}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		
<div class="header-bottom"style="padding-top: 10px; padding-bottom: 10px;"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="main.php" class="active">home</a></li>
								<li><a href="./prod/prod_list.php" >shop</a></li>
									<li class="dropdown"><a href="./plan/list.php">��ȹ��<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="./plan/list.php">Ű��Ʈ ���</a></li>
										
                                    </ul>
                                </li> 
									<li class="dropdown"><a href="./notice/list.php">�Խ���<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="./notice/list.php">��������</a></li>
										<li><a href="./community/list.php">�ı�Խ���</a></li>
                                    </ul>
                                </li> 


								<li class="dropdown"><a href="./QnA/list.php">����<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="./QnA/list.php">�����亯</a></li>
										<li><a href="./FAQ/list.php">���ֹ�������</a></li>
                                    </ul>
                                </li> 
								<?
									if($id=="admin")
										{
											?>
											<li class="dropdown"><a href="./admin/admin.php">�����ڸ޴�<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="./admin_bod/list.php">�Խ��ǰ���</a></li>
										<li><a href="./admin/admin_member.php">ȸ������</a></li>
										<li><a href="./admin_prod/list.php">��ǰ����</a></li>
										<li><a href="./total/admin_total.php">������ȸ</a></li>
										<li><a href="./admin/adminorder.php">�ֹ�����</a></li>
									
                                    </ul>
                                </li> 
									<?
									}
									else
										{
											?>
									<?
									}
									?>
							</ul>
						</div>
					</div>
					<form name="right_menu">
					<div id="floatdiv" >

<ul >
<?
	if(!$id ){

?>
<a href='#' target=''><img src='./img/cart.png' />&nbsp;��ٱ���</a>
<?
}
	else if($id){
	?>
<a href='./prod/cart.php' target=''><img src='./img/cart.png' />&nbsp;��ٱ���</a>
	<?
}
	?>
<?
	if(!$id ){
?>
<a href='#' target=''><img src='./img/mypage.png' onclick='check_input()'/>����������</a>
<?
}
	else if($id)
	{
	
?>
<a href='./member/mypage.php' target=''><img src='./img/mypage.png' />����������</a>
<?

}
?>
<?
	if(!$id){
?>
<a href='#' target=''><img src='./img/delivery.png' />&nbsp;�ֹ�/���</a>
<?
}
	else if($id)
	{
?>
<a href='./order/finishorder.php' target=''><img src='./img/delivery.png' />&nbsp;�ֹ�/���</a>
<?
	}
?>

</ul>
</div>
</form>
					</div>
				</div>
			</div>
			
		</div><!--/header-bottom-->
		</div><!--/header-middle-->
	</header><!--/header-->
</header>

<style>
.header-bottom{ background: white repeat-x 0 0;}
.f-nav{ z-index: 9999; position: fixed; left: 0; top: 0; width: 100%;} /* this make our menu fixed top */
	
</style>

