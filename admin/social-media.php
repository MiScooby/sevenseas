<?php include('includes/header.php');
?>
<link rel="stylesheet" href="assets/css/inner.css">

<div class="row justify-content-center">
 
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body p-3">



                <div class="">
                    <table id="" class="SrbdataTable table table-bordered table-striped" style="width: 100%;">
                        <thead class="text-center">
                            <tr>
                                <th>S.NO</th>
                                <th>Social Icon</th>
                                <th>Social Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody class="text-center">
                            <?php
                            $i = 1;
                            $socisl = mysqli_query($con, "SELECT * FROM `social_media` WHERE `trash`='0' ");
                            while ($socislData = mysqli_fetch_array($socisl)) {
                            ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><i class="<?=$socislData['icon']?>" style="font-size: 20px; margin: 0;"></i></td>
                                    <td><?= ucfirst($socislData['social_media']); ?></td>
                                    <td>
                                        <select style="width: 100px;" class="form-control ct sm-sts" data-id="<?= $socislData['id'] ?>">
                                            <option value="active" <?= ($socislData['status'] == 'active') ? 'selected' : ''; ?>>Active</option>
                                            <option value="inactive" <?= ($socislData['status'] == 'inactive') ? 'selected' : ''; ?>>Inactive</option>
                                        </select>
                                    </td>
                                    <td>
                                        <a href="edit-social-media.php?<?= $urltoken ?>&<?= $urltoken ?>&&id=<?= $socislData['id'] ?>&&<?= $urltoken ?>&<?= $urltoken ?>" class="btn btn-primary btn-icon s6">
                                            <i data-feather="edit"></i>
                                        </a>
                                        <a href="javascript:;" id="dltSM" data-id="<?= $socislData['id'] ?>" class="btn btn-danger btn-icon s6">
                                            <i data-feather="trash"></i>
                                        </a>



                                    </td>
                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>

                    </table>

                </div>


            </div>
        </div>
    </div>
</div>



<?php include('includes/footer.php'); ?>
<script src="js/web.js"></script>