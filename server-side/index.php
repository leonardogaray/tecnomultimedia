<?php
require_once('_header.php');
?>

<div>
    <h3>Solicitud del Token de Asistencia Online</h3>
    <div class="row">
        <div class="col-md-6">
            <p>El Token es un sistema de authenticación que te permitirá dar el presente a tu clase online de forma simple.
                Te pasamos algunos tips a tener en cuenta: </p>
            <ul>
                <li>Antes de pedir el token, debes acceder desde Chrome/Safari en tu celular a este link <a href="https://tecnomultimedia1.herokuapp.com/">https://tecnomultimedia1.herokuapp.com/</a></li>
                <li>Cuando pidas un Token nuevo, si has solicitado uno previamente, el anterior caducará</li>
                <li>El token lo debes solicitar una única vez, o si el mismo se encuentra vencido</li>
                <li>Durante tu clase online, aparecerá de forma arbitraría un código QR en la pantalla de tu docente, que deberas escanear con tu celular a traves del sitio anterior 
                <a href="https://tecnomultimedia1.herokuapp.com/">https://tecnomultimedia1.herokuapp.com/</a></li>
                <li>El código QR en tu clase puede aparecer mas de una vez</li>
            </ul>
        </div>
        <div class="col-md-6">
            <div id="token-request">
                <div class="row">
                    <div class="col-md-4"></div>
                    <button id="token-request-button" type="button" class="btn btn-primary col-md-4" disabled>Pedir Token</button>
                    <div class="col-md-4"></div>
                </div>
                <div class="row">
                    <p id="message" class="text-left col-md-8"></p>
                </div>
            </div>
            <div id="token-confirm" class="text-center">
                <img style="width:300px;" id="token-qr-confirmation" src="" class="img-fluid" />
            </div>
        </div>
    </div>
</div>

<?php
//Footer
$PAGE->requires->js( new moodle_url($CFG->wwwroot.'/_tps/assistance/js/assistance.js'));

echo $OUTPUT->footer();
