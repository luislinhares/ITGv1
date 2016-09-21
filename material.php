

<?php
/* Database connection start */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db1042849_registos";

//$servername = "10.162.213.148";
//$username = "u1042849_admin";
//$password = "Itoolgest@12345";
//$dbname = "db1042849_Registos";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 => 'id',
	1 =>'referencia', 
	2 => 'nome_produto',
	3 => 'preco_produto',
	5 => 'preco_produto_iva',
	4 => 'produto_stock',
	5 => 'produto_imagem'
	
);

// getting total number records without any search
$sql = "SELECT id, referencia, nome_produto, preco_produto, preco_produto_iva, produto_stock, produto_imagem ";
$sql.=" FROM produtos";
$query=mysqli_query($conn, $sql) or die("material.php: get produtos");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = "SELECT id, referencia, nome_produto, preco_produto, produto_stock, produto_imagem";
$sql.=" FROM produtos WHERE 1=1";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( nome_produto LIKE '".$requestData['search']['value']."%' ";    
	
	// PROCURAR NO SEARCH...
	$sql.=" OR referencia LIKE '".$requestData['search']['value']."%' ";

	$sql.=" OR produto_stock LIKE '".$requestData['search']['value']."%' )";
}
$query=mysqli_query($conn, $sql) or die("material.php: get produtos");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($conn, $sql) or die("material.php: get produtos");

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 
	
	$nestedData[] = $row["id"];
	$nestedData[] = $row["nome_produto"];
	$nestedData[] = $row["preco_produto"];
	$nestedData[] = $row["preco_produto_iva"];
	$nestedData[] = $row["produto_imagem"];
	$nestedData[] = $row["produto_stock"];
	$nestedData[] = $row["referencia"];

	


	$data[] = $nestedData;
}



$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>
