<?php
include('../../connection/config.php');

if (isset($_POST['formType']) && $_POST['formType'] == "addblogCattype") {
    $catName  =  mysqli_real_escape_string($con, $_POST['Categoryname']);
    $catThumb  = $_FILES['CategoryImg'];

    $FileExt = explode('.', $catThumb['name'])[1];
    $FileExtName = 'cat' . $nameKeyTok . '.' . $FileExt;
    $FileExtName2 = 'cat' . $nameKeyTok . 'co.' . $FileExt;


    $catCheckCount = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `blog_category` WHERE `cat_name`='$catName' "));
    if ($catCheckCount == 0) {
        $insertCatQuery = mysqli_query($con, "INSERT INTO `blog_category`( `cat_name`, `cat_thumb`) VALUES ( '$catName', '$FileExtName')");

        if ($insertCatQuery) {

            move_uploaded_file($catThumb['tmp_name'], "../../media/blog/blog_cat/" . $FileExtName);

            $data['status'] = true;
            $data['message'] = 'Blog Category Inserted Successfully..';
        } else {
            $data['status'] = false;
            $data['message'] = 'Error Occur in Category..';
        }
    } else {
        $data['status'] = false;
        $data['message'] = 'Category Already Exist..';
    }
}


echo json_encode($data);
