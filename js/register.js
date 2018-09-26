$(document).ready(function () {
    // Regex to check user input
    let userExp = /\W|_+/;
    let passExp = /^(?=.*[a-z])(?=.*\d)(?=.*\W|_+)/i;

    // Disable submit button at page ready
    $("#submit").attr('disabled', 'disabled');

    let validEntry = {
        user: false,
        password: false,
        confirm: false
    };

    // Used to check user has input in text boxes
    let allFilled = {
        user: false,
        pass: false,
        confirm: false
    };

    $("#user").keyup(function () {
        let userInput = $(this).val();
        let userOutput = $("#userCheck");

        // For if input is empty
        if (userInput !== '') {
            allFilled['user'] = true;
        }
        else {
            allFilled['user'] = false;
        }

        // For user input check (length and regex)
        let userCheck = userInput.length >= 6 && userInput.length <= 10 && !(userExp.test(userInput));
        if (userCheck) {
            userOutput.removeClass("list-group-item-danger");
            userOutput.addClass("list-group-item-success");
        }
        else {
            userOutput.removeClass("list-group-item-success");
            userOutput.addClass("list-group-item-danger");
        }
        validEntry.user = userCheck;
    });

    $("#password").keyup(function () {
        let passInput = $(this).val();
        let passOutput = $("#passCheck");

        if (passInput !== '') {
            allFilled['pass'] = true;
        }
        else {
            allFilled['pass'] = false;
        }

        let passCheck = passInput.length >= 6 && passExp.test(passInput);
        if (passCheck) {
            passOutput.removeClass("list-group-item-danger");
            passOutput.addClass("list-group-item-success");
        }
        else {
            passOutput.removeClass("list-group-item-success");
            passOutput.addClass("list-group-item-danger");
        }

        validEntry.password = passCheck;
    });

    $("#confirm").keyup(function () {
        let passConfirm = $("#password").val();
        let confirmInput = $(this).val();
        let confirmOutput = $("#confirmCheck");

        if (confirmInput !== '') {
            allFilled['confirm'] = true;
        }
        else {
            allFilled['confirm'] = false;
        }

        if (passConfirm === confirmInput) {
            confirmOutput.removeClass("list-group-item-danger");
            confirmOutput.addClass("list-group-item-success");
        }
        else {
            confirmOutput.removeClass("list-group-item-success");
            confirmOutput.addClass("list-group-item-danger");
        }


        validEntry.confirm = validEntry.password && (passConfirm === confirmInput);
    });

    // Check to whether disabled submit button or not if all requirements are meet
    $("input[type='text'], input[type='password']").keyup(function () {
        if (allFilled['user'] && allFilled['pass'] && allFilled['confirm'] && validEntry['user'] &&
        validEntry['password'] && validEntry['confirm']) {
            $("#submit").removeAttr('disabled');
        }
        else {
            $("#submit").attr('disabled', 'disabled');
        }
    });
});