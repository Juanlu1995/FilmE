import iziModal from 'izimodal/js/iziModal';
// Initialise imported function as jQuery function
$.fn.iziModal = iziModal;
// Use function as normal
$(".modal").iziModal({
    width: '50%',
    padding: 20,
    // onClosing: function () {
    //
    // }
});


function getReviews(review) {
    $(`#form-${review}`).css('background-color', 'rose');
}


$(function () {
    let review = null;
    $(".triggerDelete").on('click', function (e) {
        e.preventDefault();
        review = e.target.id;
        $("#modal").iziModal('open');
    });

    $("#continue").on('click', function () {
        if (review) {
            axios.post('/deleteReview/' + review)
                .them(function (response) {
                    getReviews(review);
                })
                .catch(function (error) {
                    console.log(error)
                })
        }
    });

    $("#cancel").on('click', function () {
        $("#deleteReview").iziModal('close');
    })

});