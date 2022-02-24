<?php
function getRouterMask(string $routerCode, mysqli $connection) : string
{
	$routerCode = $connection->real_escape_string($routerCode);
	$response   = $connection->query("SELECT mask FROM router_types WHERE code = '$routerCode'")->fetch_assoc();

	return $response['mask'];
}

function checkStoredSerialNumbers(array $serialNumbers, mysqli $connection) : array
{
	$query = "SELECT serial FROM routers WHERE serial IN (";

	$delimiter = "";
	foreach($serialNumbers as $serialNumber)
	{
		$serialNumber = $connection->real_escape_string($serialNumber);
		$query .= $delimiter . "'$serialNumber'";
		$delimiter = ", ";
	}
	$query .= ")";

	$storedSerialNumbers = [];
	$newSerialNumbers = [];
	$result = $connection->query($query);
	foreach ($result as $storedSerialNumber)
	$storedSerialNumbers[] = $storedSerialNumber['serial'];

	foreach ($serialNumbers as $serialNumber)
	{
		if(!in_array($serialNumber, $storedSerialNumbers))
		{
			$newSerialNumbers[] = $serialNumber;
		}
	}

	return [
		'new' => $newSerialNumbers,
		'stored' => $storedSerialNumbers
	];
}

function storeSerialNumbers(array $serialNumbers, string $routerCode, mysqli $connection) : array
{
	$wrongSerialNumbers = [];
	$correctSerialNumbers = [];
	$routerMaskRegEx = convertMaskToRegEx(getRouterMask($routerCode, $connection));

	foreach ($serialNumbers as $serialNumber)
	{
		if(preg_match($routerMaskRegEx, $serialNumber) === 1)
		{
			$correctSerialNumbers[] = $serialNumber;
		} else {
			$wrongSerialNumbers[] = $serialNumber;
		}
	}

	if(count($correctSerialNumbers) == 0) {
		return $wrongSerialNumbers;
	}

	$storeRoutersQuery = "INSERT INTO routers (type_code, serial) VALUES ";
	$delimiter = "";
	foreach($correctSerialNumbers as $serialNumber) {
		$storeRoutersQuery .= $delimiter . "('$routerCode', '$serialNumber')";
		$delimiter = ", ";
	}
	$connection->query($storeRoutersQuery);

	return $wrongSerialNumbers;
}

function convertMaskToRegEx(string $mask) : string
{
	$regEx = '/' . $mask . '/';
	$regEx = str_replace("Z", "[\-\_\@]", $regEx);
	$regEx = str_replace("N", "[0-9]", $regEx);
	$regEx = str_replace("a", "[a-z]", $regEx);
	$regEx = str_replace("A", "[A-Z]", $regEx);
	$regEx = str_replace("X", "[A-Z0-9]", $regEx);

	return $regEx;
}