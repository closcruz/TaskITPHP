$(document).ready(function () {
    // Get task id through active class of button which is set on list generation through DB
    const activeLimit = 1;

    $("#todoLists > button").click("a", function () {
        let listId;

        if($("#todoLists > button.active").length >= activeLimit) {
            $("#todoLists > button").removeClass("active");
            $(this).addClass("active");
            listId = $(this).val();
            console.log("Task ID is: " + listId);
        }
        else {
            $(this).addClass("active");
            listId = $(this).val();
            console.log("Task ID is: " + listId);
        }

        $.post("./php/genTasks.php", {'id': listId}, function (result) {
            $("#taskListBody").append(result);
        });

    });
});