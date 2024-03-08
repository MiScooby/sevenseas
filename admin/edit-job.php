<?php include('includes/header.php');

if (isset($_GET['token'])) {
  $token = $_GET['token'];
  $getJobDe = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM `jobs` WHERE `job_token`='$token'"));
}

$JobTag = mysqli_query($con, "SELECT * FROM `job_skills`");
?>
<link rel="stylesheet" href="assets/css/inner.css">


<div class="row justify-content-center">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">

        <h6 class="card-title">Edit Job</h6>
        <div id="loader" style="display: none;">
          <div class="lds-dual-ring">
            <div class="overlay">
            </div>
          </div>
        </div>
        <form action="javascript:;" id="EditJobForms" method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label class="form-label">Job Title <span>*</span> : </label>
            <input class="form-control form-control-lg" value="<?= $getJobDe['job_title'] ?>" type="text" placeholder="Enter Job Title" name="Jobname" required="">
            <div class="invalid-feedback" style="display: block;"></div>
          </div>

          <div class="mb-3">
            <label class="form-label">Job Experience Level <span>*</span> : </label>
            <div class="input-field">
              <select class="js-example-basic-single form-select ct" name="JobExperience" data-width="100%" required>
                <option></option>
                <option value="Internship" <?= ($getJobDe['job_level'] == "Internship") ? 'selected' : ''; ?>>Internship</option>
                <option value="Entry level" <?= ($getJobDe['job_level'] == "Entry level") ? 'selected' : ''; ?>>Entry level ( Fresher )</option>
                <option value="Associate" <?= ($getJobDe['job_level'] == "Associate") ? 'selected' : ''; ?>>Associate ( 0 - 1 yrs exp )</option>
                <option value="Executive" <?= ($getJobDe['job_level'] == "Executive") ? 'selected' : ''; ?>>Executive ( 2 - 5 yrs exp )</option>
              </select>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Job Type <span>*</span> : </label>
            <div class="input-field">
              <select class="js-example-basic-single form-select ct" name="JobType" data-width="100%" required>
                <option></option>
                <option value="Hybird" <?= ($getJobDe['job_type'] == "Hybird") ? 'selected' : ''; ?>>Hybird</option>
                <option value="on-site" <?= ($getJobDe['job_type'] == "on-site") ? 'selected' : ''; ?>>On Site</option>
                <option value="Remote" <?= ($getJobDe['job_type'] == "Remote") ? 'selected' : ''; ?>>Remote</option>
              </select>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Job Skills <span>*</span> : </label>
            <div class="input-field">
              <select class="form-select tagging2" name="JobKeyword[]" multiple data-width="100%" required>
                <option></option>
                <?php

                while ($JobTagR = mysqli_fetch_array($JobTag)) {

                  $get_tag = explode(",", $getJobDe['job_skills']);
                  $tagSts = "";
                  foreach ($get_tag as $tag) {
                    if ($tag == $JobTagR['skill_name']) {
                      $tagSts = "selected";
                    }
                  }

                ?>
                  <option value="<?= $JobTagR['skill_name'] ?>" <?= $tagSts?>><?= $JobTagR['skill_name'] ?></option>
                <?php
                }
                ?>

              </select>
            </div>

          </div>

          <div class="mb-4">
            <label class="form-label">Job Description <span>*</span> : </label>
            <textarea id="myDesc_two" name="JobDesc" class="editor"><?=$getJobDe['job_desc']?></textarea>
          </div>



          <div>
            <input type="hidden" id="formType" name="formType" value="EditJobtype">
            <input type="hidden" id="jobToken" name="jobToken" value="<?=$getJobDe['job_token']?>">
            <button class="btn btn-primary" type="submit" name="EditJob" id="EditJob">Save Job</button>
          </div>
        </form>

      </div>
    </div>
  </div>

</div>
<style>

</style>
<div id="snackbar"></div>

<?php include('includes/footer.php'); ?>
<script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/super-build/ckeditor.js"></script>
<script src="js/job-action.js"></script>