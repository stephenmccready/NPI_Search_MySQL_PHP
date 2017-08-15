<?PHP
	echo "<div class='npiName'>".$row['NPI']."&nbsp;";
	
	if($row['Entity_Type_Code']=='1')
	{
		echo $row['Prov_Name_Prefix_Text']." ".$row['Prov_First_Name']." ".$row['Prov_Middle_Name']." ".$row['Prov_Last_Name_Legal_Name']
			." ".$row['Prov_Name_Suffix_Text']." ".$row['Prov_Credential_Text']."&nbsp;&nbsp;";
		switch ($row['Prov_Gender_Code'])
		{
			case "F":
				echo "Female";
				break;
			case "M":
				echo "Male";
				break;
		}
		if($row['Is_Sole_Prop'] == "Y")
		{
			echo " , Sole Proprietor";
		}
		echo "<br />";
	}
	else
	{
		echo $row['Prov_Org_Name_Legal_Bus_Name'];
		if($row['Is_Org_SubPart'] == "Y")
		{
			echo " (Organization Subpart)";
		}
		echo "<br />";
	}

	echo "</div>";

	if($row['Parent_Org_LBN'] != "")
	{
		echo 'Parent Organization: '.$row['Parent_Org_LBN'];
		echo '&nbsp;&nbsp;TIN: '.$row['Parent_Org_TIN'];
		echo '<br />';
	}
		
	switch($row['Prov_Oth_Org_Name_Type_Code'])
	{
		case "1":
			echo "Former Name: ";
			break;
		case "2":
			echo "Professional Name: ";
			break;
		case "3":
			echo "Doing Business As: ";
			break;
		case "4":
			echo "Former (Legal Business Name): ";
			break;
		case "5":
			echo "Other Name: ";
			break;
	}
	
	If($row['Prov_Oth_Org_Name'] != "")
	{	echo $row['Prov_Oth_Org_Name']."<br />";	}

	switch($row['Prov_Oth_Last_Name_Type_Code'])
	{
	    case "1":
			echo "Former Name: ";
			break;
		case "2":
			echo "Professional Name: ";
			break;
		case "3":
			echo "Doing Busisness As: ";
			break;
		case "4":
			echo "Former (Legal Business Name): ";
			break;
		case "5":
			echo "Other Name: ";
			break;
	}
	
	If($row['Prov_Oth_Last_Name'] != "")
	{
		echo $row['Prov_Oth_Name_Prefix_Text']." ".$row['Prov_Oth_First_Name']." ".$row['Prov_Oth_Middle_Name']." ".$row['Prov_Oth_Last_Name']
			." ".$row['Prov_Oth_Name_Suffix_Text']." ".$row['Prov_Oth_Credential_Text']."<br />";
	}
		
	If($row['Auth_Official_Last_Name'] != "")
	{
		echo "Authorized Official: ".$row['Auth_Official_Name_Prefix']." ".$row['Auth_Official_First_Name']." ".$row['Auth_Official_Middle_Name']." ".$row['Auth_Official_Last_Name']
			." ".$row['Auth_Official_Name_Suffix'].", ".$row['Auth_Official_Title_or_Position']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ph: ";
		if($row['Auth_Official_Telephone_Num']!="")	{
			echo "(".substr($row['Auth_Official_Telephone_Num'],0,3).") "
			.substr($row['Auth_Official_Telephone_Num'],4,3)." ".substr($row['Auth_Official_Telephone_Num'],6,4)."<br />";
		}
}
	
	If($row['Replacement_NPI'] != "")
	{	echo "Replacement_NPI:".$row['Replacement_NPI']."<br />";	}

	switch($row['NPI_Deactivation_Reason_Code'])
	{
	     case "DT":
			echo "Deactivated on ".$row['NPI_Deactivation_Date']." due to Death";
			break;
		case "DB":
			echo "Deactivated on ".$row['NPI_Deactivation_Date']." due to Disbandment";
			break;
		case "FR":
			echo "Deactivated on ".$row['NPI_Deactivation_Date']." due to Fraud";
			break;
		case "OT":
			echo "Deactivated on ".$row['NPI_Deactivation_Date']." due to Other";
			break;
	}
	
	If($row['NPI_Reactivation_Date'] != "")
	{	echo "NPI Reactivated on ".$row['NPI_Reactivation_Date']."<br />";	}

//_EIN_NOT_POPULATED_AS_OF_7/31/2014
//	If($row['Employer_Identification_Number_(EIN)'] !== '')
//	{	echo "EIN: ".$row['Employer_Identification_Number_(EIN)']."<br />";	}
	
	echo "<div class='address'>Mailing:<br />";
	echo "<a href='https://www.google.com/maps/place/".$row['Prov_First_Line_Bus_Mailing_Addr']
		."+".$row['Prov_Bus_Mailing_Addr_City']
		."+".$row['Prov_Bus_Mailing_Addr_State']
		."+".substr($row['Prov_Bus_Mailing_Addr_Postal_Code'],0,5)."-".substr($row['Prov_Bus_Mailing_Addr_Postal_Code'],5,4)
		."' target='_blank'>";
	echo $row['Prov_First_Line_Bus_Mailing_Addr']." ";
	echo $row['Prov_Second_Line_Bus_Mailing_Addr']."<br />";
	echo $row['Prov_Bus_Mailing_Addr_City'].", ";
	echo $row['Prov_Bus_Mailing_Addr_State']."  ";
	echo substr($row['Prov_Bus_Mailing_Addr_Postal_Code'],0,5);
	if(strlen($row['Prov_Bus_Mailing_Addr_Postal_Code'])>5) {
		echo "-".substr($row['Prov_Bus_Mailing_Addr_Postal_Code'],5,4);
	}
	echo "</a><br />";
	if($row['Prov_Bus_Mailing_Addr_Telephone_Num']!=""){
		echo "(".substr($row['Prov_Bus_Mailing_Addr_Telephone_Num'],0,3).") "
			.substr($row['Prov_Bus_Mailing_Addr_Telephone_Num'],4,3)." ".substr($row['Prov_Bus_Mailing_Addr_Telephone_Num'],6,4)."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	}
	if($row['Prov_Bus_Mailing_Addr_Fax_Num']!=""){
		echo "Fax: (".substr($row['Prov_Bus_Mailing_Addr_Fax_Num'],0,3).") "
		.substr($row['Prov_Bus_Mailing_Addr_Fax_Num'],4,3)." ".substr($row['Prov_Bus_Mailing_Addr_Fax_Num'],6,4);
	}
	echo "</div>";

	echo "<div class='address'>Practice:<br />";
	echo "<a href='https://www.google.com/maps/place/".$row['Prov_First_Line_Bus_Prac_Loc_Addr']
		."+".$row['Prov_Bus_Prac_Loc_Addr_City']
		."+".$row['Prov_Bus_Prac_Loc_Addr_State']
		."+".substr($row['Prov_Bus_Prac_Loc_Addr_Postal_Code'],0,5)."-".substr($row['Prov_Bus_Prac_Loc_Addr_Postal_Code'],5,4)
		."' target='_blank'>";
	echo $row['Prov_First_Line_Bus_Prac_Loc_Addr']." ";
	echo $row['Prov_Second_Line_Bus_Prac_Loc_Addr']."<br />";
	echo $row['Prov_Bus_Prac_Loc_Addr_City'].", ";
	echo $row['Prov_Bus_Prac_Loc_Addr_State']."  ";
	echo substr($row['Prov_Bus_Prac_Loc_Addr_Postal_Code'],0,5);
	if(strlen($row['Prov_Bus_Prac_Loc_Addr_Postal_Code'])>5) {
		echo "-".substr($row['Prov_Bus_Prac_Loc_Addr_Postal_Code'],5,4);
	}
	echo "</a><br />";
	echo "(".substr($row['Prov_Bus_Prac_Loc_Addr_Telephone_Num'],0,3).") "
		.substr($row['Prov_Bus_Prac_Loc_Addr_Telephone_Num'],4,3)." ".substr($row['Prov_Bus_Prac_Loc_Addr_Telephone_Num'],6,4)."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "Fax: (".substr($row['Prov_Bus_Prac_Loc_Addr_Fax_Num'],0,3).") "
		.substr($row['Prov_Bus_Prac_Loc_Addr_Fax_Num'],4,3)." ".substr($row['Prov_Bus_Prac_Loc_Addr_Fax_Num'],6,4);
	echo "</div>";

	echo "<div class='dates'>Enumeration_Date: ".$row['Prov_Enumeration_Date']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Last_Updated: ".$row['Last_Update_Date']."</div>";

	echo "<table class='taxonomy'><tr><th>Taxonomy</th><th>License</th><th>State</th><th>Primary Taxonomy?</th></tr>";
	echo "<tr>";
	echo "<td>".$row['HC_Prov_Taxonomy_Code_1'];
		//_Get_Taxonomy_Description
		$taxonomyCode=$row['HC_Prov_Taxonomy_Code_1'];
		include ('getTaxonomyFromTaxonomyCode.php');
	echo "</td>";
	echo "<td>".$row['Prov_Lic_Num_1']."</td>";
	echo "<td>".$row['Prov_Lic_Num_ST_Code_1']."</td>";
	echo "<td>".$row['HC_Prov_Prim_Taxonomy_Switch_1']."</td>";
	echo "</tr>";
	If($row['HC_Prov_Taxonomy_Code_2']!="" || $row['Prov_Lic_Num_2']!="")
	{
		echo "<tr>";
		echo "<td>".$row['HC_Prov_Taxonomy_Code_2'];
			//_Get_Taxonomy_Description
			$taxonomyCode=$row['HC_Prov_Taxonomy_Code_2'];
			include ('getTaxonomyFromTaxonomyCode.php');
		echo "</td>";

		echo "<td>".$row['Prov_Lic_Num_2']."</td>";
		echo "<td>".$row['Prov_Lic_Num_ST_Code_2']."</td>";
		echo "<td>".$row['HC_Prov_Prim_Taxonomy_Switch_2']."</td>";
		echo "</tr>";
	}
	If($row['HC_Prov_Taxonomy_Code_3']!="" || $row['Prov_Lic_Num_3']!="")
	{
		echo "<tr>";
		echo "<td>".$row['HC_Prov_Taxonomy_Code_3'];
			//_Get_Taxonomy_Description
			$taxonomyCode=$row['HC_Prov_Taxonomy_Code_3'];
			include ('getTaxonomyFromTaxonomyCode.php');
		echo "</td>";
		echo "<td>".$row['Prov_Lic_Num_3']."</td>";
		echo "<td>".$row['Prov_Lic_Num_ST_Code_3']."</td>";
		echo "<td>".$row['HC_Prov_Prim_Taxonomy_Switch_3']."</td>";
		echo "</tr>";
	}
	If($row['HC_Prov_Taxonomy_Code_4']!="" || $row['Prov_Lic_Num_4']!="")
	{
		echo "<tr>";
		echo "<td>".$row['HC_Prov_Taxonomy_Code_4'];
			//_Get_Taxonomy_Description
			$taxonomyCode=$row['HC_Prov_Taxonomy_Code_4'];
			include ('getTaxonomyFromTaxonomyCode.php');
		echo "</td>";
		echo "<td>".$row['Prov_Lic_Num_4']."</td>";
		echo "<td>".$row['Prov_Lic_Num_ST_Code_4']."</td>";
		echo "<td>".$row['HC_Prov_Prim_Taxonomy_Switch_4']."</td>";
		echo "</tr>";
	}
	If($row['HC_Prov_Taxonomy_Code_5']!="" || $row['Prov_Lic_Num_5']!="")
	{
		echo "<tr>";
		echo "<td>".$row['HC_Prov_Taxonomy_Code_5'];
			//_Get_Taxonomy_Description
			$taxonomyCode=$row['HC_Prov_Taxonomy_Code_5'];
			include ('getTaxonomyFromTaxonomyCode.php');
		echo "</td>";
		echo "<td>".$row['Prov_Lic_Num_5']."</td>";
		echo "<td>".$row['Prov_Lic_Num_ST_Code_5']."</td>";
		echo "<td>".$row['HC_Prov_Prim_Taxonomy_Switch_5']."</td>";
		echo "</tr>";
	}
	If($row['HC_Prov_Taxonomy_Code_6']!="" || $row['Prov_Lic_Num_6']!="")
	{
		echo "<tr>";
		echo "<td>".$row['HC_Prov_Taxonomy_Code_6'];
			//_Get_Taxonomy_Description
			$taxonomyCode=$row['HC_Prov_Taxonomy_Code_6'];
			include ('getTaxonomyFromTaxonomyCode.php');
		echo "</td>";
		echo "<td>".$row['Prov_Lic_Num_6']."</td>";
		echo "<td>".$row['Prov_Lic_Num_ST_Code_6']."</td>";
		echo "<td>".$row['HC_Prov_Prim_Taxonomy_Switch_6']."</td>";
		echo "</tr>";
	}
	If($row['HC_Prov_Taxonomy_Code_7']!="" || $row['Prov_Lic_Num_7']!="")
	{
		echo "<tr>";
		echo "<td>".$row['HC_Prov_Taxonomy_Code_7'];
			//_Get_Taxonomy_Description
			$taxonomyCode=$row['HC_Prov_Taxonomy_Code_7'];
			include ('getTaxonomyFromTaxonomyCode.php');
		echo "</td>";
		echo "<td>".$row['Prov_Lic_Num_7']."</td>";
		echo "<td>".$row['Prov_Lic_Num_ST_Code_7']."</td>";
		echo "<td>".$row['HC_Prov_Prim_Taxonomy_Switch_7']."</td>";
		echo "</tr>";
	}
	If($row['HC_Prov_Taxonomy_Code_8']!="" || $row['Prov_Lic_Num_8']!="")
	{
		echo "<tr>";
		echo "<td>".$row['HC_Prov_Taxonomy_Code_8'];
			//_Get_Taxonomy_Description
			$taxonomyCode=$row['HC_Prov_Taxonomy_Code_8'];
			include ('getTaxonomyFromTaxonomyCode.php');
		echo "</td>";
		echo "<td>".$row['Prov_Lic_Num_8']."</td>";
		echo "<td>".$row['Prov_Lic_Num_ST_Code_8']."</td>";
		echo "<td>".$row['HC_Prov_Prim_Taxonomy_Switch_8']."</td>";
		echo "</tr>";
	}
	If($row['HC_Prov_Taxonomy_Code_9']!="" || $row['Prov_Lic_Num_9']!="")
	{
		echo "<tr>";
		echo "<td>".$row['HC_Prov_Taxonomy_Code_9'];
			//_Get_Taxonomy_Description
			$taxonomyCode=$row['HC_Prov_Taxonomy_Code_9'];
			include ('getTaxonomyFromTaxonomyCode.php');
		echo "</td>";
		echo "<td>".$row['Prov_Lic_Num_9']."</td>";
		echo "<td>".$row['Prov_Lic_Num_ST_Code_9']."</td>";
		echo "<td>".$row['HC_Prov_Prim_Taxonomy_Switch_9']."</td>";
		echo "</tr>";
	}
	If($row['HC_Prov_Taxonomy_Code_10']!="" || $row['Prov_Lic_Num_10']!="")
	{
		echo "<tr>";
		echo "<td>".$row['HC_Prov_Taxonomy_Code_10'];
			//_Get_Taxonomy_Description
			$taxonomyCode=$row['HC_Prov_Taxonomy_Code_10'];
			include ('getTaxonomyFromTaxonomyCode.php');
		echo "</td>";
		echo "<td>".$row['Prov_Lic_Num_10']."</td>";
		echo "<td>".$row['Prov_Lic_Num_ST_Code_10']."</td>";
		echo "<td>".$row['HC_Prov_Prim_Taxonomy_Switch_10']."</td>";
		echo "</tr>";
	}
	If($row['HC_Prov_Taxonomy_Code_11']!="" || $row['Prov_Lic_Num_11']!="")
	{
		echo "<tr>";
		echo "<td>".$row['HC_Prov_Taxonomy_Code_11'];
			//_Get_Taxonomy_Description
			$taxonomyCode=$row['HC_Prov_Taxonomy_Code_11'];
			include ('getTaxonomyFromTaxonomyCode.php');
		echo "</td>";
		echo "<td>".$row['Prov_Lic_Num_11']."</td>";
		echo "<td>".$row['Prov_Lic_Num_ST_Code_11']."</td>";
		echo "<td>".$row['HC_Prov_Prim_Taxonomy_Switch_11']."</td>";
		echo "</tr>";
	}	If($row['HC_Prov_Taxonomy_Code_12']!="" || $row['Prov_Lic_Num_12']!="")
	{
		echo "<tr>";
		echo "<td>".$row['HC_Prov_Taxonomy_Code_12'];
			//_Get_Taxonomy_Description
			$taxonomyCode=$row['HC_Prov_Taxonomy_Code_12'];
			include ('getTaxonomyFromTaxonomyCode.php');
		echo "</td>";
		echo "<td>".$row['Prov_Lic_Num_12']."</td>";
		echo "<td>".$row['Prov_Lic_Num_ST_Code_12']."</td>";
		echo "<td>".$row['HC_Prov_Prim_Taxonomy_Switch_12']."</td>";
		echo "</tr>";
	}
	If($row['HC_Prov_Taxonomy_Code_13']!="" || $row['Prov_Lic_Num_13']!="")
	{
		echo "<tr>";
		echo "<td>".$row['HC_Prov_Taxonomy_Code_13'];
			//_Get_Taxonomy_Description
			$taxonomyCode=$row['HC_Prov_Taxonomy_Code_13'];
			include ('getTaxonomyFromTaxonomyCode.php');
		echo "</td>";
		echo "<td>".$row['Prov_Lic_Num_13']."</td>";
		echo "<td>".$row['Prov_Lic_Num_ST_Code_13']."</td>";
		echo "<td>".$row['HC_Prov_Prim_Taxonomy_Switch_13']."</td>";
		echo "</tr>";
	}
	If($row['HC_Prov_Taxonomy_Code_14']!="" || $row['Prov_Lic_Num_14']!="")
	{
		echo "<tr>";
		echo "<td>".$row['HC_Prov_Taxonomy_Code_14'];
			//_Get_Taxonomy_Description
			$taxonomyCode=$row['HC_Prov_Taxonomy_Code_14'];
			include ('getTaxonomyFromTaxonomyCode.php');
		echo "</td>";
		echo "<td>".$row['Prov_Lic_Num_14']."</td>";
		echo "<td>".$row['Prov_Lic_Num_ST_Code_14']."</td>";
		echo "<td>".$row['HC_Prov_Prim_Taxonomy_Switch_14']."</td>";
		echo "</tr>";
	}
	If($row['HC_Prov_Taxonomy_Code_15']!="" || $row['Prov_Lic_Num_15']!="")
	{
		echo "<tr>";
		echo "<td>".$row['HC_Prov_Taxonomy_Code_15'];
			//_Get_Taxonomy_Description
			$taxonomyCode=$row['HC_Prov_Taxonomy_Code_15'];
			include ('getTaxonomyFromTaxonomyCode.php');
		echo "</td>";
		echo "<td>".$row['Prov_Lic_Num_15']."</td>";
		echo "<td>".$row['Prov_Lic_Num_ST_Code_15']."</td>";
		echo "<td>".$row['HC_Prov_Prim_Taxonomy_Switch_15']."</td>";
		echo "</tr>";
	}
	echo "</table>";
	echo "<table class='otherID'><tr><th>Other Prov Identifier</th><th>Type Code</th><th>State</th><th>Issuer</th></tr>";
	If($row['Oth_Prov_ID_1']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_1'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_1'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_1']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_1']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_1']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_2']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_2'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_2'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_2']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_2']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_2']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_3']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_3'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_3'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_3']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_3']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_3']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_4']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_4'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_4'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_4']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_4']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_4']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_5']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_5'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_5'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_5']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_5']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_5']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_6']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_6'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_6'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_6']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_6']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_6']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_7']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_7'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_7'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_7']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_7']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_7']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_8']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_8'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_8'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_8']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_8']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_8']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_9']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_9'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_9'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_9']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_9']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_9']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_10']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_10'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_10'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_10']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_10']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_10']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_11']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_11'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_11'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_11']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_11']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_11']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_12']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_12'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_2'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_12']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_12']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_12']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_13']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_13'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_13'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_13']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_13']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_13']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_14']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_14'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_14'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_14']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_14']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_14']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_15']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_15'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_15'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_15']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_15']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_15']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_16']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_16'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_16'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_16']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_16']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_16']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_17']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_17'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_17'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_17']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_17']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_17']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_18']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_18'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_18'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_18']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_18']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_18']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_19']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_19'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_19'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_19']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_19']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_19']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_20']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_20'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_20'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_20']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_20']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_20']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_21']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_21'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_21'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_21']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_21']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_21']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_22']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_22'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_2'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_22']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_22']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_22']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_23']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_23'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_23'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_23']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_23']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_23']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_24']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_24'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_24'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_24']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_24']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_24']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_25']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_25'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_25'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_25']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_25']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_25']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_26']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_26'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_26'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_26']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_26']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_26']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_27']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_27'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_27'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_27']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_27']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_27']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_28']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_28'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_28'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_28']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_28']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_28']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_29']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_29'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_29'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_29']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_29']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_29']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_30']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_30'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_30'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_30']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_30']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_30']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_31']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_31'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_31'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_31']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_31']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_31']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_32']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_32'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_3'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_32']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_32']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_32']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_33']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_33'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_33'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_33']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_33']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_33']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_34']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_34'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_34'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_34']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_34']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_34']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_35']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_35'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_35'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_35']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_35']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_35']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_36']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_36'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_36'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_36']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_36']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_36']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_37']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_37'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_37'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_37']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_37']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_37']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_38']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_38'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_38'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_38']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_38']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_38']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_39']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_39'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_39'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_39']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_39']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_39']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_40']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_40'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_40'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_40']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_40']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_40']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_41']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_41'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_41'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_41']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_41']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_41']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_42']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_42'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_4'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_42']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_42']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_42']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_43']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_43'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_43'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_43']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_43']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_43']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_44']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_44'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_44'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_44']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_44']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_44']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_45']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_45'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_45'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_45']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_45']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_45']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_46']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_46'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_46'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_46']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_46']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_46']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_47']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_47'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_47'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_47']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_47']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_47']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_48']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_48'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_48'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_48']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_48']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_48']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_49']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_49'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_49'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_49']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_49']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_49']."</td>";
		echo "</tr>";
	}
	If($row['Oth_Prov_ID_50']!="")
	{
		switch($row['Oth_Prov_ID_Type_Code_50'])	{
				case '01': $type='OTHER';_break;
				case '02': $type='MEDICARE UPIN';_break;
				case '04': $type='MEDICARE ID-TYPE_UNSPECIFIED';_break;
				case '05': $type='MEDICAID';_break;
				case '06': $type='MEDICARE OSCAR/CERTIFICATION';_break;
				case '07': $type='MEDICARE NSC';_break;
				case '08': $type='MEDICARE PIN';_break;
				default: $type=$row['Oth_Prov_ID_Type_Code_50'];
		}
		echo "<tr>";
		echo "<td>".$row['Oth_Prov_ID_50']."</td>";
		echo "<td>".$type."</td>";
		echo "<td>".$row['Oth_Prov_ID_ST_50']."</td>";
		echo "<td>".$row['Oth_Prov_ID_Issuer_50']."</td>";
		echo "</tr>";
	}
	echo "</table>";
	echo "<br />";
