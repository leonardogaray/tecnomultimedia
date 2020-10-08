<?php
require_once('../../config.php');

global $CFG, $PAGE;

$id          = optional_param('id', 0, PARAM_INT);
$name        = optional_param('name', '', PARAM_TEXT);
$idnumber    = optional_param('idnumber', '', PARAM_RAW);

$params = array();
if (!empty($name)) {
    $params = array('shortname' => $name);
} else if (!empty($idnumber)) {
    $params = array('idnumber' => $idnumber);
} else if (!empty($id)) {
    $params = array('id' => $id);
}else {
    print_error('unspecifycourseid', 'error');
}

$course = $DB->get_record('course', $params, '*', MUST_EXIST);

context_helper::preload_course($course->id);
$context = context_course::instance($course->id, MUST_EXIST);

require_login($course);

$PAGE->set_pagelayout('course');
$PAGE->set_title('Sistema de Asistencia Online');
$PAGE->set_heading('Sistema de Asistencia Online');
$PAGE->set_url($CFG->wwwroot.'/_tps/assistance/index.php');
echo $OUTPUT->header();