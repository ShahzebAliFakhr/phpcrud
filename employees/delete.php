<?php

$id = $_GET['id'];
include('../cruds.php');
delete('employees', array('e_id' => $id));
header('location:../');

?>