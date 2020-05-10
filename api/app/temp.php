<?php 
use Doctor ;
$people = [
 ['name'=>'jon doe' , 'email' => 'jon@doe.com' , 'age' => 42],
 ['name'=>'jane doe' , 'email' => 'jane@doe.com' , 'age' => 29],
];

$output = array_column($people,NULL,'email');
print_r($output);
