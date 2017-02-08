<!DOCTYPE html>
<html>
<head>
	<title>List of Employees</title>
	<link rel="stylesheet" type="text/css" href="DIST/css/bootstrap.css">
</head>
<body>
	<?php 
		$conn = oci_connect('hr', 'hr', '//localhost/XE');
		do_query($conn,'SELECT * FROM EMPLOYEES');
		function do_query($conn, $query) {
  	$stid = oci_parse($conn,$query);
  	$r = oci_execute($stid,OCI_DEFAULT);
  
  print '<table class="table table-striped table-hover">';
  while($row = oci_fetch_array($stid,OCI_ASSOC+OCI_RETURN_NULLS)) {
    print '<tr class="info">';
    foreach ($row as $item) {
      print '<td>'.
        ($item ?htmlentities($item):'&nbsp;').'</td>';
    }
    print '</tr>';
  }
  print '</table>';
}
	 ?>
</body>
</html>