const $ = require("jquery");


function gestionarErrores(input, errores) {
    let hayErrores = false;
    let divErrores = input.next();
    divErrores.html("");
    input.removeClass("bg-success bg-danger");
    if (errores.length === 0) {
        input.addClass("bg-success");
    } else {
        hayErrores = true;
        input.addClass("bg-danger");
        for (let error of errores) {
            divErrores.append("<div>" + error + "</div>");
        }
    }
    input.parent().next().remove();
    return hayErrores;
}

function incluirSpinner(input) {
    if (input.parent().next().length === 0) {
        let spin = $(".spinner").first().clone(true);
        input.parent().after(spin);
        spin.show();
    }
}

class paramsAxios{
    constructor(param,value) {
        this.param = param;

    }
}

//@todo preguntar para que una sola petición axios se pueda utilizar para todos los valores.
function validateName(name) {
    axios.post('/register/validate', {
    name: name.value
    }).then(function (response) {
        gestionarErrores(name, response.data.name)
    }).catch(function (error) {
        console.log(error)
    })
}


function validateLastName(lastName) {
    axios.post('/register/validate', {
        lastName: lastName.value
    }).then(function (response) {
        gestionarErrores(lastName, response.data.lastName)
    }).catch(function (error) {
        console.log(error)
    })
}


function validateUsername(username) {
    axios.post('/register/validate', {
        username: username.value
    }).then(function (response) {
        gestionarErrores(username, response.data.username)
    }).catch(function (error) {
        console.log(error)
    })
}

function validateEmail(email) {
    axios.post('/register/validate', {
        email: email.value
    }).then(function (response) {
        gestionarErrores(email, response.data.email)
    }).catch(function (error) {
        console.log(error)
    })
}
$(function () {
    $("#name").on('change',function(e){
        validateName(e.target)
    });
    $("#lastName").on('change',function(e){
        validateLastName(e.target)
    });
    $("#username").on('change',function(e){
        validateUsername(e.target)
    });
    $("#email").on('change',function(e){
        validateEmail(e.target)
    });
});
