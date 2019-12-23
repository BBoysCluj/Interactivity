<?php

require 'vendor/autoload.php';
include 'inc/functions.php';

$app = new \atk4\ui\App('Adi Interactivity');
$app->initLayout('Centered');
$menu = $app->add('Menu',['class'=>['ui menu']]);

$item[0] = $menu->addItem(['Conversion Tool', 'icon'=>'thermometer'], ['conversion']);
$item[1] = $menu->addItem(['Multiplication Table', 'icon'=>'table'],['multiplication']);
$item[2] = $menu->addItem(['Pythagorean theorem', 'icon'=>'superscript'], ['pythagorean']);
$item[3] = $menu->addItem(['Guess the number', 'icon'=>'game'], ['guess1']);

$item[0]->js('click')->univ()->successMessage('Clicked');
