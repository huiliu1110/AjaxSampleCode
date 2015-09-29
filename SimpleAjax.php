<?php

header("Content-Type:text/plain;charset=utf-8");
//header("Content-Type:application/json;charset=utf-8");
//header("Content-Type:text/xml;charset=utf-8");
//header("Content-Type:text/html;charset=utf-8");
//header("Content-Type:application/javascript;charset=utf-8");


$staff = array
	(
		array("name" => "Haley", "number" => "101", "sex" => "Male", "job" =>"Manager"),
		array("name" => "abcde", "number" => "102", "sex" => "Male", "job" =>"Developer"),
		array("name" => "vwxyz", "number" => "103", "sex" => "Female", "job" =>"Recruit")
	);

//$_SERVER is a super global variable
//$_SERVER["REQUEST_METHOD"] returns request method.
//if GET method, search particular person in array by keyword.
//if POST method, create a new person and store it in array.

if($_SERVER["REQUEST_METHOD"] == "GET"){
	search();
}else if($_SERVER["REQUEST_METHOD"] == "POST"){
	create();
}

function search()
{
	//isset check the variable is set or not.
	//empty check the variable is empty or not.
	if(!isset($_GET["number"])||empty($_GET["number"]))
	{
		echo "Missing Keyword Error";
		return;
	}

	global $staff;

	$number = $_GET["number"];
	$result = "Can't find the employee!";

	//search in array
	foreach($staff as $value)
	{
		if($value["number"] == $number){
			$result = "Find the emplyee:".$value["name"];
			break;
		}
	}
	echo $result;	
}

function create(){
	
	if(!isset($_POST["name"]) || empty($_POST["name"])
		|| !isset($_POST["number"]) || empty($_POST["number"])
		|| !isset($_POST["sex"]) || empty($_POST["sex"])
		|| !isset($_POST["job"]) || empty($_POST["job"]))
	{
		echo "Missing Value Error";
		return;
	}
	//insert the new employee into array
	echo "Create a new Employee".$_POST["name"];
}
?>
