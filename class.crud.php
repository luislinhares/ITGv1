<?php



class crud
{
	private $db;
	
	function __construct($DB_con)
	{
		$this->db = $DB_con;
	}
	
	public function create($id,$ref,$pname,$ppreco,$precoIVA,$pstock,$produtoimg)
	{
		try
		{
			$stmt = $this->db->prepare("INSERT INTO produtos(id,referencia,nome_produto,preco_produto,preco_produto_iva,produto_stock,produto_imagem) VALUES(:id, :ref, :pname, :ppreco, :precoIVA, :pstock, :produtoimg)");
			$stmt->bindparam(":id",$id);
			$stmt->bindparam(":ref",$ref);
			$stmt->bindparam(":pname",$pname);
			$stmt->bindparam(":ppreco",$ppreco);
			$stmt->bindparam(":precoIVA",$precoIVA);
			$stmt->bindparam(":pstock",$pstock);
			$stmt->bindparam(":produtoimg",$produtoimg);
			
		
			
			$stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
		
	}
	
	public function profile($id,$nome,$morada,$numero)
	{

		try
		{
			$stmt=$this->db->prepare("SELECT id, nome, morada, numero FROM login WHERE id=:id ");
			
			$stmt->bindparam(':id',$id);										
			$stmt->bindparam(':nome',$nome);
			$stmt->bindparam(':morada',$morada);
			$stmt->bindparam(':numero',$numero);
			
			$stmt->execute();
			
			return true;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}
	public function getIDProfile($id)
	{
		$stmt = $this->db->prepare("SELECT * FROM login WHERE id=:id");
		$stmt->execute(array(":id"=>$id));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}
	
	public function getID($id)
	{
		$stmt = $this->db->prepare("SELECT * FROM produtos WHERE id=:id");
		$stmt->execute(array(":id"=>$id));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}
	
	public function update($id,$ref,$pname,$ppreco,$precoIVA,$pstock,$produtoimg)
	{

		try
		{
			$stmt=$this->db->prepare("UPDATE produtos SET id=:id,
														referencia=:ref,
														nome_produto=:pname, 
														preco_produto=:ppreco, 
														preco_produto_iva=:precoIVA,
														produto_stock=:pstock,
														produto_imagem=:produtoimg
														WHERE id= :id ");
														
			$stmt->bindparam(':ref',$ref);
			$stmt->bindparam(':pname',$pname);
			$stmt->bindparam(':ppreco',$ppreco);
			$stmt->bindparam(':precoIVA',$precoIVA);
			$stmt->bindparam(':pstock',$pstock);
			$stmt->bindparam(':produtoimg',$produtoimg);
			$stmt->bindparam(':id', $id);	
			$stmt->execute();
			
			return true;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}

	
	public function delete($id)
	{
		$stmt = $this->db->prepare("DELETE FROM produtos WHERE id=:id");
		$stmt->bindparam(":id",$id,PDO::PARAM_INT);
		$stmt->execute();
		return true;
	}

	
	/* paging */
	
	public function dataview($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				
				?>
                <tr>
					<td><?php print($row['id']); ?></td>
					<td><?php print($row['referencia']); ?></td>
					<td><?php print($row['nome_produto']); ?></td>
					<td><?php print($row['preco_produto']); ?></td>
					<td><?php print($row['preco_produto_iva']); ?></td>
					<td><?php print($row['produto_stock']); ?></td>
					
					<td>
					<?php 
						
						
					 print '
		
<style>
		#myImg {
			border-radius: 5px;
			cursor: pointer;
			transition: 0.3s;
		}

		#myImg:hover {opacity: 0.7;}

		/* The Modal (background) */
		.modal {
			display: none; /* Hidden by default */
			position: fixed; /* Stay in place */
			z-index: 1; /* Sit on top */
			padding-top: 100px; /* Location of the box */
			left: 0;
			top: 0;
			width: 100%; /* Full width */
			height: 100%; /* Full height */
			overflow: auto; /* Enable scroll if needed */
			background-color: rgb(0,0,0); /* Fallback color */
			background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
		}

		/* Modal Content (Image) */
		.modal-content {
			margin: auto;
			display: block;
			width: 80%;
			max-width: 700px;
		}

		/* Caption of Modal Image (Image Text) - Same Width as the Image */
		#caption {
			margin: auto;
			display: block;
			width: 80%;
			max-width: 700px;
			text-align: center;
			color: #ccc;
			padding: 10px 0;
			height: 150px;
		}

		/* Add Animation - Zoom in the Modal */
		.modal-content, #caption { 
			-webkit-animation-name: zoom;
			-webkit-animation-duration: 0.6s;
			animation-name: zoom;
			animation-duration: 0.6s;
		}

		@-webkit-keyframes zoom {
			from {-webkit-transform:scale(0)} 
			to {-webkit-transform:scale(1)}
		}

		@keyframes zoom {
			from {transform:scale(0)} 
			to {transform:scale(1)}
		}

		/* The Close Button */
		.close {
			position: absolute;
			top: 15px;
			right: 35px;
			color: #f1f1f1;
			font-size: 40px;
			font-weight: bold;
			transition: 0.3s;
		}

		.close:hover,
		.close:focus {
			color: #bbb;
			text-decoration: none;
			cursor: pointer;
		}

		/* 100% Image Width on Smaller Screens */
		@media only screen and (max-width: 700px){
			.modal-content {
				width: 100%;
			}
		}
					
</style>
						
						
						<!-- Trigger the Modal -->
			
						<img id="myImg" src="img/'.$row['produto_imagem'].'" width="50" height="50">
						
						
						<!-- The Modal -->
						<div id="myModal" class="modal">

						  <!-- The Close Button -->
						  <span class="close" onclick="window.open("myModal").style.display="none"">&times;</span>

						  <!-- Modal Content (The Image) -->
						  <img class="modal-content" id="produto_imagem">
			
						  

						  <!-- Modal Caption (Image Text) -->
						  <div id="caption"></div>
						</div>
		
												

							<script type="text/javascript" language="javascript">
						// Get the modal
						var modal = document.getElementById("myModal");
						

						// Get the image and insert it inside the modal - use its "alt" text as a caption
						var img = document.getElementById("myImg");
						var modalImg = document.getElementById("produto_imagem");
						var captionText = document.getElementById("caption");
						
						
						img.onclick = function(){
							
							modal.style.display = "block";
							modalImg.src = this.src;
							captionText.innerHTML = this.alt;
						}

						// Get the <span> element that closes the modal
						var span = document.getElementsByClassName("close")[0];

						// When the user clicks on <span> (x), close the modal
						span.onclick = function() {
							modal.style.display = "none";
						}
						</script>
														
										
					'; 
					?></td>
		
					


					
					<td align="center">
					<a href="edit-data.php?edit_id=<?php print($row['id']); ?>"><i class="glyphicon glyphicon-edit"></i></a>
					<a href="delete.php?delete_id=<?php print($row['id']); ?>"><i class="glyphicon glyphicon-remove-circle"></i></a>
					</td>
	
                </tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td>Não existem produtos...</td>
            </tr>
            <?php
		}
		
	}
	
	#PARA GERAR PDF
	
		public function dataviewPDF($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
					<td><?php print($row['id']); ?></td>
					<td><?php print($row['referencia']); ?></td>
					<td><?php print($row['nome_produto']); ?></td>
					<td><?php print($row['preco_produto']); ?></td>
					<td><?php print($row['preco_produto_iva']); ?></td>
					<td><?php print($row['produto_stock']); ?></td>
					<td><?php echo ($row['produto_imagem']); ?></td>

					<td align="center">
					<button type="sumbitPDF" name="sumbitPDF" class="btn btn-primary" value="sumbitPDF">
								<span class="glyphicon glyphicon"></span> Gerar PDF
								
					</button>  
					</td>
	
                </tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td>Não existem produtos...</td>
            </tr>
            <?php
		}
		
	}
	
	public function paging($query,$records_per_page)
	{
		$starting_position=0;
		if(isset($_GET["page_no"]))
		{
			$starting_position=($_GET["page_no"]-1)*$records_per_page;
		}
		$query2=$query." limit $starting_position,$records_per_page";
		return $query2;
	}
	
	public function paginglink($query,$records_per_page)
	{
		
		$self = $_SERVER['PHP_SELF'];
		
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		
		$total_no_of_records = $stmt->rowCount();
		
		if($total_no_of_records > 0)
		{
			?><ul class="pagination"><?php
			$total_no_of_pages=ceil($total_no_of_records/$records_per_page);
			$current_page=1;
			if(isset($_GET["page_no"]))
			{
				$current_page=$_GET["page_no"];
			}
			if($current_page!=1)
			{
				$previous =$current_page-1;
				echo "<li><a href='".$self."?page_no=1'>Inicio</a></li>";
				echo "<li><a href='".$self."?page_no=".$previous."'>Anterior</a></li>";
			}
			for($i=1;$i<=$total_no_of_pages;$i++)
			{
				if($i==$current_page)
				{
					echo "<li><a href='".$self."?page_no=".$i."' style='color:green;'>".$i."</a></li>";
				}
				else
				{
					echo "<li><a href='".$self."?page_no=".$i."'>".$i."</a></li>";
				}
			}
			if($current_page!=$total_no_of_pages)
			{
				$next=$current_page+1;
				echo "<li><a href='".$self."?page_no=".$next."'>Seguinte</a></li>";
				echo "<li><a href='".$self."?page_no=".$total_no_of_pages."'>Ultimo</a></li>";
			}
			?></ul><?php
		}
	}
	
	/* paging */
	
}
