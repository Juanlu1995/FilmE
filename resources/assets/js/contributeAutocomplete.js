

function complete(target, data) {

}


$(function () {
    let data;
    axios.get('/contributes/autocomplete')
        .then(function (response) {
            data = JSON.parse(response.data);
            console.log(data);
        }).catch(function (e) {
        console.log(e)
    });

    $(".autoComplete").on('input', function (e, data) {
        complete(e.target, data);
    });

});