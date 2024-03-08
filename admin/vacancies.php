<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="assets/css/inner.css">

<div class="row">
    <div class="col-md-12 justify-content-between  mb-3 stretch-card align-items-center">

        <h5 class="card-title">OUR JOB LIST</h5>
        <div>
            <a href="add-job.php" class="btn btn-primary">Add New Job</a> 
        </div>
    </div>

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <div class="p-3">
                    <table id="" class="SrbdataTable table table-bordered nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>S.NO</th>
                                <th>Job ID</th>
                                <th>Job Title</th>
                                <th>Job Type</th>
                                <th>Job Level</th>
                                <th>Created at</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody class="">
                            <?php
                            $i = "1";
                            while ($jobQData = mysqli_fetch_array($jobQ)) {
                            ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= ucfirst($jobQData['job_token']); ?></td>
                                    <td><a href="view-job.php?<?= $urltoken . $urltoken ?>&&token=<?= $jobQData['job_token']; ?>&&<?= $urltoken . $urltoken ?>"><?= ucfirst($jobQData['job_title']); ?></a></td>
                                    <td><?= ucfirst($jobQData['job_type']); ?></td>
                                    <td><?= ucfirst($jobQData['job_level']); ?></td> 
                                    <td><?= ucfirst($jobQData['ins_date']); ?></td>
                                    <td>
                                        <div class="form-group">
                                            <select   class="form-control ct" data-id="<?= $jobQData['id']; ?>"  >
                                                <option value="active" <?= ($jobQData['status'] == 'active') ? 'selected' : ''; ?>>Active</option>
                                                <option value="inactive" <?= ($jobQData['status'] == 'inactive') ? 'selected' : ''; ?>>Inative</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <?php
                                        if ($jobQData['publish'] == 'not_published') {
                                        ?>
                                            <button type="button" data-token="<?php echo $jobQData['blog_token']; ?>" id="blogPublish" class="btn btn-outline-success px-5 mt-2 rounded-0" name="blogPublish">Publish Blog</button>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="edit-job.php?<?= $urltoken . $urltoken ?>&&token=<?= $jobQData['job_token']; ?>&&<?= $urltoken . $urltoken ?>" class="mx-1 btn btn-primary"><i class="fa fa-md fa-edit"></i> </a>
                                            
                                            <a href="javascript:;" class="mx-1 btn btn-danger" id="jobDltBtn" data-id="<?= $jobQData['id']; ?>"><i class="fa fa-md fa-trash"></i> </a>

                                            <a href="view-job.php?<?= $urltoken . $urltoken ?>&&token=<?= $jobQData['job_token']; ?>&&<?= $urltoken . $urltoken ?>" class="mx-1 btn btn-danger" ><i class="fa fa-md fa-eye"></i> </a>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php
                            };
                            ?>


                        </tbody>

                    </table>

                </div>

            </div>
        </div>
    </div>
</div>



<?php include('includes/footer.php'); ?>
<script src="js/job-action.js"></script>