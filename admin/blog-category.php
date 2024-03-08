<?php include('includes/header.php'); ?> 
<style>
    .select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #444;
    line-height: 12px;
}
table.dataTable.table.nowrap th, table.dataTable.table.nowrap td {
    white-space: nowrap;
    padding: 0px 15px;
    line-height: 50px;
}
</style>
<div class="row">
    <div class="col-md-12 justify-content-between  mb-3 stretch-card align-items-center">

        <h5 class="card-title">CATEGORIES LIST</h5>
        <a href="add-category.php" class="btn btn-primary">Add Category</a>
    </div>

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <div class="">
                    <table id="" class="SrbdataTable table table-bordered nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>S.NO</th>
                                <th>Category Image</th>
                                <th>Category Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody class="">
                            <?php
                            $i = "1";
                            while ($blogCatQuerData = mysqli_fetch_array($blogCatQuer)) {
                            ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><img src="../blog/upload/blog_cat/<?= $blogCatQuerData['cat_thumb']; ?>" alt=""></td>
                                    <td><?= $blogCatQuerData['cat_name']; ?></td>

                                    <td>
                                        <div class="form-group">
                                            <select name="blogSts" class="form-control  ct" data-id="<?= $blogCatQuerData['id']; ?>" id="blogCatSts">
                                                <option value="active" <?= ($blogCatQuerData['status'] == 'active') ? 'selected' : ''; ?>>Active</option>
                                                <option value="inactive" <?= ($blogCatQuerData['status'] == 'inactive') ? 'selected' : ''; ?>>Inative</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="edit-category.php?<?= $urltoken . $urltoken ?>&&catid=<?= $blogCatQuerData['id']; ?>&&<?= $urltoken . $urltoken ?>" class="mx-1 btn btn-primary"><i class="fa fa-md fa-edit"></i> </a>
                                        <a href="javascript:;" class="mx-1 btn btn-danger blgCatDltBtn" data-id="<?= $blogCatQuerData['id']; ?>"><i class="fa fa-md fa-trash"></i> </a>
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
<script src="js/blog-action.js"></script>