const $ = require("jquery");


function gestionarErrores(input, errores) {
    let noSendForm = false;
    input = $(input);
    if (typeof errores !== typeof undefined) {
        input.removeClass("is-invalid");
        input.addClass("is-invalid");
        input.nextAll(".invalid-feedback").remove();
        for (let error of errores) {
            input.after(`<div class="invalid-feedback">
                <strong> ${error} </strong>
            </div>`);
        }
        noSendForm = true;
    } else {
        input.removeClass("is-invalid");
        input.addClass("is-valid");
        input.nextAll(".invalid-feedback").remove();
    }
    return noSendForm;
}

function validateTarget(target) {
    let formData = new FormData();
    formData.append(target.id, target.value);
    $(target).parent().next(".spinner").addClass("sk-circle");
    axios.post('/register/validate',
        formData
    ).then(function (response) {
        $(target).parent().next(".spinner").removeClass("sk-circle");
        switch (target.id) {
            case "name":
                gestionarErrores(target, response.data.name);
                break;
            case "lastName":
                gestionarErrores(target, response.data.lastName);
                break;
            case "username":
                gestionarErrores(target, response.data.username);
                break;
            case "email":
                gestionarErrores(target, response.data.email);
                break;
        }
    }).catch(function (error) {
        console.log(error);
    });
}

$(function () {
    $("#name,#lastName,#username,#email").on('change', function (e) {
        validateTarget(e.target)
    });

    $("#registerButton").click(function (e) {
        e.preventDefault();
        let sendForm = true;
        let formData = new FormData;
        formData.append('name', $("#name").val());
        formData.append('lastName', $("#lastName").val());
        formData.append('username', $("#username").val());
        formData.append('email', $("#email").val());

        axios.post('/register/validate', formData)
            .then(function (response) {
                if (gestionarErrores("#name", response.data.name)) {
                    sendForm = false;
                }
                if (gestionarErrores("#lastName", response.data.lastName)) {
                    sendForm = false;
                }
                if (gestionarErrores("#username", response.data.username)) {
                    sendForm = false;
                }
                if (gestionarErrores("#email", response.data.email)) {
                    sendForm = false;
                }

                if (sendForm === true){
                    $("#registerForm").submit();
                }
            });
    });
});
