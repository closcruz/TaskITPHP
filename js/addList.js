$(document).ready(function () {
    $("#addList").submit(function (e) {
        e.preventDefault();

        let formData = $(this).serialize();

        let request = $.ajax({
            url: "./php/addList.php",
            type: "POST",
            data: formData
        });

        request.done(function (response, textStatus, jqXHR) {
            console.log("Data Posted.");
            location.reload();
        });

        request.fail(function (jqXHR, textStatus, errorThrown) {
            console.error("Error :" + textStatus, errorThrown);
        });
    });
});