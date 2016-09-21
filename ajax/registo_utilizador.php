<?php
include('session.php');

?>
<?php include_once 'class.crud.php'; 
		include_once 'dbconfig.php';
		
		
if(isset($_POST['btn-save']))
{	
	$Nome = $_POST['Nome'];
	$Email = $_POST['Email'];
	$morada = $_POST['morada'];
	$cod_postal = $_POST['cod_postal'];
	$nif = $_POST['nif'];
	$tipo_empresa = $_POST['tipo_empresa'];
	
	if($crud->create($Nome,$Email,$morada,$cod_postal,$nif,$tipo_empresa))
	{
		header("Location: registo_utilizador.php?inserted");
	}
	else
	{
		header("Location: registo_utilizador.php?failure");
	}
}
?>
<?php
if(isset($_GET['inserted']))
{
	?>
    <div class="container">
	<div class="alert alert-info">
    		<strong>Regito de utilizador efetuado!
	</div>
	</div>
    <?php
}
else if(isset($_GET['failure']))
{
	?>
    <div class="container">
	<div class="alert alert-warning">
    <strong> ERRO ao registar !
	</div>
	</div>
    <?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>ITG - Registo</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
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
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
			
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- end: Favicon -->
	
		<style type="text/css">
			body { background: url(img/bg-login.jpg) !important; }
		</style>
		
		
		
</head>

<body>
		<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<br>
				<img border="0" alt="itg_system" src="img/ITG_Systems_B.png"  href="http://www.itgtools.pt" width="240" height="55">
				<br>	
				<br>				
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						<!-- start: User Dropdown -->
		
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
		<div class="container-fluid-full">
		<div class="row-fluid">
					
			<div class="row-fluid">
				<div class="login-box" style="opacity: 0.9; width:800px; height: 350px">
					<h2>Registar Utilizador</h2>
					<br>
					<form class="form-horizontal" action="ajax/registo_utilizador.php" method="post">
						<fieldset style="float: left; width: 400px">
							<div class="input-prepend" title="UserPass">
								<span class="add-on"></span>
								<input class="input-large span5" name="utilizador" id="utilizador" type="text" placeholder="Utilizador"required/>
								<span class="add-on" style="margin-left: 15px"></span>
								<input class="input-large span5" name="password" id="password" type="password" placeholder="Password"required/>
							</div>
							<div class="input-prepend" title="Nome">
								<span class="add-on"></span>
								<input class="input-large span10" name="Nome" id="Nome" type="text" placeholder="Nome"required/>
								<span class="add-on" style="margin-left: 15px"></span>
							</div>
							
							<div class="input-prepend" title="Email">
								<span class="add-on"></span>
								<input class="input-large span10" name="Email" id="Email" type="text" placeholder="Email"required/>
								<span class="add-on" style="margin-left: 15px"></span>
							</div>
							
							<div class="input-prepend" title="Morada">
								<span class="add-on"></span>
								<input class="input-large span10" name="Morada" id="Morada" type="E-mail" placeholder="Morada"required/>
								<span class="add-on" style="margin-left: 15px"></span>
							</div>
							

							
			
				
						</fieldset>
					<form class="form-horizontal" action="ajax/registo_utilizador.php" method="post">
						<fieldset style="float: left; width: 400px">
							<div class="input-prepend" title="Cod-Postal">
								<span class="add-on"></span>
								<input class="input-large span5" name="Cod-Postal" id="Cod-Postal" type="text" placeholder="Cod-Postal"required/>
								<span class="add-on" style="margin-left: 10px"></span>
								<input class="input-large span5" name="NIF" id="NIF" type="text" placeholder="NIF"required/>
							</div>
							<div class="input-prepend" title="Tipo">
								<span class="add-on"></span>
								<input class="input-large span10" name="Tipo" id="Nome" type="text" placeholder="Tipo de Empresa"required/>
								<span class="add-on" style="margin-left: 15px"></span>
							</div>
				
							<div class="input-prepend" title="Nome">
								<span class="add-on"></span>
								<input class="input-large span10" name="Nome" id="Nome" type="text" placeholder="Nome"required/>
								<span class="add-on" style="margin-left: 15px"></span>
							</div>
							<div class="input-prepend" title="Nome">
								<span class="add-on"></span>
								<span class="add-on" style="margin-left: 65px"></span>
								<button type="submit" class="btn btn-primary" ><a href="index.php">Voltar ao Login</button>
								
								<button type="submit" class="btn btn-primary" >Submeter</button>
								
								
							</div>
							
							
							<div class="clearfix"></div>

							
						</fieldset>
					</form>
					
					
				</div><!--/span-->
			</div><!--/row-->
			

	</div><!--/.fluid-container-->
	

	<!-- start: JavaScript-->

		<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="js/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="js/jquery.ui.touch-punch.js"></script>
	
		<script src="js/modernizr.js"></script>
	
		<script src="js/bootstrap.min.js"></script>
	
		<script src="js/jquery.cookie.js"></script>
	
		<script src='js/fullcalendar.min.js'></script>
	
		<script src='js/jquery.dataTables.min.js'></script>

		<script src="js/excanvas.js"></script>
		<script src="js/jquery.flot.js"></script>
		<script src="js/jquery.flot.pie.js"></script>
		<script src="js/jquery.flot.stack.js"></script>
		<script src="js/jquery.flot.resize.min.js"></script>
	
		<script src="js/jquery.chosen.min.js"></script>
	
		<script src="js/jquery.uniform.min.js"></script>
		
		<script src="js/jquery.cleditor.min.js"></script>
	
		<script src="js/jquery.noty.js"></script>
	
		<script src="js/jquery.elfinder.min.js"></script>
	
		<script src="js/jquery.raty.min.js"></script>
	
		<script src="js/jquery.iphone.toggle.js"></script>
	
		<script src="js/jquery.uploadify-3.1.min.js"></script>
	
		<script src="js/jquery.gritter.min.js"></script>
	
		<script src="js/jquery.imagesloaded.js"></script>
	
		<script src="js/jquery.masonry.min.js"></script>
	
		<script src="js/jquery.knob.modified.js"></script>
	
		<script src="js/jquery.sparkline.min.js"></script>
	
		<script src="js/counter.js"></script>
	
		<script src="js/retina.js"></script>

		<script src="js/custom.js"></script>
	<!-- end: JavaScript-->
	
</body>
</html>

	