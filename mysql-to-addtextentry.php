<?php
header('Content-Type:text/plain');
?>
function AddTextEntry(key, value)
	Citizen.InvokeNative(GetHashKey("ADD_TEXT_ENTRY"), key, value)
end

Citizen.CreateThread(function()
<?php
try {
    $db = new PDO("mysql:host=127.0.0.1;dbname=essentialmode", "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	echo "Connection failed: " . $e->getMessage();
}

$vehicles = $db->query('SELECT * FROM `vehicles` ORDER BY `vehicles`.`category` ASC'); //what you want order

while ($cars = $vehicles->fetch())
{
	$stmt = $db->prepare('SELECT * FROM vehicle_categories WHERE name = :category');
	$stmt->execute(['category' => $cars["category"]]);
	$marque = $stmt->fetch();

	echo "	AddTextEntry('".$cars["model"]."', '".$marque["label"] . " " . $cars["name"]."')\n";

}

?>
end)
