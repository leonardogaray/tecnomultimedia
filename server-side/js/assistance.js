setTimeout(function(){
    var params = new window.URLSearchParams(window.location.search);

    $("#token-request-button").prop('disabled', false);
    $("#token-request").show();
    $("#token-confirm").hide();
    
    $("#token-request-button").on("click", function(){
        $("#token-request-button").prop('disabled', true);
        $("#token-request-button").text("Cargando ... ");

        $.get( "/_tps/assistance/api.php", { type: "token-request", id:  params.get('id')})
            .done(function( data ) {
                $('#token-qr-confirmation').attr('src', '/_tps/assistance/qrcode.php?token=' + data.token);

                $("#token-request").hide();
                $("#token-confirm").show();
            })
            .fail(function( jqXHR, textStatus, errorThrown ) {
                $("#token-request-button").prop('disabled', false);
                $("#message").text(textStatus);
            })
            .always(function() {
                
            });
    });
    
}, 5000);