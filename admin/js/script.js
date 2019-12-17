
$(document).ready(function ($) {

    /*
    ================
    Edit photo sidebar dropdown
    ================
    */

    $(".info-box-header").click(function () {
        $(".inside").slideToggle("fast");
        $("#toggle").toggleClass("glyphicon-menu-down glyphicon , glyphicon-menu-up glyphicon");
    });

    /*
    ===============================================
    Media library on modal for changing user image
    ===============================================
    */

    var user_href;
    var user_href_splitted;
    var user_id;
    var image_src;
    var image_src_splitted;
    var image_name;
    var photo_id;

    $(".modal_thumbnails").click(function () {

        // Enable selection button
        $("#set_user_image").prop("disabled", false);

        // Get user id
        user_href = $("#user-id").prop("href");
        user_href_splitted = user_href.split("=");
        user_id = user_href_splitted[user_href_splitted.length - 1];

        // Get image name
        image_src = $(this).prop("src");
        image_src_splitted = image_src.split("/");
        image_name = image_src_splitted[image_src_splitted.length - 1];

        // Get image id and show info to sidebar
        photo_id = $(this).attr("data");
        $.ajax({
           url: "includes/ajax.php",
           data: {
               photo_id: photo_id
           },
            type: "POST",
            success: function (data) {
                if (!data.error) {
                    $("#modal_sidebar").html(data);
                }
            }
        });

    });

    $("#set_user_image").click(function () {
        $.ajax({
            url: "includes/ajax.php",
            data: {
                image_name: image_name,
                user_id: user_id
            },
            type: "POST",
            success: function (data) {
                if (!data.error) {
                    $(".user-image-box a img").prop("src", data);
                }
            }
        });
    });


    /*
    =========================
    Installing tinyMCE editor
    =========================
    */

    tinymce.init({selector:'textarea'});

});
