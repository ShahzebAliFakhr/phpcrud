<?php

        if(isset($_POST['e_submit'])){

            include('../cruds.php');

            if($_FILES['e_image']['size'] != 0){
                $image = $_FILES['e_image']['tmp_name'];
                $filename = "emp-pic-" . date('Y-m-d-H-i') . "-" . basename($_FILES["e_image"]["name"]);
                $db_file = "../assets/img/".$filename;
                move_uploaded_file($image, $db_file);
            }else{
                $filename = htmlspecialchars($_POST['e_image_url']);
            }

            $data = [
                'e_name' => htmlspecialchars($_POST['e_name']),
                'e_phone' => htmlspecialchars($_POST['e_phone']),
                'e_address' => htmlspecialchars($_POST['e_address']),
                'e_cnic' => htmlspecialchars($_POST['e_cnic']),
                'e_image' => htmlspecialchars($filename),
                'e_last_qualification' => htmlspecialchars($_POST['e_last_qualification']),
                'e_salary' => htmlspecialchars($_POST['e_salary'])
            ];

            update('employees', $data, array('e_id' => $_POST['e_id']));
            header('location:../');

        }else{
            header('location:../');
        }

?>