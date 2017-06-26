<?php
/* Database connection start */
 include("db.php");
/* Database connection end */

// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;

$columns = array( 
    0 =>'id', 
    1 => 'miestas',
    2 =>'veikla',
    3 => 'imone',
    4 => 'imoneskodas',
    5 =>'vadovas', 
    6 => 'adresas',
    7 =>'tel',
    8 => 'email',
    9 => 'web',
    10 => 'ivertinimas_bal',
    11 => 'ivertinimas_sk',
    12 =>'darbuotojai', 
    13 => 'sodra',
    14 =>'apyvarta'
);

// getting total number records without any search
$sql = "SELECT id, miestas, veikla, imone, imoneskodas, vadovas, adresas, tel, email, web, ivertinimas_bal, ivertinimas_sk, darbuotojai, sodra, apyvarta FROM joined";

$query=mysqli_query($conn, $sql) or die("response.php: get items");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = "SELECT id, miestas, veikla, apie, imone, imoneskodas, vadovas, adresas, tel, email, web, ivertinimas_bal, ivertinimas_sk, darbuotojai, sodra, apyvarta";
$sql.=" FROM joined WHERE 1 = 1";



// Slider, numeric

/*if( !empty($requestData['columns'][10]['search']['value']) ){ // ivertinimas balais
    $rangeArray = explode("-",$requestData['columns'][10]['search']['value']);
    $minRange = $rangeArray[0];
    $maxRange = $rangeArray[1];
    $sql.=" AND ( ivertinimas_bal >= '".$minRange."' AND  ivertinimas_bal <= '".$maxRange."' ) ";
}
*/

// Miestas
if( !empty($requestData['columns'][1]['search']['value']) ){ 
    $city = $requestData['columns'][1]['search']['value'];
    $sql.=" AND ( miestas= '".$city."' ) ";
}

// Search
if( !empty($requestData['search']['value']) ) {   
    $sql .=" AND ";
    $sql .=" ( veikla LIKE '".$requestData['search']['value']."%' ";    
    $sql .=" OR apie LIKE '".$requestData['search']['value']."%' ";
    $sql .=" OR imone LIKE '".$requestData['search']['value']."%' ";
    $sql .=" OR imoneskodas LIKE '".$requestData['search']['value']."%' ";
    $sql .=" OR vadovas LIKE '".$requestData['search']['value']."%' ";
    $sql .=" OR adresas LIKE '".$requestData['search']['value']."%' ";
    $sql .=" OR web LIKE '".$requestData['search']['value']."%' )";
}




$query=mysqli_query($conn, $sql) or die("response.php: get items");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result.
    
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";  // adding length

$query=mysqli_query($conn, $sql) or die("response.php: get items");


$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
    $nestedData=array(); 

    $nestedData[] = $row["id"];
    $nestedData[] = $row["miestas"];
    $nestedData[] = $row["veikla"];
    $nestedData[] = $row["imone"];
    $nestedData[] = $row["imoneskodas"];
    $nestedData[] = $row["vadovas"];    
    $nestedData[] = $row["adresas"];
    $nestedData[] = $row["tel"];
    $nestedData[] = $row["email"];
    $nestedData[] = $row["web"];
    $nestedData[] = $row["ivertinimas_bal"];
    $nestedData[] = $row["ivertinimas_sk"];
    $nestedData[] = $row["darbuotojai"];
    $nestedData[] = $row["sodra"];
    $nestedData[] = $row["apyvarta"];


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
