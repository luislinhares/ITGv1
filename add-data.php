<?php
include('session.php');
//include('./classes/image_class.php');


?>
<?php include_once 'class.crud.php'; 
		include_once 'dbconfig.php';


		if(isset($_POST['btn-save']))
{	
	$id = $_POST['id'];
	$ref = $_POST['referencia'];
	$pname = $_POST['nome_produto'];
	$ppreco = $_POST['preco_produto'];
	$precoIVA = $_POST['preco_produto_iva'];
	$pstock = $_POST['produto_stock'];
	$produtoimg = $_POST['produto_imagem'];
	
	if($crud->create($id,$ref,$pname,$ppreco,$precoIVA,$pstock,$produtoimg))
	{
		header("Location: add-data.php?inserted");
	}
	else
	{
		header("Location: add-data.php?failure");
	}
}
?>
<?php
if(isset($_GET['inserted']))
{
	?>
    <div class="container">
	<div class="alert alert-info">
    <strong>Gravado com sucesso <a href="index.php"></a>!
	</div>
	</div>
    <?php
}
else if(isset($_GET['failure']))
{
	?>
    <div class="container">
	<div class="alert alert-warning">
    <strong> ERRO grave ao gravar !
	</div>
	</div>
    <?php
}
?>




<!DOCTYPE html>
<html>
	<title>ITG Consultar</title>
	<head>
		<!-- start: Meta -->
	<meta charset="utf-8">
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- end: Favicon -->
		<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
		<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
		<script type="text/javascript" language="javascript" >
			$(document).ready(function() {
				var dataTable = $('#produtos').DataTable( {
					"processing": true,
					"serverSide": true,
					"ajax":{
						url :"material.php", // json datasource
						type: "post",  // method  , by default get
						error: function(){  // error handling
							$(".produtos-error").html("");
							$("#produtos-grid").append('<tbody class="produtos-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
							$("#produtos-grid_processing").css("display","none");
							
						}
					}
				} );
			} );
		</script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript" >
			$(document).ready(function()
			{

			$(".account").click(function()
			{
			var X=$(this).attr('id');
			if(X==1)
			{
			$(".submenu").hide();
			$(this).attr('id', '0'); 
			}
			else
			{
			$(".submenu").show();
			$(this).attr('id', '1');
			}

			});

			//Mouse click on sub menu
			$(".submenu").mouseup(function()
			{
			return false
			});

			//Mouse click on my account link
			$(".account").mouseup(function()
			{
			return false
			});


			//Document Click
			$(document).mouseup(function()
			{
			$(".submenu").hide();
			$(".account").attr('id', '');
			});
			});
</script>
	</head>
<body>
		<div class="navbar">
		<div class="navbar-inner" >
			<div class="container-fluid">
				<img border="0" href="http://www.itgtools.pt" alt="itg_system" src="img/ITG_Systems_B.png" width="170" height="100">
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
				<!-- END: Header Menu -->
						<!-- start: User Dropdown -->
										
					<div class="dropdown">
							<a class="account" ><?php echo $_SESSION['login_user'];?></a>

							<div class="submenu">
								<ul class="root">
									<li ><a href="profile.php" >Prefil</a></li>
									<li ><a href="logout.php">Logout</a></li>
								</ul>
							</div>

					</div>

						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
	<!-- start: Header -->
	
		<div class="container-fluid-full">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav nav-tabs nav-justified">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li><a href="consultar.php"></i></i><span class="hidden-tablet">Consultar</span></a></li>
						<li><a href="add-data.php"></i></i><span class="hidden-tablet">Adicionar Peça</span></a></li>
						<li><a href="relatorios.php"></i></i><span class="hidden-tablet">Relatorios Stock</span></a></li>
					</ul>
				</div>
			</div>
			<!-- end: Main Menu -->
		
			
			<!-- start: Content -->
			<div id="content" class="span10">
				<ul class="breadcrumb">
					<li>
		
						<a href="consultar.php"> > Adicionar Peça</a> 
						
						<!--<i class="icon-angle-right"></i>-->
					</li>
				
				</ul>
		
		<div>
		<div class="container-fluid">
			

			  <!--<a class="btn btn-large btn-info" type="submit" id="consulta">Procurar
				<a class="btn "><input type="text" id="consulta"></input>-->
			<div class="container-fluid">
			<br>
		

		</div>
 	
	 <form method='post'>
 
					<table class='table table-bordered table-responsive'>
						<tr>
								<td>Referência </td>
								<td><input type='text' name='referencia' class='form-control' required></td>
						</tr>
						<tr>
								<td>Nome do Produto</td>
								<td><input type='text' name='nome_produto' class='form-control' required></td>
						</tr>
					 
						<tr>
								<td>Preço do Produto</td>
								<td><input type='text' name='preco_produto' class='form-control' required></td>
						</tr>
					 
						<tr>
								<td>Preço do Produto C/Iva</td>
								<td><input type='text' name='preco_produto_iva' class='form-control' required></td>
						</tr>
						<tr>
								<td>Stock</td>
								<td><input type='text' name='produto_stock' class='form-control' required></td>
						</tr>
					 
						<tr>
								<td>Imagem</td>
							
								<td><input type='file' name='produto_imagem' class='form-control' required></td>
						
						</tr>
						<tr>
					 
						<tr>
							<td colspan="2">
						
							<a href="index.php" class="btn btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Voltar para a Tabela</a>
								<button type="submit" class="btn btn-primary" name="btn-save" value="btn-save">
									<span class="glyphicon glyphicon-ok"></span> Adicionar Peça
								</button>  
							</td>
						</tr>
						 
			</table>
	</form>
     </div>
</html>
