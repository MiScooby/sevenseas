<?php include('includes/header.php');
if (!isUserLoggedIn()) {
    header('Location: login.php');
} else {
    $loginI = $_SESSION['user_id'];
    $GetLoginUser = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM `user` WHERE `email`='$loginI'"));
    $userId = $GetLoginUser['id'];
}

?>
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css" />
<style>
    .profile-userpic {
        text-align: center;
    }

    .profile-userpic img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        margin: auto;
        text-align: center;
    }

    .profile-usertitle-name {
        color: #5a7391;
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 3px;
    }

    .profile-usertitle-job {
        text-transform: uppercase;
        color: #5b9bd1;
        font-size: 13px;
        font-weight: 800;
        margin-bottom: 7px;
    }

    .profile-usertitle {
        text-align: center;
        padding-top: 20px;
        padding-bottom: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-control {
        padding: 10px;
        height: 45px;
    }

    .sidecard {
        padding: 10px;
        box-shadow: 0px 1px 3px 2px #ebebeb;
        border-radius: 10px;
        background-color: #fff;
    }

    table {
        width: 100%;
        border-collapse: collapse;

    }

    th {
        background: #3498db !important;
        color: white;
        font-weight: bold;
        text-align: center;
    }

    td,
    th {
        padding: 5px;
        border-bottom: 1px solid #ccc;
        text-align: center;
        font-size: 14px;
    }

    .tbl-accordion-header a {
        color: #28c76f !important;
    }

    .tbl-accordion-body {
        display: none;
    }

    .tbl-accordion-body td {
        border-bottom: 0px;
    }

    .tbl-accordion-body tr:last-child {
        border-bottom: 1px solid #ccc;
    }

    table.dataTable {
        width: 100% !important;
    }
    .fsvui{
        padding: 30px 10px;
    background: #f5f5f559;
    }
    
</style>
<section class="page-title" style="background-image: url(images/background/page-title.jpg);">
    <div class="auto-container">
        <div class="title-outer">
            <h1 class="title">Account Details</h1>
        </div>
    </div>
</section>

<section>
    <div class="container py-5">
        <div class="row justify-content-between fsvui">
            <div class="col-sm-4">
                <div class="sidecard">
                    <div class="profile-userpic"> <img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="img-responsive" alt=""></div>
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name"> <?= $GetLoginUser['name']; ?></div>
                        <div class="profile-usertitle-job"> <?= $GetLoginUser['email']; ?></div>
                    </div>
                    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="true">Profile</button>

                        <button class="nav-link" id="v-pills-Visa-tab" data-bs-toggle="pill" data-bs-target="#v-pills-Visa" type="button" role="tab" aria-controls="v-pills-Visa" aria-selected="false">Visa Applied</button>
                        <button class="nav-link" id="v-pills-Payment-tab" data-bs-toggle="pill" data-bs-target="#v-pills-Payment" type="button" role="tab" aria-controls="v-pills-Payment" aria-selected="false">Payment Transactions</button>
                        <button class="nav-link" onclick="logOut()">Logout</button>
                    </div>
                </div>
            </div>

            <div class="col-sm-8">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <form action="javascript:;" method="post">
                            <div class="form-group">
                                <label for="inputName">Name</label>
                                <input readonly type="text" class="form-control" id="inputName" value="<?= $GetLoginUser['name']; ?>" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input readonly type="email" class="form-control" value="<?= $GetLoginUser['email']; ?>" id="exampleInputEmail1" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputMobile">Mobile</label>
                                <input readonly type="tel" class="form-control" value="<?= $GetLoginUser['mobile']; ?>" id="exampleInputMobile" placeholder="Mobile">
                            </div>

                            <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                        </form>
                    </div>

                    <div class="tab-pane fade" id="v-pills-Visa" role="tabpanel" aria-labelledby="v-pills-Visa-tab">
                        <table class="datastable table table-striped table-bordered" id="example">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Req Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Country</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <?php
                            $GetAPpliedVisa = mysqli_query($con, "SELECT av.*, c.country_name FROM applied_visa av, user u, countries c WHERE u.id=av.user_id AND c.country_code=av.country_code AND u.id='$userId'; ");
                            while ($GetAPpliedVisaData = mysqli_fetch_array($GetAPpliedVisa)) {
                            ?>
                                <div>
                                    <tbody class="tbl-accordion-header">
                                        <tr>
                                            <td>
                                                <a data-toggle="toggle"><i class="fa fa-plus"></i></a>
                                            </td>
                                            <td><?= $GetAPpliedVisaData['service_id']; ?></td>
                                            <td><?= $GetAPpliedVisaData['name']; ?></td>
                                            <td><?= $GetAPpliedVisaData['email']; ?></td>
                                            <td><?= $GetAPpliedVisaData['country_name']; ?></td>
                                            <td><?= $GetAPpliedVisaData['created_at']; ?></td>

                                        </tr>
                                    </tbody>
                                    <tbody class="tbl-accordion-body">
                                        <?php
                                        $GetDocuDQ = mysqli_query($con, "SELECT * FROM `documents` WHERE req_id='$GetAPpliedVisaData[service_id]'");
                                        $docCOunt = mysqli_num_rows($GetDocuDQ);
                                        if ($docCOunt > 0) {
                                            while ($GetDocuData =  mysqli_fetch_array($GetDocuDQ)) {
                                        ?>
                                                <tr>
                                                    <td colspan="3"><strong><?= $GetDocuData['doc_name']; ?>:</strong></td>
                                                    <td colspan="3"><a href="visa_document/<?= $GetDocuData['doc_file']; ?>" target="_blank"><img src="images/docs.svg" width="50px" alt=""></a></td>
                                                </tr>
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td><strong>Documents Not found</strong></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>



                                    </tbody>
                                </div>
                            <?php
                            }
                            ?>



                        </table>
                    </div>
                    <div class="tab-pane fade" id="v-pills-Payment" role="tabpanel" aria-labelledby="v-pills-Payment-tab">
                        <table id="example" class="display datastable" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Request Id</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $getPayTraQ = mysqli_query($con, "SELECT pr.* FROM payment_req pr, applied_visa av WHERE pr.req_id=av.service_id AND pr.status='complete' AND av.user_id='$userId'");
                                while ($getPayTradata = mysqli_fetch_array($getPayTraQ)) {
                                ?>
                                    <tr>
                                        <td><?= $i++?></td>
                                        <td><?=$getPayTradata['req_id']?></td> 
                                        <td><?=$getPayTradata['amount']?></td> 
                                        <td><?=$getPayTradata['status']?></td> 
                                        <td><?=$getPayTradata['updated_at']?></td> 
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
</section>

<?php include('includes/footer.php') ?>
<script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
<script>
    $(document).ready(function() {
        new DataTable('.datastable');
        $('[data-toggle="toggle"]').click(function() {
            $(this).parents().next(".tbl-accordion-body").toggle();
        });
    });
</script>