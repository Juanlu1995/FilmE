const $ = require('jquery');

function getDataPaginate() {
    event.preventDefault();

    let target = $(event.target);
    let value = parseInt(target.text());
    let parent = target.parent();

    let before = $(".page-item.active span.page-link");
    let beforeVal = before.text();
    let beforeParent = before.parent();

    beforeParent.html(`<a href="http://filme.test?page=${beforeVal}" class="page-link">${beforeVal}</a>`);
    beforeParent.removeClass("active");

    parent.addClass("active");
    parent.html(`<span class="page-link">${value}</span>`);


    axios.get('/givemefilms?page=' + value)
        .then(function (response) {
            $(".content").html(response.data);
            attachAsyncTask();
        }).catch(function (error) {
        console.log(error);
    });
}


function attachAsyncTask() {
    $("a.page-link").on('click', getDataPaginate);
}


$(function () {
    attachAsyncTask();
});