<?php include('../connection/config.php');
require_once '../emailer/mail.class.php';

if (isset($_POST['formType']) && $_POST['formType'] == "visaApplyForm") {
    $form_name  =  mysqli_real_escape_string($con, $_POST['form_name']);
    $form_email  =  mysqli_real_escape_string($con, $_POST['form_email']);
    $form_phone  =  mysqli_real_escape_string($con, $_POST['form_phone']);
    $country  =  mysqli_real_escape_string($con, $_POST['country']);
    $user  =  mysqli_real_escape_string($con, $_POST['user']);
    $form_passport  = $_FILES['form_passport'];

    $FileExt = explode('.', $form_passport['name'])[1];
    $FileExtName = 'pp_' . $nameKeyTok . '.' . $FileExt;

    $Visa  = '1234567890' . round(microtime(true));
    $VisaTok = 'SSVRI' . substr(str_shuffle($Visa), 0, 6);

    $insertCatQuery = mysqli_query($con, "INSERT INTO `applied_visa`( `service_id`, `user_id`, `country_code`, `name`, `email`, `mobile`, `passport`) VALUES ('$VisaTok','$user','$country','$form_name','$form_email','$form_phone','$FileExtName')");

    if ($insertCatQuery) {
        move_uploaded_file($form_passport['tmp_name'], "../passport_data/" . $FileExtName);
        $data['status'] = true;
        $data['message'] = 'Applied Successfully..';

        include '../emailer_html/visa/request.php';
        $client_title = "Visa Applied Notification - Seven Seas";
        $client_subject = "Visa Applied Notification - Seven Seas";
        $client = new HttpMail($apEmail);
        $client->send($client_title, $client_subject, $clientmessage);
    } else {
        $data['status'] = false;
        $data['message'] = 'Error Occur..';
    }
}
if (isset($_POST['formType']) && $_POST['formType'] == "payment_check_form") {
    $reqId = $_POST['reqId'];
    $reqEmail = $_POST['reqEmail'];
    $Getdata = mysqli_query($con, "SELECT pr.* FROM payment_req pr, applied_visa av WHERE av.service_id=pr.req_id AND av.email='$reqEmail' AND pr.req_id='$reqId'");
    $GetdataCount =  mysqli_num_rows($Getdata);
    if ($GetdataCount > 0) {
        $data['status'] = true;
        $data['url'] = 'checkout.php?id=' . $reqId . '&sts=true';
        $data['message'] = 'Success..';
    } else {
        $data['status'] = false;
        $data['message'] = 'Data Not Found..';
    }
}



echo json_encode($data);
