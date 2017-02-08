<!DOCTYPE html>
<html>
<head>
	<title>List of Employees</title>
	<link rel = "stylesheet" type ="text/css" href="DIST/css/bootstrap.css">
</head>
<body>
	<?php
			$conn = oci_connect('hr','hr','//localhost/XE');
			
			function do_query($conn,$query){
				$stid = oci_parse($conn,$query);
				$r=oci_execute($stid, OCI_DEFAULT);

				print '<table border="1">';
				while($row = oci_fetch_array($stid,OCI_ASSOC+OCI_RETURN_NULLS)){
					print'<tr>';
					foreach($row as $item){
						($item ?htmlentities($item):'&nbsp;').'</td>';
					}
					print '</tr>';
				}
				print '</table>';
			}

	?>

</body>
</html>