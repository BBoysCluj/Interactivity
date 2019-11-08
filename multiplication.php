<?php
require'init.php';

$app->add(['Header', 'Multiplication Table']);

$seg = $app->add(['ui'=>'segment']);

$seg->add(['Text', 'Select multiplier: ']);

for($i = 1; $i < 10; $i++) {
    $l = $seg->add([
        'Label', 
        $i, 
        ( isset($_GET['b']) && $_GET['b']== $i ) ? 'green':'blue',
        ]);
    $l->link(['b'=>$i]);
}

if ( isset($_GET['b'])) {
$multiplier = $_GET['b'];

$data = [];
for($i = 1; $i < 10; $i++) {
    $data[] = ['a' => $i, 'b' => $multiplier, 'm' => $multiplier * $i];
}

$table = $app->add('Table');
$table->setSource($data, ['a', 'b']);
$table->addColumn('m', null, ['caption'=>'A * B']);
}