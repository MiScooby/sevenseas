<?php include('includes/header.php');
if (!authChecker('admin', ['add_meta_data', 'view_meta_data'])) {
    noAccessPage();
}
?>
<link rel="stylesheet" href="assets/css/inner.css">
<div class="row">
    <div class="col-md-12 justify-content-between  mb-3 stretch-card align-items-center">

        <h5 class="card-title">OUR JOB LIST</h5>
        <!-- <div>
            <button id="fetchUrlBtn" class="btn btn-primary justify-content-ends">Fetch URLs</button>
        </div> -->
    </div>
</div>
<div class="card">
    <div class="card-body p-3">
        <table id="" class="dataTableExample table table-bordered" width="100%">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Page Url</th>
                    <th>Meta Title</th>
                    <th>Update Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                $getPagesData = mysqli_query($con, "SELECT * FROM `website_pages`");
                while ($pageData = mysqli_fetch_array($getPagesData)) {
                ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $pageData['page_url'] ?></td>
                        <td><?= (isset($pageData['page_title'])) ? '' . $pageData['page_title'] . '' : 'n/a'; ?></td>
                        <td><?= $pageData['created_at'] ?></td>
                        <td>
                            <a class="btn btn-primary" href="view-seopage.php?<?= $urltoken . $urltoken ?>&&id=<?php echo $pageData['id']; ?>&<?= $urltoken . $urltoken ?>">View Details</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>

        </table>
    </div>
</div>
<?php include('includes/footer.php'); ?>
<script>
    new DataTable('#example');
</script>
<script>
    // script.js
    $(document).ready(function() {
        $('#fetchUrlBtn').on('click', function() {
            $.ajax({
                url: 'ajax/fetch_sitemap.php',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    data = JSON.parse(data);
                    if (data.status) {
                        swicon = "success";
                        msg = data.message;
                        srbSweetAlret(msg, swicon);
                        location.href = "index.php";
                    } else {
                        swicon = "warning";
                        msg = data.message;
                        srbSweetAlret(msg, swicon);
                    }
                }
            });
        });
    });
</script>