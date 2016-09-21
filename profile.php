<?php
include('session.php');


?>
<?php include_once 'class.crud.php'; 
		include_once 'dbconfig.php';
?>
<?php
		
if(isset($_POST['btn-update']))
{
$id = $_GET['edit_id'];
	$ref = $_POST['referencia'];
	$pname = $_POST['nome_produto'];
	$ppreco = $_POST['preco_produto'];
	$precoIVA = $_POST['preco_produto_iva'];
	$pstock = $_POST['produto_stock'];
	$produtoimg = $_POST['produto_imagem'];
	
	
	if($crud->update($id,$ref,$pname,$ppreco,$precoIVA,$pstock,$produtoimg))
	{
		$msg = "<div class='alert alert-info'>
				Gravado com sucesso!
				</div>";
	}
	else
	{
		$msg = "<div class='alert alert-warning'>
				<a>Erro enquanto gravou !</a>
				</div>";
	}
}

if(isset($_GET['edit_id']))
{
	$id = $_GET['edit_id'];
	extract($crud->getIDProfile($id));	
}


?>

<div class="clearfix"></div>


<?php
if(isset($msg))
{
	echo $msg;
}
?>




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
						 > Editar Perfil
					</li>
				
				</ul>
		
		<div>
	<div class="clearfix"></div><br />

     <form method='post'>
 
    <table class='table table-bordered table-responsive'>
	  	   <tr>
            <td>ID</td>
            <td><input type='text' name='id' class='form-control' value="<?php echo $id; ?>" disabled></td>
        </tr>
		<tr>
            <td>username</td>
            <td><input type='text' name='username' class='form-control' value="<?php echo $username; ?>" required></td>
        </tr>
        <tr>
            <td>password</td>
            <td><input type='text' name='password' class='form-control' value="<?php echo $password; ?>" required></td>
        </tr>
 
        <tr>
            <td>nome</td>
            <td><input type='text' name='nome' class='form-control' value="<?php echo $nome; ?>" required></td>
        </tr>
 
        <tr>
            <td>morada</td>
            <td><input type='text' name='morada' class='form-control' value="<?php echo $morada; ?>" required></td>
        </tr>
 
        <tr>
            <td>numero</td>
            <td><input type='text' name='numero' class='form-control' value="<?php echo $numero; ?>" required></td>
        </tr>

               <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-primary" name="btn-update">
    			<span class="glyphicon glyphicon-edit"></span>  Atualizar
				</button>
                <a href="index.php" class="btn btn-primary"><i class="glyphicon glyphicon-backward"></i> &nbsp; Voltar</a>
            </td>
        </tr>
 
		</table>
	</form>
		
	</body>
</html>
