$(document).ready(function () {
    // Set the list id to a hidden value in the form to make a task
    $("#todoLists > button").click(function () {
        // Get list id from active button on list select column
        let listId = $(this).val();

        $("#listId").val(listId);
    });

    $("#addTask").submit(function (e) {
        e.preventDefault();

        let formData = $(this).serialize();

        let request = $.ajax({
            url: "./php/addTask.php",
            type: "POST",
            data: formData
        });

        request.done(function (response, testStatus, jqXHR) {
            console.log("Data Posted.");
        });

        request.fail(function (jqXHR, textStatus, errorThrown) {
            console.error("Error: " + textStatus, errorThrown);
        });
    });
});