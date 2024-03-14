function srbSweetAlret(msg, swicon) {
    msg = msg;
    swicon = swicon;
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon: swicon,
        title: msg
    })
}

function logOut() {
    $.ajax({
      url: "ajax/logout.php",
      type: "POST",
      async: false,
      success: function (data) {
        location.href = "login.php";
      },
    });
  }

$(document).on("submit", "#registrationForm", function () {
    
    $.ajax({
        type: "POST",
        url: "ajax/user.php",
        processData: false,
        contentType: false,
        data: new FormData(this),
        beforeSend: function () {
            $("#regbtn").attr("disabled", "disabled");
            $("#regbtn").html(
                "<b> Please Wait </b> <i class='fa fa-spinner fa-spin' aria-hidden='true'></i>"
            );
        },

        success: function (data) {
            data = JSON.parse(data);
            if (data.status) {
                swicon = "success";
                msg = data.message;
                srbSweetAlret(msg, swicon);
                document.getElementById('registrationForm').style.display = 'none';
                document.getElementById('otpForm').style.display = 'block';
                $("#user_email_otp").val(data.email);
            } else {
                swicon = "warning";
                msg = data.message;
                srbSweetAlret(msg, swicon);
            }
        },
        complete: function () {
            $("#regbtn").removeAttr("disabled", "disabled");
            $("#regbtn").html("Register");
        },
    });
});

$(document).on("submit", "#loginForm", function () {
    $.ajax({
        type: "POST",
        url: "ajax/user.php",
        processData: false,
        contentType: false,
        data: new FormData(this),
        beforeSend: function () {
            $("#lgnBtn").attr("disabled", "disabled");
            $("#lgnBtn").html(
                "<b> Please Wait </b> <i class='fa fa-spinner fa-spin' aria-hidden='true'></i>"
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
                  }, 10);
            } else {
                swicon = "warning";
                msg = data.message;
                srbSweetAlret(msg, swicon);
            }
        },
        complete: function () {
            $("#lgnBtn").removeAttr("disabled", "disabled");
            $("#lgnBtn").html("Register");
        },
    });
});

$(document).on("submit", "#otpForm", function () {
    $.ajax({
        type: "POST",
        url: "ajax/user.php",
        processData: false,
        contentType: false,
        data: new FormData(this),
        beforeSend: function () {
            $("#otpBtn").attr("disabled", "disabled");
            $("#otpBtn").html(
                "<b> Please Wait </b> <i class='fa fa-spinner fa-spin' aria-hidden='true'></i>"
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
                  }, 10);
            } else {
                swicon = "warning";
                msg = data.message;
                srbSweetAlret(msg, swicon);
            }
        },
        complete: function () {
            $("#otpBtn").removeAttr("disabled", "disabled");
            $("#otpBtn").html("Confirm");
        },
    });
});

$(document).on("submit", "#visaApplyForm", function () {
    $.ajax({
        type: "POST",
        url: "ajax/visa.php",
        processData: false,
        contentType: false,
        data: new FormData(this),
        beforeSend: function () {
            $("#ApplyBtn").attr("disabled", "disabled");
            $("#ApplyBtn").html(
                "<b> Please Wait </b> <i class='fa fa-spinner fa-spin' aria-hidden='true'></i>"
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
                  }, 10);
            } else {
                swicon = "warning";
                msg = data.message;
                srbSweetAlret(msg, swicon);
            }
        },
        complete: function () {
            $("#ApplyBtn").removeAttr("disabled", "disabled");
            $("#ApplyBtn").html("<span class='btn-title'>Proceed to Apply</span>");
        },
    });
});
$(document).on("submit", "#payment_check_form", function () {
    $.ajax({
        type: "POST",
        url: "ajax/visa.php",
        processData: false,
        contentType: false,
        data: new FormData(this),
        beforeSend: function () {
            $("#payButton").attr("disabled", "disabled");
            $("#payButton").html(
                "<b> Please Wait </b> <i class='fa fa-spinner fa-spin' aria-hidden='true'></i>"
            );
        },
        success: function (data) {
            data = JSON.parse(data);
            if (data.status) {
                swicon = "success";
                msg = data.message;
                srbSweetAlret(msg, swicon);
                window.location.href = data.url;
            } else {
                swicon = "warning";
                msg = data.message;
                srbSweetAlret(msg, swicon);
            }
        },
        complete: function () {
            $("#payButton").removeAttr("disabled", "disabled");
            $("#payButton").html("<span class='btn-title text-white'>Proceed To Pay </span>");
        },
    });
});