<?php
require 'vendor/autoload.php';

$app = new \atk4\ui\App('Interactivity');
$app->initLayout('Centered');

$menu = $app->add('Menu');
$menu->addItem(['Multiplication Table', 'icon'=>'table'],['multiplication']);
$menu->addItem(['Pythagorean theorem', 'icon'=>'superscript'], ['pythagorean']);
$menu->addItem(['Guess the number', 'icon'=>'game'], ['guess1']);
