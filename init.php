<?php

require 'vendor/autoload.php';
$app = new \atk4\ui\App('Interactivity by BBoysCluj');
$app->initLayout(['Centered','image'=>'https://cdn.clipart.email/be8d459a8644c87807a6bb17e6271b1f_statue-of-liberty-silhouette-download-at-vectorportal_660-660.jpeg']);
$menu = $app->add(['Menu']);
$item[0] = $menu->addItem(['Conversion Tool', 'icon'=>'thermometer','skin'=>''], ['conversion']);
$item[1] = $menu->addItem(
['Multiplication Table','icon'=>'table'],
['multiplication']);
$item[2] = $menu->addItem(['Pythagorean theorem', 'icon'=>'superscript'], ['pythagorean']);
$item[3] = $menu->addItem(['Guess the number', 'icon'=>'game'], ['guess1']);
$menu->addClass('blue inverted');
