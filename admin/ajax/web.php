<?php
include('../../connection/config.php');

// main Banners Modules
if (isset($_POST['formType']) && $_POST['formType'] == "ContactInfo") {
    $adrs  = mysqli_real_escape_string($con, $_POST['adrs']);
    $email  = mysqli_real_escape_string($con, $_POST['email']);
    $mobile  = mysqli_real_escape_string($con, $_POST['mob']);
    $tele  = mysqli_real_escape_string($con, $_POST['tele']);
    $infoId = $_POST['infoId'];


    $contactInfoQ = mysqli_query($con, "UPDATE `contact_info` SET  `address`=' $adrs',`email`='$email',`mobile`=' $mobile',`tele`='$tele'  WHERE `id`='$infoId' ");

    if ($contactInfoQ) {
        $data['status'] = true;
        $data['message'] = 'Deatils Submitted Successfully..';
    } else {
        $data['status'] = false;
        $data['message'] = 'Error Occur in Deatils..';
    }
}

// social media 

if (isset($_POST['formType']) && $_POST['formType'] == "sm-sts") { 
    $smid = $_POST['smid'];
    $sts = $_POST['sts'];


    $contactInfoQ = mysqli_query($con, "UPDATE `social_media` SET  `status`='$sts' WHERE `id`='$smid'");

    if ($contactInfoQ) {
        $data['status'] = true;
        $data['message'] = 'Status Chnaged Successfully..';
    } else {
        $data['status'] = false;
        $data['message'] = 'Error Occur in Status..';
    }
}

if (isset($_POST['formType']) && $_POST['formType'] == "UpdateSocialMedia") { 
    $link = $_POST['link'];
    $id = $_POST['id'];


    $contactInfoQ = mysqli_query($con, "UPDATE `social_media` SET  `link`='$link' WHERE `id`='$id'");

    if ($contactInfoQ) {
        $data['status'] = true;
        $data['message'] = 'Social Media Updated Successfully..';
    } else {
        $data['status'] = false;
        $data['message'] = 'Error Occur in Updation..';
    }
}

if (isset($_POST['formType']) && $_POST['formType'] == "dltSM") {  
    $id = $_POST['smid'];
    $contactInfoQ = mysqli_query($con, "UPDATE `social_media` SET  `trash`='1' WHERE `id`='$id'");

    if ($contactInfoQ) {
        $data['status'] = true;
        $data['message'] = 'Social Media Deleted Successfully..';
    } else {
        $data['status'] = false;
        $data['message'] = 'Error Occur in delete..';
    }
}

echo json_encode($data);
