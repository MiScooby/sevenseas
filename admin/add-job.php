<?php include('includes/header.php');
$JobTag = mysqli_query($con, "SELECT * FROM `job_skills`");
?>
<link rel="stylesheet" href="assets/css/inner.css">


<div class="row justify-content-center">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">

        <h6 class="card-title">Add New Job</h6>
        <div id="loader" style="display: none;">
          <div class="lds-dual-ring">
            <div class="overlay">
            </div>
          </div>
        </div>
        <form action="javascript:;" id="AddJobForms" method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label class="form-label">Job Title <span>*</span> : </label>
            <input class="form-control form-control-lg" type="text" placeholder="Enter Job Title" name="Jobname" required="">
            <div class="invalid-feedback" style="display: block;"></div>
          </div>

          <div class="mb-3">
            <label class="form-label">Job Experience Level <span>*</span> : </label>
            <div class="input-field">
              <select class="js-example-basic-single form-select ct" name="JobExperience" data-width="100%" required>
                <option></option>
                <option value="Internship">Internship</option>
                <option value="Entry level">Entry level ( Fresher )</option>
                <option value="Associate">Associate ( 0 - 1 yrs exp )</option>
                <option value="Executive">Executive ( 2 - 5 yrs exp )</option>
              </select>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Job Type <span>*</span> : </label>
            <div class="input-field">
              <select class="js-example-basic-single form-select ct" name="JobType" data-width="100%" required>
                <option></option>
                <option value="Hybird">Hybird</option>
                <option value="on-site">On Site</option>
                <option value="Remote">Remote</option>
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
                ?>
                  <option value="<?= $JobTagR['skill_name'] ?>"><?= $JobTagR['skill_name'] ?></option>
                <?php
                }
                ?>

              </select>
            </div>

          </div>

          <div class="mb-4">
            <label class="form-label">Job Description <span>*</span> : </label>
            <textarea id="myDesc_two" name="JobDesc" class="editor"></textarea>
          </div>



          <div>
            <input type="hidden" id="formType" name="formType" value="addJobtype">
            <button class="btn btn-primary" type="submit" name="addJob" id="addJob">Add Job</button>
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