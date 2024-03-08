<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="assets/css/inner.css">

<div class="card">
    <div class="card-body p-3">
    <table id="" class="dataTableExample table table-bordered  " width="100%">
    <thead>
        <tr>
            <th>S.No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Intrested In</th>
            <th>Query</th>
            <th>Enquiry Date Time</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        while ($contactDa = mysqli_fetch_array($projectQdata)) {
        ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $contactDa['name'] ?></td>
                <td><?= $contactDa['email'] ?></td>
                <td><?= $contactDa['mobile'] ?></td>
                <td><?= $contactDa['intrested_i'] ?></td>
                <td><?= $contactDa['query'] ?></td>
                <td><?= $contactDa['enquiry_at'] ?></td>
                <td>
                    <a class="btn btn-primary" href="view-enquiry.php?<?= $urltoken . $urltoken ?>&type=service&id=<?php echo $contactDa['id']; ?>&<?= $urltoken . $urltoken ?>">View Details</a>
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