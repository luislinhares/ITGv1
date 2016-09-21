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
	extract($crud->getID($id));	
}


?>

<div class="clearfix"></div>


<?php
if(isset($msg))
{
	echo $msg;
}
?>


<!DOCTYPE html>
<html>
	<title>ITG Editar</title>
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

	</head>
		<body>
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">

				<a class="brand" href="http://www.itgtools.pt" target="_blank">
				<img border="0" alt="itg_system" src="img/ITG_Systems_B.png" width="170" height="100">
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						<!-- start: User Dropdown -->
						
						
					<div class="dropdown">
							<a class="account" ><?php echo $_SESSION['login_user'];?></a>

							<div class="submenu">
								<ul class="root">
									<li ><a href="" >Prefil</a></li>
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
						<i class="icon-home"></i>
						<a href="consultar.php">Consultar</a> 
					</li>
					<li>
						Editar Peça<i class="icon-angle-right"></i>
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
            <td>Referencia</td>
            <td><input type='text' name='referencia' class='form-control' value="<?php echo $referencia; ?>" required></td>
        </tr>
        <tr>
            <td>Nome do Produto</td>
            <td><input type='text' name='nome_produto' class='form-control' value="<?php echo $nome_produto; ?>" required></td>
        </tr>
 
        <tr>
            <td>Preço do Produto</td>
            <td><input type='text' name='preco_produto' class='form-control' value="<?php echo $preco_produto; ?>" required></td>
        </tr>
 
        <tr>
            <td>preco_produto_iva</td>
            <td><input type='text' name='preco_produto_iva' class='form-control' value="<?php echo $preco_produto_iva; ?>" required></td>
        </tr>
 
        <tr>
            <td>Produto Stock</td>
            <td><input type='text' name='produto_stock' class='form-control' value="<?php echo $produto_stock; ?>" required></td>
        </tr>
		<tr>
            <td>Imagem</td>
            <td><input type='file' name='produto_imagem' class='form-control' value="<?php echo $produto_imagem; ?>" required></td>
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
