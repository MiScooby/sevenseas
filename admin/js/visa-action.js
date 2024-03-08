$(document).on("submit", "#AddCountyForms", function () {
    $.ajax({
        type: "POST",
        url: "ajax/country-module.php",
        processData: false,
        contentType: false,
        data: new FormData(this),
        beforeSend: function () {
            $("#addCountye").attr("disabled", "disabled");
            $("#addCountye").html("Please Wait <i class='fa fa-spinner fa-spin'></i>");
            $("#loader").show();
        },
        success: function (data) {
            data = JSON.parse(data);
            if (data.status) {
                swicon = "success";
                msg = data.message;
                srbSweetAlret(msg, swicon);
                window.setTimeout(function () {
                    location.reload();
                }, 300);
            } else {
                swicon = "warning";
                msg = data.message;
                srbSweetAlret(msg, swicon);
            }
        },
        complete: function () {
            $("#addCountye").removeAttr("disabled", "disabled");
            $("#addCountye").html("Add Category");
        },
    });
});

$(document).on("click", ".CoyntDltBtn", function () {
    var contId = $(this).attr("data-id");
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "ajax/country-module.php",
                type: "POST",
                async: false,
                data: {
                    contId: contId,
                    formType: "DltCountry",
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
            });
        }
    });


});

$(document).on("submit", "#AddblogForms", function () {
    $.ajax({
      type: "POST",
      url: "ajax/visa.php",
      processData: false,
      contentType: false,
      data: new FormData(this),
      beforeSend: function () {
        $("#docUploadBtn").attr("disabled", "disabled");
        $("#docUploadBtn").html(
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
        $("#docUploadBtn").removeAttr("disabled", "disabled");
        $("#docUploadBtn").html('Upload Document');
      },
    });
  });