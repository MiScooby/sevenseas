<?php include('../../connection/config.php');

// Add Blog Category 

if (isset($_POST['formType']) && $_POST['formType'] == "addRemark") {
    $enquiry_type = $_POST['enquiry_type'];
    $enquiry_id = $_POST['enquiry_id'];
    $remark  =  mysqli_real_escape_string($con, $_POST['remark']);

    $insertRemarkQuery = mysqli_query($con, "INSERT INTO `enqiry_remark`(  `enquiry_id`, `enquiry_type`, `remark`) VALUES ('$enquiry_id','$enquiry_type','$remark')");

    if ($insertRemarkQuery) {

        $data['status'] = true;
        $data['message'] = 'Remark Inserted Successfully..';
         
    } else {
        $data['status'] = false;
        $data['message'] = 'Error Occur in Remark Add..';
    }
}

echo json_encode($data);
