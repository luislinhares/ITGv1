<?php
include('session.php');



?>
<?php include_once 'class.crud.php'; 
		include_once 'dbconfig.php';
?>


<html>
	<title>ITG Consultar</title>
	<head>
	
	
		<script type="text/javascript">
window.document.onkeydown = function (e)
{
    if (!e){
        e = event;
    }
    if (e.keyCode == 27){
        lightbox_close();
    }
}
</script>	
<!--Copy and paste the code below, into your <head> section </head>-->
 
<link rel="stylesheet" type="text/css" href="css_pirobox/style_1/style.css"/>
<!--::: OR :::-->
<link rel="stylesheet" type="text/css" href="css_pirobox/style_2/style.css"/>
<!--::: it depends on which style you choose :::-->
 
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.2.custom.min.js"></script>
<script type="text/javascript" src="js/pirobox_extended.js"></script>
 
<!-- or use minified version  "pirobox_extended_min.js"  -->
 
<link rel="stylesheet" type="text/css" href="css_pirobox/style_1/style.css"/>
<!--::: OR :::-->
<link rel="stylesheet" type="text/css" href="css_pirobox/style_2/style.css"/>
<!--::: it depends on which style you choose :::-->
 
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.2.custom.min.js"></script>
<script type="text/javascript" src="js/pirobox_extended.js"></script>
 
<!-- or use minified version  "pirobox_extended_min.js"  -->
 
<script type="text/javascript">
$(document).ready(function() {
    $().piroBox_ext({
        piro_speed : 900,
        bg_alpha : 0.1,
        piro_scroll : true //pirobox always positioned at the center of the page
    });
});
</script>

 
<!-- that's IT-->

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
	<!-- Magnific Popup core CSS file -->
	<link rel="stylesheet" href="magnific-popup/magnific-popup.css">

	<!-- jQuery 1.7.2+ or Zepto.js 1.0+ -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

	<!-- Magnific Popup core JS file -->
	<script src="magnific-popup/jquery.magnific-popup.js"></script>
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
		<script type="text/javascript" language="javascript" src="js/minimal.lightbox.js"></script>
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
	<link href='https://fonts.googleapis.com/css?family=Bungee+Hairline' rel='stylesheet' type='text/css'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no"/>
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

<script>
$(document).ready(function(){

    loadGallery(true, 'a.thumbnail');

    //This function disables buttons when needed
    function disableButtons(counter_max, counter_current){
        $('#show-previous-image, #show-next-image').show();
        if(counter_max == counter_current){
            $('#show-next-image').hide();
        } else if (counter_current == 1){
            $('#show-previous-image').hide();
        }
    }

    /**
     *
     * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
     * @param setClickAttr  Sets the attribute for the click handler.
     */

    function loadGallery(setIDs, setClickAttr){
        var current_image,
            selector,
            counter = 0;

        $('#show-next-image, #show-previous-image').click(function(){
            if($(this).attr('id') == 'show-previous-image'){
                current_image--;
            } else {
                current_image++;
            }

            selector = $('[data-image-id="' + current_image + '"]');
            updateGallery(selector);
        });

        function updateGallery(selector) {
            var $sel = selector;
            current_image = $sel.data('image-id');
            $('#image-gallery-caption').text($sel.data('caption'));
            $('#image-gallery-title').text($sel.data('title'));
            $('#image-gallery-image').attr('src', $sel.data('image'));
            disableButtons(counter, $sel.data('image-id'));
        }

        if(setIDs == true){
            $('[data-image-id]').each(function(){
                counter++;
                $(this).attr('data-image-id',counter);
            });
        }
        $(setClickAttr).on('click',function(){
            updateGallery($(this));
        });
    }
});
</script>

<script type="text/javascript" >


$(document).ready(function() {
  $('.image-link').magnificPopup({type:'image'});
});

$(document).ready(function() {
	$('.popup-gallery').magnificPopup({
		delegate: 'a',
		type: 'image',
		tLoading: 'Loading image #%curr%...',
		mainClass: 'mfp-img-mobile',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},
		image: {
			tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
			titleSrc: function(item) {
				return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
			}
		}
	});
});

</script>
<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    modalImg.alt = this.alt;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
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
						<i class="icon-home"></i>
						<a href="consultar.php">Consultar</a> 
						
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

		
	
		
		 <table class='table table-bordered table-responsive'>
			 
			 <tr>
					

					
					<td><strong>ID</strong></td>
					<td><strong>Referencia</strong></td>
					<td align="center"><strong>Nome do  Produto</strong></td>
					<td align="center"><strong>Preço do Produto</strong></td>
					<td align="center"><strong>Preço Final</strong></td>
					<td align="center"><strong>Stock</strong></td>
					<td align="center"><strong>Imagem</strong></td>
					<td colspan="2" align="center"><strong>Editar/Eliminar</strong></td>
					 </tr>
					 <?php
						$query = "SELECT * FROM produtos";		
						$records_per_page=8;
						$newquery = $crud->paging($query,$records_per_page);
						$crud->dataview($newquery);
						
					 ?>
					<tr>
						<td colspan="8" align="center">
							<div class="pagination-wrap">
							<?php $crud->paginglink($query,$records_per_page); ?>
							</div>
						</td>
			</tr>


			</table>
		
</div>


 
       
</div>
</body>
</html>