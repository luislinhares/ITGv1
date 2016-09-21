<?
include("dbconfig.php");
    if (isset($_FILES['produto_imagem']) && $_FILES['image']['size'] > 0) { 
  $tmpName  = $_FILES['produto_imagem']['tmp_name'];  

  $fp = fopen($tmpName, 'r');
  $data = fread($fp, filesize($tmpName));
  $data = addslashes($data);
  fclose($fp);


  $query = "INSERT INTO produtos ";
  $query .= "(emp_img) VALUES ('$data')";
  $results = mysql_query($query, $link) or die(mysql_error());

  print "Success";

  }
  else {
  print "Error";
  }
  ?>
