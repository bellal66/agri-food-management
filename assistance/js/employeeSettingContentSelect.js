//operator clubSelect active or inactive show
  $(document).on('click', '.mymensinghSelectActive', function (event) {
    event.preventDefault();
    var match_id = $(this).attr("id");
    $.ajax({
        method: "POST",
        url: "employeeSettingContentDataFetch.php",
        data: {
            mymensingh_id_for_active: match_id
        },
        success: function (data) {
            //page refresh
            location.reload();
        }
    });
  });
  $(document).on('click', '.mymensinghSelectInactive', function (event) {
    event.preventDefault();
    var match_id = $(this).attr("id");
    $.ajax({
        method: "POST",
        url: "employeeSettingContentDataFetch.php",
        data: {
            mymensingh_id_for_inactive: match_id
        },
        success: function (data) {
            //page refresh
            location.reload();
        }
    });
  });
  $(document).on('click', '.dhakaSelectActive', function (event) {
    event.preventDefault();
    var match_id = $(this).attr("id");
    $.ajax({
        method: "POST",
        url: "employeeSettingContentDataFetch.php",
        data: {
            dhaka_id_for_active: match_id
        },
        success: function (data) {
            //page refresh
            location.reload();
        }
    });
  });
  $(document).on('click', '.dhakaSelectInactive', function (event) {
    event.preventDefault();
    var match_id = $(this).attr("id");
    $.ajax({
        method: "POST",
        url: "employeeSettingContentDataFetch.php",
        data: {
            dhaka_id_for_inactive: match_id
        },
        success: function (data) {
            //page refresh
            location.reload();
        }
    });
  });
  $(document).on('click', '.rajshahiSelectActive', function (event) {
    event.preventDefault();
    var match_id = $(this).attr("id");
    $.ajax({
        method: "POST",
        url: "employeeSettingContentDataFetch.php",
        data: {
            rajshahi_id_for_active: match_id
        },
        success: function (data) {
            //page refresh
            location.reload();
        }
    });
  });
  $(document).on('click', '.rajshahiSelectInactive', function (event) {
    event.preventDefault();
    var match_id = $(this).attr("id");
    $.ajax({
        method: "POST",
        url: "employeeSettingContentDataFetch.php",
        data: {
            rajshahi_id_for_inactive: match_id
        },
        success: function (data) {
            //page refresh
            location.reload();
        }
    });
  });
  $(document).on('click', '.rangpurSelectActive', function (event) {
    event.preventDefault();
    var match_id = $(this).attr("id");
    $.ajax({
        method: "POST",
        url: "employeeSettingContentDataFetch.php",
        data: {
            rangpur_id_for_active: match_id
        },
        success: function (data) {
            //page refresh
            location.reload();
        }
    });
  });
  $(document).on('click', '.rangpurSelectInactive', function (event) {
    event.preventDefault();
    var match_id = $(this).attr("id");
    $.ajax({
        method: "POST",
        url: "employeeSettingContentDataFetch.php",
        data: {
            rangpur_id_for_inactive: match_id
        },
        success: function (data) {
            //page refresh
            location.reload();
        }
    });
  });
  $(document).on('click', '.sylhetSelectActive', function (event) {
    event.preventDefault();
    var match_id = $(this).attr("id");
    $.ajax({
        method: "POST",
        url: "employeeSettingContentDataFetch.php",
        data: {
            sylhet_id_for_active: match_id
        },
        success: function (data) {
            //page refresh
            location.reload();
        }
    });
  });
  $(document).on('click', '.sylhetSelectInactive', function (event) {
    event.preventDefault();
    var match_id = $(this).attr("id");
    $.ajax({
        method: "POST",
        url: "employeeSettingContentDataFetch.php",
        data: {
            sylhet_id_for_inactive: match_id
        },
        success: function (data) {
            //page refresh
            location.reload();
        }
    });
  });
  $(document).on('click', '.khulnaSelectActive', function (event) {
    event.preventDefault();
    var match_id = $(this).attr("id");
    $.ajax({
        method: "POST",
        url: "employeeSettingContentDataFetch.php",
        data: {
            khulna_id_for_active: match_id
        },
        success: function (data) {
            //page refresh
            location.reload();
        }
    });
  });
  $(document).on('click', '.khulnaSelectInactive', function (event) {
    event.preventDefault();
    var match_id = $(this).attr("id");
    $.ajax({
        method: "POST",
        url: "employeeSettingContentDataFetch.php",
        data: {
            khulna_id_for_inactive: match_id
        },
        success: function (data) {
            //page refresh
            location.reload();
        }
    });
  });
  $(document).on('click', '.barisalSelectActive', function (event) {
    event.preventDefault();
    var match_id = $(this).attr("id");
    $.ajax({
        method: "POST",
        url: "employeeSettingContentDataFetch.php",
        data: {
            barisal_id_for_active: match_id
        },
        success: function (data) {
            //page refresh
            location.reload();
        }
    });
  });
  $(document).on('click', '.barisalSelectInactive', function (event) {
    event.preventDefault();
    var match_id = $(this).attr("id");
    $.ajax({
        method: "POST",
        url: "employeeSettingContentDataFetch.php",
        data: {
            barisal_id_for_inactive: match_id
        },
        success: function (data) {
            //page refresh
            location.reload();
        }
    });
  });
  $(document).on('click', '.chittagongSelectActive', function (event) {
    event.preventDefault();
    var match_id = $(this).attr("id");
    $.ajax({
        method: "POST",
        url: "employeeSettingContentDataFetch.php",
        data: {
            chittagong_id_for_active: match_id
        },
        success: function (data) {
            //page refresh
            location.reload();
        }
    });
  });
  $(document).on('click', '.chittagongSelectInactive', function (event) {
    event.preventDefault();
    var match_id = $(this).attr("id");
    $.ajax({
        method: "POST",
        url: "employeeSettingContentDataFetch.php",
        data: {
            chittagong_id_for_inactive: match_id
        },
        success: function (data) {
            //page refresh
            location.reload();
        }
    });
  });
