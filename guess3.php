<?php
require'init.php';

$number = $_GET['number'];

$app->add(['Header', "I won, your guessed number is $number !"]);
$item[3]->setStyle('color','red !important');
$app->add(['ui'=>'divider']);

$app->add(['Button', 'Play again.', 'basic', 'icon'=>'refresh'])
->link(['guess1']);
