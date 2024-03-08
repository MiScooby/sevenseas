<?php include('../../connection/config.php');

if (isset($_POST['formType']) && $_POST['formType'] == "EditPageSeo") {
    $metaTitle = mysqli_real_escape_string($con, $_POST['metaTitle']);
    $metaDesc = mysqli_real_escape_string($con, $_POST['metaDesc']);
    $metaKeyword = mysqli_real_escape_string($con, $_POST['metaKeyword']);
    $PageId = $_POST['PageId'];  
    $upPageData  = "UPDATE `website_pages` SET `page_title`='$metaTitle',`page_desc`='$metaDesc',`page_keyword`='$metaKeyword' WHERE `id`='$PageId '"; 
    $upPageDatar = mysqli_query($con, $upPageData);

    if ($upPageDatar) { 
        $data['status'] = true;
        $data['message'] = 'Page Meta Content Updated Successfully..';
    } else {
        $data['status'] = false;
        $data['message'] = 'Error Occur in Page Meta Content..';
    }
}
echo json_encode($data);
