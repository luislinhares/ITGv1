<?php
include_once 'dbconfig.php';
include('session.php');


	$search = mysql_real_escape_string($_POST['search']);
	$search_sql="SELECT * FROM produtos WHERE id LIKE '$search' OR referencia LIKE '$search' OR nome_produto LIKE '$search'";
	$search_query=mysql_query($search_sql);
	if(mysql_num_rows($search_query)!=0){
		$search_rs=mysql_fetch_assoc($search_query);	
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
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">

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
		
		<script type="text/javascript"  language="javascript" src="js/ajax.js"></script>

		<script src= "//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" ></script> 
	
		
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
							$("#produtos-grid").append('<tbody class="produtos-grid-error"><tr><th colspan="3">Não foi encontrado no servidor</th></tr></tbody>');
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
						<!--<i class="icon-angle-right"></i>-->
					</li>
				
				</ul>
		
		<div>
			<div class="container-fluid">
	
			<div class="container-fluid">
			<br>
	
				<div id="busca">
				<form method="post" action="procurar.php" >
					<div id="Pesquisar">
						<i class="glyphicon glyphicon-search"></i>
						<!--<input type="text" name="buscar"/> -->
						<label for="consulta">Consultar:</label>
						<input type="text" name="search" maxlength="255" />
						<input type="submit" name="submit" value="OK" /></br></br>
						<!--<input type="submit" id="pesquisar" name="enviar" class="btn btn-small btn-info" value="Procurar"><br><br>-->
					
					</div>	 	   
				</form>

			</div>
		</div>
		
<?php if(mysql_num_rows($search_query)!=0){
		
			do{ ?>
		<table class='table table-bordered table-responsive'>
			 <tr>
					
					<td><strong>ID</strong></td>
					<td><strong>Referencia</strong></td>
					<td align="center"><strong>Nome do  Produto</strong></td>
					<td align="center"><strong>Preço do Produto</strong></td>
					<td align="center"><strong>Preço Final</strong></td>
					<td align="center"><strong>Stock</strong></td>
					<td align="center"><strong>Imagem</strong></td>
			</tr>
		
			<tr>
				<td><?php echo $search_rs['id'];?></td>
				<td><?php echo $search_rs['referencia'];?></td>
				<td><?php echo $search_rs['nome_produto'];?></td>
				<td><?php echo $search_rs['preco_produto'];?></td>
				<td><?php echo $search_rs['preco_produto_iva'];?></td>
				<td><?php echo $search_rs['produto_imagem'];?></td>
				<td><?php echo $search_rs['produto_stock'];?></td>
				
			</tr>
			

			</table>
			<?php	}while($search_rs=mysql_fetch_assoc($search_query));	
		}else{
				echo "Consulta não encontrada ...";
			}
		
		?>
		
		
</div>


 
       
</div>
</body>
</html>