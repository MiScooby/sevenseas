<?php
include('../../connection/config.php');
 
 
if (isset($_POST['gallerytype']) && $_POST['gallerytype'] == "addgallery") {

    $gallery_tag = $_POST['gallery_tag'];
    $galleryImg = $_FILES['galleryImg'];
    $FileExt = explode('.', $galleryImg['name'])[1];
    $FileExtName = 'gallery_' . round(microtime(true)) . '.' . $FileExt;
    $FileExtName2 = 'galleryCo_' . round(microtime(true)) . '.' . $FileExt; 
    $addGalleryQ = mysqli_query($con, "INSERT INTO `gallery_media`( `gallery_tag`, `gallery_img`) VALUES ('$gallery_tag','$FileExtName')");
    if ($addGalleryQ) {
        move_uploaded_file($galleryImg['tmp_name'], "../../media/gallery_media/" . $FileExtName);
        $data['url'] = 'view-gallery.php';
        $data['message'] = 'Gallery Added Successfully';
        $data['status'] = true;
    }
}

if (isset($_POST['type']) && $_POST['type'] == "glr_dlt") {
    $glId = $_POST['glId'];

    $DltGalleryQ = mysqli_query($con, "UPDATE `gallery_media` SET `trash`='1'  WHERE `id`='$glId' ");
    if ($DltGalleryQ) {

        $data['message'] = 'Gallery Deleted Successfully';
        $data['status'] = true;
    }
}

echo json_encode($data);
