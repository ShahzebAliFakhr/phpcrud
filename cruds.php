<?php

function selectAll($table){
    include('config.php');
    $sql = "SELECT * FROM $table WHERE is_deleted = '0' && status = '0'";
    return $conn->query($sql);
}

function selectbyID($table, $id){
    include('config.php');

    $fields = excludeFields($id);
    $data_submit = excludeData($id);

    $sql = "SELECT * FROM $table WHERE is_deleted = '0' && $fields = $data_submit"; 
    return $conn->query($sql);
}

function insert($table, $data){
    include('config.php');
    
    $fields = excludeFields($data);
    $data_submit = excludeData($data);

    $sql = "INSERT INTO $table($fields)VALUES($data_submit)";
    return $conn->query($sql);
}

function update($table, $data, $id){
    include('config.php');
    $fields = excludeFields($id);
    $data_submit = excludeData($id);
    foreach ($data as $key => $value) {
        $sql = "UPDATE $table SET $key = '$value' WHERE $fields = $data_submit";
        $conn->query($sql);
    }
}

function delete($table, $id){
    include('config.php');

    $fields = excludeFields($id);
    $data_submit = excludeData($id);

    $sql = "UPDATE $table SET is_deleted = '1' WHERE $fields = $data_submit";
    return $conn->query($sql);
}

function excludeFields($data){
    $fields = "";
    foreach ($data as $key => $value) {
        $fields .= $key.", ";
    }
    return  rtrim($fields,', ');
}

function excludeData($data){
    $data_submit = "";
    foreach ($data as $key => $value) {
        $data_submit .= "'".$value."', ";
    }
    return rtrim($data_submit,', ');
}

?>