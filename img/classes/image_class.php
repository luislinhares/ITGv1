<?php
	include('session.php');
	

?>
<?php include_once 'class.crud.php'; 
		include_once 'dbconfig.php';
		
		class Image
		{
			var
				$image_id;
				$image_name;
				$image;			
		
		function insert_into_image()
		{
			if($_FILES["produto_imagem"])
			{
				$tempname = $_FILES['produto_imagem']["tmp_name"];
				$originalname = $_FILES['produto_imagem']["name"];
				$size = ($_FILES['produto_imagem']["size"]/ 5242880)." MB<br>";
				$type = $_FILES['produto_imagem']["type"];
				$image = $_FILES['produto_imagem']["name"];
			
				move_uploaded_file($_FILES["produto_imagem"]["temp_name"],"img/".$_FILES["produto_imagem"]["name"]);
			}
			
			$query = "INSERT INTO insert_into_image
						(
							image_name,
							image
						)
						values(
							'$this->image_name',
							'$image'
						)";
						if(mysql_query($query))
						{
							echo "<script language='javascript' type='text/javascript'>
									alert('Image Upload');
									</script>";
						}
						else
						{
							echo"<script language='javascript' type='text/javascript'>
									alert('Image not Upload');
									</script>";
						}
					}
		
				}
		}
?>

<?php
		class Image
		{
			var
				$image_id;
				$produto_imagem;
				$image;			
		
		function insert_into_image()
		{
			if($_FILES["produto_imagem"])
			{
				$tempname = $_FILES['produto_imagem']["tmp_name"];
				$originalname = $_FILES['produto_imagem']["name"];
				$size = ($_FILES['produto_imagem']["size"]/ 5242880)." MB<br>";
				$type = $_FILES['produto_imagem']["type"];
				$image = $_FILES['produto_imagem']["name"];
			
				move_uploaded_file($_FILES["produto_imagem"]["temp_name"],"img/".$_FILES["produto_imagem"]["name"]);
			}
			
			$query = "INSERT INTO insert_into_image
						(
							produto_imagem,
							image
						)
						values(
							'$this->produto_imagem',
							'$image'
						)";
						if(mysql_query($query))
						{
							echo "<script language='javascript' type='text/javascript'>
									alert('Image Upload');
									</script>";
						}
						else
						{
							echo"<script language='javascript' type='text/javascript'>
									alert('Image not Upload');
									</script>";
						}
					}
		
				}
		}
?>


