<?php
require'init.php';
use PhpUnitConversion\Unit;

$debug = true;
$si = ['Amount','Area','Length','Mass','Temperature','Time','Volume'];
$path = 'vendor/php-unit-conversion/php-unit-conversion/src/Unit';

// add all files from each UNIT directory in $si_files
//$si_files[0] will  have all the units of measurement from Amount folder. in the format filename.php
foreach ($si as $key=>$units) {
    $path_units[$key] =  $path.'/'.$units;
    $si_files[$key] = array_diff(scandir($path_units[$key]), array('.', '..'));
    //we need to extract the file name from the @si_files so we would have the units or conversion to be used in the dropdowns.
    for($i = 2; $i < count($si_files[$key])+2; ++$i) {
        $position = strpos($si_files[$key][$i],'.php');
        $si_units[$key][$i] = substr($si_files[$key][$i],0,$position);
}}
$app->add(['Header', 'Unit Coonversions -> Powered by php-unit-conversion ']);
// $item[0]->addClass('ui active');
$item[0]->setStyle('color','red !important');

$tabs = $app->add('Tabs',['class'=>['ui blue ']]);

foreach ($si as $key=>$units) { //we are building the tabs and adding the fields
    $tabs->addTab($units, 
        function($tab) use($si, $si_units, $key, $units) { //my tabs as unit clases
    
            $dd1[$key] = new \atk4\ui\FormField\DropDown([ 'values'=>$si_units[$key]],'compact selection');
            $dd2[$key] = new \atk4\ui\FormField\DropDown([ 'values'=>$si_units[$key]],'compact selection');
        
            $col = $tab->add('Columns');
            $col_mid = $col->addColumn(12);
            $col_right = $col->addColumn(4);
            $f=$col_mid->add('Form');
            $f->buttonSave->set('Calculate');
            
         //   $f->buttonSave->set('style','background:green');
            $f->buttonSave->addStyle('background','green');
            $g=$f->addGroup('Conversion Tool');
                $g->addField('from',['class'=>['ui label blue '],$dd1[$key],'label'=>'From:'])->set(2);
                $g->addField('to',['class'=>['ui label blue '],$dd2[$key],'label'=>'To:'])->set(3);
                $g->addField('value',['class'=>['ui label blue '],'label'=>'Value','inputType'=>'number']);
//                $f->add(new \atk4\ui\FormField\Line(['placeholder'=>'Nu vreau']));

                
            //our Area of Conversion. wee need to use classes from $units
            $f->OnSubmit(
                function($f) use($col_right,$units,$key, $si_units) {
                $input_from = intval($f->model['from']); //will return the id of the record selected in the dropdown
                $input_to   = intval($f->model['to']);
                $input_value = intval($f->model['value']);
            return $col_right->jsReload(['value'=>$input_value,'from'=>$input_from, 'to'=>$input_to]);
            });
            if (isset($_GET['value'])){
                $from_class = 'PhpUnitConversion\Unit\\'.$units.'\\'.$si_units[$key][$_GET['from']];
                $original = new  $from_class($_GET['value']);
                $to_class = 'PhpUnitConversion\Unit\\'.$units.'\\'.$si_units[$key][$_GET['to']];
                $converted = new  $to_class;
                $original->to($converted);
                //$col_right->add(['Label', 'Conversions of ', 'detail' => $si_units[$key][$_GET['from']].' to '.$si_units[$key][$_GET['to']] ]);
                $col_right->add([
                    'Label', 
                    'Value of',
                    'pointing below big blue circular',
                    'detail' => $_GET['value'].' '.$si_units[$key][$_GET['from']]
                ]);
                $col_right->add([
                    'Label',
                    'Equals to: ',
                    'massive green circular',
                    'style'=>['color' => 'red',  'border'=> '5px solid red'], 
                    'detail' => $converted->format(2,true)
                ]);
                
               
            }

    });

};

