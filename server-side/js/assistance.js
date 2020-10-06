setTimeout(function(){
    var params = new window.URLSearchParams(window.location.search);

    $("#token-request").show();
    $("#token-confirm").hide();
    
    $("#token-request-button").on("click", function(){
        $.get( "/_tps/assistance/api.php", { type: "token-request", id:  params.get('id')})
            .done(function( data ) {
                $('#token-qr-confirmation').attr('src', '/_tps/assistance/qrcode.php?token=' + data.token);

                $("#token-request").hide();
                $("#token-confirm").show();
            })
            .fail(function( e ) {
                console.info(e);
            })
            .always(function() {
                
            });
    });
    
}, 5000);