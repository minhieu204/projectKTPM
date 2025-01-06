<?php
    $data = callApi('http://localhost/projectKTPM/api/thongke/get.php');

    if (isset($data['data']) && count($data['data']) > 0) {
        $thongkes = $data['data'];
    } else {
        $thongkes = [];
    }
    require_once('Views/thongke/thongke.php');
?>