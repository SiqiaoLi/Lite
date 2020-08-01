<?php
  // establish a database connection to your Oracle database.
  $username = 's3774940';
  $password = 'lsq07558831';
  $servername = 'talsprddb01.int.its.rmit.edu.au';
  $servicename = 'CSAMPR1.ITS.RMIT.EDU.AU';
  $connection = $servername."/".$servicename;

  $conn = oci_connect($username, $password, $connection);

  if(!$conn) {
      $e = oci_error();
      trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
  } else {

  }
 ?>
