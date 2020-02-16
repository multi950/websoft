<?php

echo "hello\n";

$var = 2;
$msg = "message";

echo "here is a " . $msg;

$die = rand(1,6);
if($die > 1){
    echo "more than 1: ";
}

echo "you rolled a '$die'";

$title = "title2";
require __DIR__ . "/view/lotto.php"
?>