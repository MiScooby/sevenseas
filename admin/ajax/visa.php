<?php
include('../../connection/config.php');

if (isset($_POST['formType']) && $_POST['formType'] == "DocUploadType") {
    $reqId = $_POST['reqId'];
    $docName  =  mysqli_real_escape_string($con, $_POST['docName']);
    $docImage  = $_FILES['docImage'];

    $FileExt = explode('.', $docImage['name'])[1];
    $FileExtName = 'doc' . $nameKeyTok . '.' . $FileExt;



    $insertCatQuery = mysqli_query($con, "INSERT INTO `documents`(`req_id`, `doc_file`, `doc_name`) VALUES ('$reqId','$FileExtName','$docName')");

    if ($insertCatQuery) {

        move_uploaded_file($docImage['tmp_name'], "../../visa_document/" . $FileExtName);

        $data['status'] = true;
        $data['message'] = 'Document Inserted Successfully..';
    } else {
        $data['status'] = false;
        $data['message'] = 'Error Occur in Document..';
    }
}

if (isset($_POST['formType']) && $_POST['formType'] == "AddPayment") {
    $reqId = $_POST['reqId'];
    $PayAmount  =  mysqli_real_escape_string($con, $_POST['PayAmount']);

    $checkAmoutnAx = mysqli_query($con, "SELECT * FROM `payment_req` WHERE `req_id`='$reqId' ");
    $checkAmoutnCount = mysqli_num_rows($checkAmoutnAx);

    if ($checkAmoutnCount > 0) {
        $insertCatQuery = mysqli_query($con, "UPDATE `payment_req` SET  `amount`='$PayAmount' WHERE `req_id`='$reqId'");

        if ($insertCatQuery) {
            $data['status'] = true;
            $data['message'] = 'Payment Added Successfully..';
        } else {
            $data['status'] = false;
            $data['message'] = 'Error Occur in Payment..';
        }
    } else {
        $insertCatQuery = mysqli_query($con, "INSERT INTO `payment_req`(`req_id`, `amount`) VALUES ('$reqId','$PayAmount')");

        if ($insertCatQuery) {
            $data['status'] = true;
            $data['message'] = 'Payment Added Successfully..';
        } else {
            $data['status'] = false;
            $data['message'] = 'Error Occur in Payment..';
        }
    }
}


echo json_encode($data);
