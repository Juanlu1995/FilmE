import iziModal from 'izimodal/js/iziModal';
// Initialise imported function as jQuery function
$.fn.iziModal = iziModal;
// Use function as normal
$(".modal").iziModal({
    width:'50%',
    padding: 20,
});

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


function validateForm(target) {
let review = $("#review").val();
    let formData = new FormData();
    formData.append(target.id, target.value);
    $(target).parent().next(".spinner").addClass("sk-circle");
    axios.post('/editReviewAJAX/'+review,
        formData
    ).then(function (response) {
        $(target).parent().next(".spinner").removeClass("sk-circle");
        switch (target.id) {
            case "title":
                gestionarErrores(target, response.data.name);
                break;
            case "content":
                gestionarErrores(target, response.data.lastName);
                break;
            case "rating":
                gestionarErrores(target, response.data.username);
                break;
        }
    }).catch(function (error) {
        console.log(error);
    });



}



$(function () {
    $("#trigger").on('click', function (e) {
        e.preventDefault();
        $("#modal").iziModal('open');
    });

    $("#title, #content, #rating").on('change', function (e) {
        validateForm(e.target)
    });

    $("#continue").on('click', function () {
        validateForm();
    });
});
