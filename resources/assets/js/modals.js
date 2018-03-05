import iziModal from 'izimodal/js/iziModal';
// Initialise imported function as jQuery function
$.fn.iziModal = iziModal;
// Use function as normal
$("#modal").iziModal();


$(function () {
    $("#delete").on('click', function (e) {
        e.preventDefault();
        $("#modal").iziModal('open');
    });

    $("#continue").on('click', function () {
        $("#deleteForm").submit();
    });
});
