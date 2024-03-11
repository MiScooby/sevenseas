<?php
include('../../connection/config.php');
require_once '../../emailer/mail.class.php';

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
        $apDetail = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM `applied_visa` WHERE `service_id`='$reqId' "));
        $apEmail = $apDetail['email'];
        include '../../emailer_html/visa/document.php';
        $client_title = "Visa Request Notification - Seven Seas";
        $client_subject = "Visa Request Notification - Seven Seas";
        $client = new HttpMail($apEmail);
        $client->send($client_title, $client_subject, $clientmessage);
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
            $apDetail = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM `applied_visa` WHERE `service_id`='$reqId' "));
            $apEmail = $apDetail['email'];
            include '../../emailer_html/visa/payment.php';
            $client_title = "Visa Payment Notification - Seven Seas";
            $client_subject = "Visa Payment Notification - Seven Seas";
            $client = new HttpMail($apEmail);
            $client->send($client_title, $client_subject, $clientmessage);
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


if (isset($_POST['formType']) && $_POST['formType'] == "DltDocs") {
    $docId  = $_POST['docId'];

    $DeleteCatQ = mysqli_query($con, "UPDATE `documents` SET `trash`='1' WHERE `id`='$docId' ");

    if ($DeleteCatQ) {
        $data['status'] = true;
        $data['message'] = 'Document Delete Successfully..';
    } else {
        $data['status'] = false;
        $data['message'] = 'Error Occur in Document Delete..';
    }
}

echo json_encode($data);
