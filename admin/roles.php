<?php include('includes/header.php');
$getRole = mysqli_query($con, "SELECT * FROM `ec_roles_type` ORDER BY id ASC");
?>

<link rel="stylesheet" href="assets/css/inner.css">

<style>
 
</style>

<div class="row justify-content-center">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <h6 class="card-title">Add Roles for access control</h6>

                <form class="forms-sample" id="AddRoleForm" action="javascript:;" method="post" enctype="multipart/form-data">
                    <div class='loading'></div>
                    <div class="mb-3">
                        <label for="RoleName" class="form-label">Role Name :</label>
                        <input type="text" class="form-control" name="RoleName" required placeholder="Enter Role Name">
                    </div>

                    <div class="mb-3">
                        <div>
                            <label class="form-label">Status </label>
                            <div class="input-field">
                                <select class="js-example-basic-single form-select ct" id="RoleSts" name="RoleSts" data-width="100%" required>
                                    <option></option>
                                    <option value="1" selected>Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <input type="hidden" name="AddRoles">
                        <button type="submit" class="btn btn-primary me-2 w-50" id="AddRoleBtn">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card p-3">
            <div class="card-body">

                <div class="">
                <table id="" class="SrbdataTable table    table-bordered nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>S.NO</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody class="">
                            <?php
                            $i = 1;
                            while ($getRoleData = mysqli_fetch_array($getRole)) {
                            ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= ucfirst($getRoleData['title']); ?></td>
                                    <td>
                                        <select style="width: 100px;" <?= ($getRoleData['editable'] == 'no') ? 'disabled' : 'class="roleStsCHange"'; ?> data-id="<?= $getRoleData['id'] ?>">
                                            <option value="1" <?= ($getRoleData['status'] == 1) ? 'selected' : ''; ?>>Active</option>
                                            <option value="0" <?= ($getRoleData['status'] == 0) ? 'selected' : ''; ?>>Inactive</option>
                                        </select>
                                    </td>
                                    <td>
                                        <?php
                                        if ($getRoleData['editable'] == 'yes') {
                                            $hash_token = encrypt_decrypt($getRoleData['id'], 'encrypt');
                                        ?>
                                            <a href="edit-role.php?<?= $urltoken ?>&<?= $urltoken ?>&&role_id=<?= $getRoleData['id'] ?>&&<?= $urltoken ?>&<?= $urltoken ?>" class="btn btn-primary btn-icon s6">
                                                <i data-feather="edit"></i>
                                            </a>
                                            <a href="javascript:;" id="dltRole" data-id="<?= $getRoleData['id'] ?>" class="btn btn-danger btn-icon s6">
                                                <i data-feather="trash"></i>
                                            </a>

                                            <a href="role-permission.php?rid=<?= $hash_token ?>" class="btn btn-danger ">
                                                Set Permission
                                            </a>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="javascript:;" style="cursor: no-drop;" class="btn btn-secondary s6">
                                                Not Editable
                                            </a>
                                        <?php
                                        }
                                        ?>

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
<script src="js/employee.js"></script>