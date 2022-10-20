<?php
    $ps = $_GET['ps'];
    $passwordHash = password_hash($ps, PASSWORD_DEFAULT);
    echo $passwordHash;
?>