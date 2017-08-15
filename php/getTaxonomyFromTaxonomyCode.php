<?php
include('mysqli.php');

$txresult = $connect->query("Select * From tbl_taxonomy Where taxonomy_code = '" . $taxonomyCode . "'");

if ($txresult->num_rows > 0) {
	while($taxrow = $txresult->fetch_assoc()) {
		echo " - ".$taxrow['taxonomy_description'];
	}
}
