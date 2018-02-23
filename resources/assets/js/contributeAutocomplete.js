function split( val ) {
    return val.split( /,\s*/ );
}
function extractLast( term ) {
    return split( term ).pop();
}

$(function () {
    let contributes;
    axios.get('/contributes/autocomplete')
        .then(function (response) {
            contributes = response.data;
            console.log(contributes);
        }).catch(function (e) {
        console.log(e)
    });

    $(".autoComplete").on( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).autocomplete( "instance" ).menu.active ) {
            event.preventDefault();
        }
    }).autocomplete({
        minLength: 0,
        source: function( request, response ) {
            // delegate back to autocomplete, but extract the last term
            response( $.ui.autocomplete.filter(
                contributes, extractLast( request.term ) ) );
        },
        focus: function() {
            // prevent value inserted on focus
            return false;
        },
        select: function( event, ui ) {
            let terms = split( this.value );
            // remove the current input
            terms.pop();
            // add the selected item
            terms.push( ui.item.value );
            // add placeholder to get the comma-and-space at the end
            terms.push( "" );
            this.value = terms.join( ", " );
            return false;
        }
    });

});