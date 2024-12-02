<?php
require_once('dbconnection.php');

function get_category($con , $term){	
	$query = "SELECT * FROM tbl_category WHERE category_name LIKE '%".$term."%' ORDER BY category_name ASC";
	$result = mysqli_query($con, $query);	
	$data = mysqli_fetch_all($result,MYSQLI_ASSOC);
	return $data;	
}

if (isset($_GET['term'])) {
	$getCategory = get_category($con, $_GET['term']);
	$categoryList = array();
	foreach($getCategory as $category){
		$categoryList[] = $category['category_name'];
	}
	echo json_encode($categoryList);
}
?>