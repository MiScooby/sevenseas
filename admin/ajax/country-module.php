<?php include('../../connection/config.php');

if (isset($_POST['formType']) && $_POST['formType'] == "addCountyetype") {
    $countyrName  =  mysqli_real_escape_string($con, $_POST['countyrName']);
    $CuntImg  = $_FILES['CuntImg'];

    $FileExt = explode('.', $CuntImg['name'])[1];
    $FileExtName = 'contry' . $nameKeyTok . '.' . $FileExt;
    $FileExtName2 = 'contry' . $nameKeyTok . 'co.' . $FileExt;


    $catCheckCount = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `visa_county` WHERE `country_code`='$countyrName' "));
    if ($catCheckCount == 0) {
        $insertCatQuery = mysqli_query($con, "INSERT INTO `visa_county`( `country_code`, `ico`) VALUES ( '$countyrName', '$FileExtName')");

        if ($insertCatQuery) {
            move_uploaded_file($CuntImg['tmp_name'], "../../media/country_ico/" . $FileExtName);
            $data['status'] = true;
            $data['message'] = 'Country Added Successfully..';
        } else {
            $data['status'] = false;
            $data['message'] = 'Error Occur in Country..';
        }
    } else {
        $data['status'] = false;
        $data['message'] = 'Country Already Exist..';
    }
}

if (isset($_POST['formType']) && $_POST['formType'] == "DltCountry") {
    $contId  = $_POST['contId'];

    $DeleteCatQ = mysqli_query($con, "DELETE FROM `visa_county` WHERE `id`='$contId' ");

    if ($DeleteCatQ) {
        $data['status'] = true;
        $data['message'] = 'Country Delete Successfully..';
    } else {
        $data['status'] = false;
        $data['message'] = 'Error Occur in Country Delete..';
    }
}
echo json_encode($data);
