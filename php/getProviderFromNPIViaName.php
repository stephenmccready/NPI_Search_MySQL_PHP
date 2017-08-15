<?php
include('mysqli.php');
if($_GET['type']=="1")	{	// Individual
	$personName=explode(",",$_GET['name']);
	if(count($personName)>1)	{
		$q = "Select * From tbl_NPI Where Entity_Type_Code='".$_GET['type']."' And Prov_Last_Name_Legal_Name Like '".$personName[0]."%'";
	} else {
		$q = "Select * From tbl_NPI Where Entity_Type_Code='".$_GET['type']."' And Prov_Last_Name_Legal_Name Like '".$personName[0]."%'";
		$q.= " and Prov_First_Name Like '".$personName[1]."%'";
	}
} else {			// Organization
	$q = "Select * From tbl_NPI Where Entity_Type_Code='".$_GET['type']."' And Prov_Org_Name_Legal_Bus_Name Like '".$_GET['name']."%'";
}

$result = $connect->query($q);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		include('dispNPIData.php');
	}
} else {
	echo "No providers found with criteria:<br /><br />";
	echo "Name: ".$_GET['name']."<br />Type:".$_GET['type']."<br />State:".$_GET['location'];
}
