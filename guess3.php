<?php
require'init.php';

$number = $_GET['number'];

$app->add(['Header', "I won, your guessed number is $number !"]);

$app->add(['ui'=>'divider']);

$app->add(['Button', 'Play again.', 'basic', 'icon'=>'refresh'])
->link(['guess1']);
