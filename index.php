<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUDS</title>

    <!-- CSS FILES -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/fontawesome.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/main.css" rel="stylesheet" type="text/css">

</head>
<body>

<?php

include('cruds.php');
$e_id = $e_name = $e_phone = $e_address = $e_cnic = $e_last_qualification = $e_salary = $e_image = "";

if(isset($_GET['id'])){
    $get_employee_data = selectbyID('employees', array('e_id' => $_GET['id']));
    foreach ($get_employee_data as $key => $value) {
        $e_id = $value['e_id'];
        $e_name = $value['e_name'];
        $e_phone = $value['e_phone'];
        $e_address = $value['e_address'];
        $e_cnic = $value['e_cnic'];
        $e_last_qualification = $value['e_last_qualification'];
        $e_salary = $value['e_salary'];
        $e_image = $value['e_image'];
    }
    $action = "update.php";
    $page = "EDIT EMPLOYEE";
    $submit_button = "SAVE EDITS";
}else{
    $action = "insert.php";
    $page = "ADD EMPLOYEE";
    $submit_button = "ADD EMPLOYEE";
}
?>

    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="col-md-6 card p-3">
                <h2 class="text-success"><?=$page?></h2>
                <form action="employees/<?=$action?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" class="form-control" value="<?=$e_id?>" name="e_id">
                        <input type="text" class="form-control" value="<?=$e_name?>" name="e_name" placeholder="Employee Name" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" value="<?=$e_phone?>" name="e_phone" placeholder="Employee Phone" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" value="<?=$e_address?>" name="e_address" placeholder="Employee Address" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" value="<?=$e_cnic?>" name="e_cnic" placeholder="Employee CNIC" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" value="<?=$e_last_qualification?>" name="e_last_qualification" placeholder="Employee Last Qualification" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" value="<?=$e_salary?>" name="e_salary" placeholder="Employee Salary" required>
                    </div>
                    <div class="form-group">
                        <input type="file" name="e_image">
                        <input type="hidden" name="e_image_url" value="<?=$e_image?>">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="e_submit" class="btn btn-success btn-block" value="<?=$submit_button?>">
                    </div>
                </form>
            </div>
            <div class="col-md-6 p-3">
                <h2 class="text-success">EMPLOYEES LIST</h2>
                <table class="table table-sm text-center table-bordered table-hover table-striped">
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>PHONE</th>
                        <th>ACTIONS</th>
                    </tr>
                    
                        <?php
                            $all_employees = selectAll('employees');
                            foreach ($all_employees as $value) { ?>
                                <tr>
                                <td><?=$value['e_id']?></td>
                                <td><?=$value['e_name']?></td>
                                <td><?=$value['e_phone']?></td>
                                <td>
                                    <a href="./?id=<?=$value['e_id']?>" class="badge badge-info">Edit</a>
                                    <a href="employees/view.php?id=<?=$value['e_id']?>" class="badge badge-success">View</a>
                                    <a href="employees/delete.php?id=<?=$value['e_id']?>" class="badge badge-danger">Delete</a>
                                </td>
                                </tr>
                            <?php } ?>
                </table>
            </div>
        </div>
    </div>

    <!-- JS FILES -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>