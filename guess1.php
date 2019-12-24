<?php
require'init.php';

$app->add(['Header', 'Guess the number - Instructions']);
$item[3]->setStyle('color','red !important');
$text = $app->add(['Text']);
$text->addParagraph('This game demonstrates how to use links, buttons, headers and text in Agile Toolkit.');
$text->addParagraph("You have to pick a number in interval 1-100. Next you press 'Start game!' button!");


$button = $app->add(['Button', "Start game!", 'iconRight'=>'smile']);
$button->set(['primary'=>true]);
$button->link(['guess2', 'min'=>1, 'max'=>100]);
?>