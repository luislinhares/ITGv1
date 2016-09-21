<?php
include('session.php');

?>
<?php include_once 'class.crud.php'; 
		include_once 'dbconfig.php';

?>
<?php

if(!empty($_POST['sumbitPDF'])){
	
include_once 'class.crud.php'; 
require('fpdf/fpdf.php');




$image1 = "img/ITG_Systems_W.jpg";
$image2 = "img/bg-login2.jpg";

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);




//$pdf->Image('/favicon-32x32.png' , 10 ,8, 10 , 13,'PNG');
$pdf->Cell( 40, 40, $pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 50.78), 0, 0, 'L', false );
$pdf->Cell(35, 10, '', 0);
$pdf->SetFont('Arial', '', 6);
$pdf->Cell(79, 10, 'ITG SYSTEM - Relatorio', 0);
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(40, 5, 'Data: '.date('d-m-Y').'', 0);
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(100, 8, '|| LISTA DE PRODUTOS ||', 0);
$pdf->Ln(23);
$pdf->SetFont('Arial', 'B', 8);


$pdf->Cell(15, 8, 'ID',1,0,'L',0);
$pdf->Cell(40, 8, 'Referencia',1,0,'L',0);
$pdf->Cell(40, 8, 'Nome Produto',1,0,'L',0);
$pdf->Cell(40, 8, 'Preco Produto', 1,0,'L',0);
$pdf->Cell(40, 8, 'Stock',1,0,'L',0);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA
$productos = mysql_query("SELECT * FROM produtos");
$item = 0;
$totaluni = 0;
$totaldis = 0;
while($productos2 = mysql_fetch_array($productos)){
	$item = $item+1;
	$totaluni = $totaluni + $productos2['preco_produto'];
	$totaldis = $totaldis + $productos2['preco_produto_iva'];
	$pdf->Cell(15, 8, $item, 1,0,'L',0);
	$pdf->Cell(40, 8, $productos2['referencia'], 1,0,'L',0);
	$pdf->Cell(40, 8, $productos2['nome_produto'],1,0,'L',0);
	$pdf->Cell(40, 8, $productos2['preco_produto'],1,0,'L',0);
	$pdf->Cell(40, 8, $productos2['preco_produto_iva'],1,0,'L',0);
	$pdf->Ln(8);
}
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(95, 8, '', 0);
$pdf->Cell(40,8,'Valor Global: '.$totaluni,1,0,'L',0);
$pdf->Cell(40,8,'Total Stock: '.$totaldis,1,0,'L',0);



$pdf->Output();
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
	<title>ITG Relatorio</title>
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
				<!-- start: Header Menu -->
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
						<a href="consultar.php"> > Relatorio</a> 
						
						<!--<i class="icon-angle-right"></i>-->
					</li>
				
				</ul>
		
		<div>
		<div class="container-fluid">
			

			  <!--<a class="btn btn-large btn-info" type="submit" id="consulta">Procurar
				<a class="btn "><input type="text" id="consulta"></input>-->
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



     <form method='post'>
 
    <table class='table table-bordered table-responsive'>
			 
			 <tr>
					
					<td><strong>ID</strong></td>
					<td><strong>Referencia</strong></td>
					<td align="center"><strong>Nome do  Produto</strong></td>
					<td align="center"><strong>Preço do Produto</strong></td>
					<td align="center"><strong>Preço Final</strong></td>
					<td align="center"><strong>Stock</strong></td>
					<td align="center"><strong>Imagem</strong></td>
					<td align="center"><strong>Gerar Relatório</strong></td>
					 </tr>
					 <?php
						$query = "SELECT * FROM produtos";       
						$records_per_page=6;
						$newquery = $crud->paging($query,$records_per_page);
						$crud->dataviewPDF($newquery);
						
					 ?>
					<tr>
						<td colspan="8" align="center">
							<div class="pagination-wrap">
							<?php $crud->paginglink($query,$records_per_page); ?>
							</div>
						</td>
			</tr>


			</table>
			</table>
</form>
		
	</body>
</html>
