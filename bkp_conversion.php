<?php
require'init.php';
use PhpUnitConversion\Unit;
use PhpUnitConversion\Unit\Amount;
use PhpUnitConversion\Unit\Area;
use PhpUnitConversion\Unit\Length;
use PhpUnitConversion\Unit\Mass;
use PhpUnitConversion\Unit\Temperature;
use PhpUnitConversion\Unit\Time;
use PhpUnitConversion\Unit\Volume;

$debug=true;
$si=['Amount','Area','Length','Mass','Temperature','Time','Volume'];
$path = '../../vendor/php-unit-conversion/php-unit-conversion/src/Unit';

//$files = array_diff(scandir($path_new), array('.', '..'));

// add all files from each UNIT directory in $si_files
//$si_files[0] will  have all the units of measurement from Amount folder. in the format filename.php
foreach ($si as $key=>$units) {
    $path_units[$key] =  $path.'/'.$units;
    $si_files[$key] = array_diff(scandir($path_units[$key]), array('.', '..'));
    //we need to extract the file name from the @si_files so we would have the units or conversion to be used in the dropdowns.
    for($i = 2; $i < count($si_files[$key]); ++$i) {
        $position = strpos($si_files[$key][$i],'.php');
        $si_units[$key][$i] = substr($si_files[$key][$i],0,$position);

}}
//display_debug($si_units[3] , $si_units[3] , $debug);

$app->add(['Header', 'Unit Coonversions -> Powered by php-unit-conversion ']);

$form = $app->add('Form');
$form->buttonSave->set('SAVE');
$form->buttonSave->setAttr('hidden');
$tabs_layout = $form->layout->addSubLayout('Tabs');

foreach ($si as $key=>$units) { //we are building the tabs and adding the fields
    
    $t[$key]=$tabs_layout->addTab($units); //my tabs as unit clases
    
    $dd1[$key] = new \atk4\ui\FormField\DropDown([ 'values'=>$si_units[$key]],'compact selection');
    $dd2[$key] = new \atk4\ui\FormField\DropDown([ 'values'=>$si_units[$key]],'compact selection');
    
    $col = $t[$key]->add('Columns');
    $col_mid = $col->addColumn(12);
    $col_right = $col->addColumn(4);

    $f=$col_mid->add('Form');
    $f->buttonSave->set('Calculate');
    $g=$f->addGroup('Conversion From /To');
        $g->addField('From',$dd1[$key])->set(3); 
        $g->addField('To',$dd2[$key])->set(4);
        $g->addField('Value',['label'=>'Value','width'=>'four']);
        $col_right->add('Text')->addParagraph('Using unit conversion:');
            
}
    $f->OnSubmit(
        function($f) use($col_right,$units,$key) {
            
            $input_from = $f->model['From']; //will return the id of the record selected in the dropdown
            $input_to   = $f->model['To'];
            $input_value = $f->model['Value'];
            
            //$unit_value_class = strval($units.'\\'.'KiloGram');
            
            //$unit_value = new $input_from($input_value);
            display_debug($input_from, $input_from, true);
            display_debug($input_to, $input_to, true);
            display_debug($input_value, $input_value, true);
                        
            // $unit_conve = new Mass\Pound;;
            // $unit_value->to($unit_conve);
            // display_debug($unit_conve, $unit_conve, true);
            
        return $col_right->jsReload(['result'=>$unit_conve->format(2,false)]);
        
    });


if (isset($_GET['result'])){
$col_right->add(['Label', 'Conversion =', 'detail' => $_GET['result'] ]);
}



// $d1 = $g->addField('d1', new \atk4\ui\FormField\DropDown(['values' => [
//             'tag'        => ['Tag', 'icon' => 'tag icon'],
//             'globe'      => ['Globe', 'icon' => 'globe icon'],
//             'registered' => ['Registered', 'icon' => 'registered icon'],
//             'file'       => ['File', 'icon' => 'file icon'],
//         ],
// ], 'compact selection'));
// $d1->onChange('console.log("d1 changed")');









//public function 