<?php

$jarray = [];

$questions = array('answer1','answer2','answer3');
$answer = array('me','here','now');
// $correct = ['i','there','at'];

foreach($questions as $key => $question)
{
	$jarray[]=[
	    $question
	];
}

$array= json_encode($jarray);
// echo '<pre>';
echo $array;
$result = json_decode($array, true);
print_r(count($result));
echo $result[0];
// echo $result[2]['question'];
// $result = array_count_values($array);
// echo $result;
// $dbParam = JSON.stringify($array);

// echo $dbParam[0];

?>
