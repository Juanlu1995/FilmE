$(function () {
    $("#mostrarReviews").on('click', function (e) {
        let reviews = $("#reviews");
        let usuario = $("#mostrarReviews").attr('user');
        axios.get("/giveuserreviews/" + usuario)
            .then(function (response) {
                reviews.append(response.data);
            }).catch(function (error) {
            console.log(error)
        })
    })
});