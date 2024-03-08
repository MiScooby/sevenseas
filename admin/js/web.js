// Contact Info

$(document).on("submit", "#ContactInfo", function(){
  $.ajax({
    type: "POST",
    url: "ajax/web.php",
    processData: false,
    contentType: false,
    data: new FormData(this),
    beforeSend: function () {
      $("#ContactInfoBtn").attr("disabled", "disabled");
      $("#ContactInfoBtn").html(
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
        }, 200);
      } else {
        swicon = "warning";
        msg = data.message;
        srbSweetAlret(msg, swicon); 
      }
    },
    complete: function () {
      $("#ContactInfoBtn").removeAttr("disabled", "disabled");
      $("#ContactInfoBtn").html("Submit");
    },
  });
});

// social media
$(document).on("change", ".sm-sts", function () {
  var smid = $(this).attr("data-id");
  var sts = $(this).val();
  $.ajax({
    url: "ajax/web.php",
    type: "POST",
    async: false,
    data: {
      smid: smid,
      sts: sts,
      formType: "sm-sts",
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
  });
});

$(document).on("submit", "#UpdateSocialMedia", function(){
  $.ajax({
    type: "POST",
    url: "ajax/web.php",
    processData: false,
    contentType: false,
    data: new FormData(this),
    beforeSend: function () {
      $("#UpdateSocialMediaBtn").attr("disabled", "disabled");
      $("#UpdateSocialMediaBtn").html(
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
        }, 200);
      } else {
        swicon = "warning";
        msg = data.message;
        srbSweetAlret(msg, swicon); 
      }
    },
    complete: function () {
      $("#UpdateSocialMediaBtn").removeAttr("disabled", "disabled");
      $("#UpdateSocialMediaBtn").html("Submit");
    },
  });
});

$(document).on("click", "#dltSM", function () {
  var smid = $(this).attr("data-id"); 
  $.ajax({
    url: "ajax/web.php",
    type: "POST",
    async: false,
    data: {
      smid: smid, 
      formType: "dltSM",
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
  });
});