
	

<?php
foreach ($results as $data) {
echo  "<label> Name</label> "  . $data->name 
. "<label> Quantity </label>" . $data->quantity 
. "<label> Price </label>" .  $data->price 
. "<label> Description </label> " .  $data->description 
. "<label> Details </label> " .  $data->details 
. "<label> Image </label> " .  $data->image ;
}

echo $links;
?>