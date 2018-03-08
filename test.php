<?php
//data base connect
//select

header('Content-Type:application/json');


$data = [
    'name' => 'ram',
    'age' => 20
];

echo json_encode($data);
?>