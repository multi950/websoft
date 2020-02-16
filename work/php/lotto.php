<?php




$lotto = [];

for($i = 0; $i < 7; $i++){
    $lotto[] = rand(1,35);
}

sort($lotto);

