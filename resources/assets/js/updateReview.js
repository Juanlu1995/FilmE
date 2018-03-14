import iziModal from 'izimodal/js/iziModal';
// Initialise imported function as jQuery function
$.fn.iziModal = iziModal;
// Use function as normal
$(".modal").iziModal({
    width: '50%',
    padding: 20,
    onClosing: function () {
        let review = $("#review").val();
        let rute = `/reviewAJAX/${review}`;
        axios.get(
            rute,
        ).then(function (response) {
            let title = response.data.title;
            let content = response.data.content;
            let rating = `<span class="text-danger">Rating: </span> ${response.data.rating}`;
            $("#titleReview").html(title);
            $("#contentReview").html(content);
            $("#ratingReview").html(rating);
        }).catch(function (error) {
            console.log(error);
        });
    }
});
function validateForm(target) {
    let review = $("#review").val();
    let rute = `/editReviewAJAX/${review}`;
    let formData = new FormData();
    formData.append(target.id, target.value);
    $(target).parent().next(".spinner").addClass("sk-circle");
    axios.post(
        rute,
        formData
    ).then(function (response) {
        $(target).parent().next(".spinner").removeClass("sk-circle");
    }).catch(function (error) {
        console.log(error);
    });


}


$(function () {
    $("#triggerUpdate").on('click', function (e) {
        e.preventDefault();
        $("#update").iziModal('open');
    });

    $("#title, #content, #rating").on('change', function (e) {
        validateForm(e.target)
    });

    $("#continue").on('click', function () {
        validateForm();
    });
});
