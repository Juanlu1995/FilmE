$("#create").on('click', function (e) {
    e.preventDefault();
    let film = $("#film").attr('film');
    let title = $("#title").val();
    let content = $("content").val();
    let rating = $("rating").val();
    let rute = "/createReview/" + film;
    let formData = new FormData;
    formData.append('title', title);
    formData.append('content', content);
    formData.append('rating', rating);

    axios.post(rute, formData)
        .then(function (response) {
            console.log(response.data);
            //todo alerta
        }).catch(function (error) {
        console.log(error);
    })
});

$(function () {
    $("#createReview").on('click', function (e) {
        let form = $("#formCreateReview");
        form.toggle(1000);
    });
});