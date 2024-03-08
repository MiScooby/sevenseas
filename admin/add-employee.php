<?php include('includes/header.php');
$getRoleData = mysqli_query($con, "SELECT * FROM `ec_roles_type` WHERE `status`='1' AND `id`!='1'");
$getRoleDataCount = mysqli_num_rows($getRoleData);
?>

<link rel="stylesheet" href="assets/css/inner.css">
 

<div class="row justify-content-center">

    <?php
    if ($getRoleDataCount > 0) {
    ?>
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <h6 class="card-title">Add Employee for access control</h6>

                    <form class="forms-sample" id="AddEmpForm" action="javascript:;" method="post" enctype="multipart/form-data">



                        <div class="mb-3">
                            <div>
                                <label class="form-label">User Role </label>
                                <div class="input-field">
                                    <select class="js-example-basic-single form-select ct" id="EmpRole" name="EmpRole" data-width="100%" required>
                                        <option></option>
                                        <?php

                                        while ($getRoleDataR = mysqli_fetch_array($getRoleData)) {
                                        ?>
                                            <option value="<?= $getRoleDataR['id'] ?>"><?= $getRoleDataR['title'] ?></option>
                                        <?php
                                        }
                                        ?>

                                    </select>
                                </div>
                                <small>Note : Employee can access selected role given by admin. </small>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Employee Name :</label>
                            <div class="row">
                                <div class="col-sm-6"><input type="text" class="form-control" name="EmployeeFirstName" required placeholder="Enter Employee First Name"></div>
                                <div class="col-sm-6"><input type="text" class="form-control" name="EmployeeLastName" required placeholder="Enter Employee Last Name"></div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label">Country Code</label>
                                <select disabled class="c_code form-select" id="c_code" name="c_code" data-width="100%">
                                    <option></option>
                                    <option selected value="91">+91</option>
                                </select>
                            </div>
                            <div class="col-md-8">
                                <label for="mob_num" class="form-label">Mobile Number</label>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="mob_num" name="mob_num" required placeholder="Enter Main Mobile Number" maxlength="10" oninput="this.value = this.value.replace(/\D+/g, '')">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="alt_mob_num" name="alt_mob_num" placeholder="Enter Alternate Mobile Number" maxlength="10" oninput="this.value = this.value.replace(/\D+/g, '')">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Employee DOB :</label>
                                    <input type="date" class="form-control" name="EmployeeDob" required placeholder="Enter Employee First Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Employee Email-Id :</label>
                                    <input type="email" class="form-control" name="EmployeeEmail" required placeholder="Enter Employee First Name">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3 pass2">
                                    <label for="emp_Password" class="form-label fw-500">Password</label>
                                    <input type="password" class="form-control " name="emp_Password" id="emp_Password" required="" placeholder="Enter Password">
                                    <span toggle="#password-field" class="fa fa-eye-slash fa-eye field-icon toggle-password"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-500">Confirm Password</label>
                                    <input type="password" class="form-control " name="emp_Password_cfm" required="" placeholder="Enter Password">
                                </div>
                            </div>
                            <div id="ErrMsg" style="display: none;"></div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label">Job Description :</label>
                                <textarea name="jobDesc" class="form-control" placeholder="Please Define  Employee Job Description" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="text-center">
                            <input type="hidden" name="AddEmployee">
                            <button type="submit" class="btn btn-primary me-2 w-50" id="AddEmpBtn">Submit</button>
                        </div>
                    </form>

                    <form class="forms-sample" id="VerEmpForm" style="display: none;" action="javascript:;" method="post" enctype="multipart/form-data">
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <div class="mb-3 text-center">
                                    <label class="form-label">Enter Verification Code</label>
                                    <input type="text" minlength="4" maxlength="4" oninput="this.value = this.value.replace(/\D+/g, '')" class="form-control" name="EmpOtp" required placeholder="Enter Verification Code">
                                </div>
                                <div class="text-center">
                                    <input type="hidden" name="VerifyEmployee">
                                    <input type="hidden" id="emailEmp" name="emailEmp">
                                    <button type="submit" class="btn btn-primary me-2 w-50" id="VerifyEmpBtn">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    <?php
    } else {
    ?>
        <div class="rwomsg">
            <img src="assets/images/nofound.jpg" width="300px" alt="">

            <p>Please add minimum 1 role or if you have already any role in your list please check status.</p>
            <small>( Super Admin will not count as a role for any employee )</small>
        </div>
    <?php
    }
    ?>
</div>



<?php include('includes/footer.php'); ?>
<script src="js/employee.js"></script>