<?php
require_once('./lib/qrcode/qrlib.php');

QRcode::png($_GET["token"]);