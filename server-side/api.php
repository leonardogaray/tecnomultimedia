<?php
require_once('../../config.php');
require_once('lib/http-request/HTTPRequest.php');

header('Content-Type: application/json; charset=utf-8');

$url = 'https://tecnomultimedia1.herokuapp.com/api';

$course = $DB->get_record('course', array("id" => $_GET["id"]), '*', MUST_EXIST);

$response = array("token" => "-1", "error" => false, "message" => "OK");
//echo json_encode($USER);
//exit;

if(isset($USER) && $USER->id == 0){
    $response["message"] = "AUTH ERROR";
    $response["error"] = true;
}else{
    try{
        $response = array();

        switch($_GET["type"]){
            case "token-request":
                $data["id"] = $USER->id;
                $data["username"] = $USER->username;
                $data["name"] = $USER->firstname . " " . $USER->lastname;
                $data["course"] = $course->id;
                $data["lastaccess"] = $USER->lastaccess;
                $response = HTTPRequest::HTTPPost($url . '/token-request', $data);
                break;
        }

        echo $response;
    } catch (\Exception $e){
        $response["message"] = $e->getMessage();
        $response["error"] = true;
    }
}

