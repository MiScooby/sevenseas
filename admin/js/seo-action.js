$(document).on("submit", "#EditPageForm", function () {
    $.ajax({
        type: "POST",
        url: "ajax/seo-page.php",
        processData: false,
        contentType: false,
        data: new FormData(this),
        beforeSend: function () {
            $("#EditPageBtn").attr("disabled", "disabled");
            $("#EditPageBtn").html(
                "<i class='fa fa-spinner fa-spin' aria-hidden='true'></i>"
            );
        },

        success: function (data) {
            data = JSON.parse(data);
            if (data.status) {
                swicon = "success";
                msg = data.message;
                srbSweetAlret(msg, swicon);
                window.setTimeout(function () {
                    location.reload();
                }, 100);
            } else {
                swicon = "warning";
                msg = data.message;
                srbSweetAlret(msg, swicon);
            }
        },
        complete: function () {
            $("#EditPageBtn").removeAttr("disabled", "disabled");
            $("#EditPageBtn").html('Submit');
        },
    });
});
