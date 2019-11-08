<?php
require 'init.php';

$app->add(['Message', 'Welcome to Interractive Examples', 'info'])->text
    ->addParagraph('Thanks to Agile UI you are able to create interractive examples,
    that have a way to interract with the user and change the content of the page
    depending on user input.')
    ->addParagraph('Enjoy the 3 examples I have included.')
    ;
