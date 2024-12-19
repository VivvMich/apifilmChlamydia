<?php
if (isset($_GET["message"]) && isset($_GET["status"])) {
    $message = $_GET["message"];
    $status = $_GET["status"];
    echo "<h5 class='$status m-2' >$message</h5>";
}
