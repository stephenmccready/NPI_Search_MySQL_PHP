<?php
include('mysqli.php');

$result = $connect->query("Select * From tbl_NPI Where NPI='" . $_GET['NPI'] . "'");

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		include('dispNPIData.php');
	}
} else {
	echo "No providers found with:<br /><br />";
	echo "NPI: ".$_GET['NPI'];
}
