<html>
<head>
<title>Time Report</title>
  <meta http-equiv="Content-Type" content="text/html; charset=tis-620">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
</head>
<body>
<?php
$objConnect = mssql_connect("localhost","sa","Adminchul@book1") or die("Error Connect to Database");
$objDB = mssql_select_db("Attend");
$strSQL = "SELECT  a.badgenumber,a.Name,b.CHECKTIME,c.MachineAlias from  USERINFO a, CHECKINOUT b, Machines c 
                   where a.USERID = b.USERID and b.SENSORID = c.ID  
				   and a.badgenumber  LIKE $badgenumber order by b.CHECKTIME;  ";
$objQuery = mssql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
<table width="600" border="1">
  <tr>
    <th width="80"> <div align="center">User id </div></th>
    <th width="200"> <div align="center">Name</div></th>
    <th width="80"> <div align="center">Time</div></th>
	<th width="120"> <div align="center">Machine</div></th>
  </tr>
<?php
while($objResult = mssql_fetch_array($objQuery))
{
?>
  <tr>
    <td><div align="center"><?php echo $objResult["badgenumber"];?></div></td>
    <td><?php echo $objResult["Name"];?></td>
    <td><?php echo $objResult["CHECKTIME"];?></td>
    <td><?php echo $objResult["MachineAlias"];?></td>	
  </tr>
<?php
}
?>
</table>
<?php
mssql_close($objConnect);
?>
</body>
</html>
