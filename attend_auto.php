<html>
<head>
<title>Attend_Auto</title>
</head>
<body>
<?php
$objConnect = mssql_connect("localhost","sa","Adminchul@book1") or die("Error Connect to Database");
$objDB = mssql_select_db("Attend");
$strSQL = "INSERT INTO TIME ";
$strSQL .="(DATE,TIME) ";
$strSQL .="VALUES ";
$strSQL .="('$new_date','$new_time')";
$objQuery = mssql_query($strSQL);
if($objQuery)
{
	echo "Save Done.";
}
else
{
	echo "Error Save [".$strSQL."]";
}
mssql_close($objConnect);
?>
</body>
</html>