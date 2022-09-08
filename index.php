<?php

//Read the JSON file
$randomKey = file_get_contents('randomKey.json');
//Initialize the variable
$found = false;
//Convert JSON string into the array
$decoded_json = json_decode($randomKey, true);

//Read the search value from the URL
if(isset($_GET['s']))
$search_product = $_GET['s'];
else
{
echo"Nothing to search";
exit;
}

//Iterate the JSON value and search the brand
foreach($decoded_jsonas$k =>$v) {
$brand = $decoded_json[$k]["brand"];
if($brand == $search_product)
    {
$name = $decoded_json[$k]["name"];
$model = $decoded_json[$k]["model"];
$price = $decoded_json[$k]["price"];
$found = true;
echo"Product Name: $name<br />Brand: $brand<br />Model: $model<br />Price: $price";
    }
}
//Print message if the search value not found
if($found == false)
echo"Product does not exist.";

?>
