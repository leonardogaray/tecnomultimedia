<?php
require_once('_header.php');
?>

<div>
    <div id="token-request">
        <button id="token-request-button" type="button" class="btn btn-primary">Pedir Token</button>
    </div>
    <div class="text-center" id="token-confirm">
        <img style="width:400px;heigth:400px;" id="token-qr-confirmation" src="" />
    </div>
</div>

<?php
//Footer
$PAGE->requires->js( new moodle_url($CFG->wwwroot.'/_tps/assistance/js/assistance.js'));

echo $OUTPUT->footer();
