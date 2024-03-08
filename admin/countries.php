<?php include('includes/header.php');
$countyr = mysqli_query($con, "SELECT * FROM `countries` WHERE `status`='active' ");
?>
<link rel="stylesheet" href="assets/css/inner.css">


<div class="row justify-content-center">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">

        <h6 class="card-title">Add Countries in visa service</h6>
        <div id="loader" style="display: none;">
          <div class="lds-dual-ring">
            <div class="overlay">
            </div>
          </div>
        </div>
        <form action="javascript:;" id="AddCountyForms" method="post" enctype="multipart/form-data">

          <div class="mb-3">
            <label class="form-label">Global Countries<span>*</span> : </label>
            <div class="input-field">
              <select class="js-example-basic-single form-select ct" name="countyrName" data-width="100%" required>
                <option></option>
                <?php

                while ($countyrR = mysqli_fetch_array($countyr)) {
                ?>
                  <option value="<?= $countyrR['country_code'] ?>"><?= $countyrR['country_name'] ?></option>
                <?php
                }
                ?>

              </select>
            </div>

          </div>

          <div class="mb-4">
            <label for="" class="form-label ">Country Image <span>*</span></label>
            <input class="form-control dropFile" type="file" name="CuntImg" onchange="ContImageFunction(this)" id="CuntImg" required="">
            <small class="form-small"> Note : Please upload image size with width between 100px-200px & Height between 100px-200px </small>
          </div>

          <div>
            <input type="hidden" id="formType" name="formType" value="addCountyetype">
            <button class="btn btn-primary" type="submit" name="addCountye" id="addCountye">Add Country</button>
          </div>
        </form>

      </div>
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
                <th>Created at</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody class="">
              <?php
              $i = "1";
              while ($counrtQData = mysqli_fetch_array($counrtQ)) {
              ?>
                <tr>
                  <td><?= $i++ ?></td>
                  <td><?= ucfirst($counrtQData['country_name']); ?></td>
                  <td><img src="../media/country_ico/<?=  $counrtQData['ico']; ?>" alt=""></td>
                  <td><?= ucfirst($counrtQData['created_at']); ?></td>
                  <td>
                    <a href="javascript:;" class="mx-1 btn btn-danger CoyntDltBtn"  id="CoyntDltBtn" data-id="<?= $counrtQData['id']; ?>"><i class="fa fa-md fa-trash"></i> </a>
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
<style>

</style>
<div id="snackbar"></div>

<?php include('includes/footer.php'); ?>
<script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/super-build/ckeditor.js"></script>
<script src="js/visa-action.js"></script>