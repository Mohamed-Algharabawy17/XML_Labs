<?php

$FILE_NAME = "employees.xml";

if (!file_exists($FILE_NAME)) 
{
    createNewXML($FILE_NAME);
}

/************************************** Navigate buttons and inputs *************************************/

$currentEmployeeIndex = isset($_POST['currentIndex']) ? $_POST['currentIndex'] : 0;

if (isset($_POST['prev'])) 
{
    $currentEmployeeIndex = max(0, $currentEmployeeIndex - 1);
} elseif (isset($_POST['next'])) 
{
    $employees = getEmployees($FILE_NAME);
    $totalEmployees = count($employees);
    $currentEmployeeIndex = min($totalEmployees - 1, $currentEmployeeIndex + 1);
}

if (isset($_POST['submit'])) 
{
    insertEmployee($FILE_NAME, $_POST['name'], $_POST['email'], $_POST['phone'], $_POST['address']);
}

if (isset($_POST['update'])) 
{
    updateEmployee($FILE_NAME, $currentEmployeeIndex, $_POST['name'], $_POST['email'], $_POST['phone'], $_POST['address']);
}

if (isset($_POST['delete'])) 
{
    deleteEmployee($FILE_NAME, $_POST['currentIndex']); 
    $currentEmployeeIndex = 0;
}

$searchResults = []; 
if (isset($_POST['search'])) 
{
    $searchResults = searchByName($FILE_NAME, $_POST['searchName']);
}


if (!empty($searchResults)) 
{
    $currentEmployee = $searchResults[0];
} else {
    $employees = getEmployees($FILE_NAME);
    $currentEmployee = $employees[$currentEmployeeIndex] ?? null;
}


/**************************** create new file xml  *****************************/
function createNewXML($file_name) 
{
    $dom = new DOMDocument('1.0', 'UTF-8');
    $root = $dom->createElement('employees');
    $dom->appendChild($root);
    $dom->save($file_name);
}

/**************************** insert into file *****************************/
function insertEmployee($file_name, $name, $email, $phone, $address) 
{
    $dom = new DOMDocument();
    $dom->load($file_name);

    $employee = $dom->createElement('employee');

    $nameElement = $dom->createElement('name', $name);
    $employee->appendChild($nameElement);

    $emailElement = $dom->createElement('email', $email);
    $employee->appendChild($emailElement);

    $phoneElement = $dom->createElement('phone', $phone);
    $employee->appendChild($phoneElement);

    $addressElement = $dom->createElement('address', $address);
    $employee->appendChild($addressElement);

    $root = $dom->documentElement;
    $root->appendChild($employee);

    $dom->save($file_name);
}

/**************************** fetch data from the xml file *****************************/
function getEmployees($file_name) 
{
    $employees = [];
    $dom = new DOMDocument();
    $dom->load($file_name);
    $employeeNodes = $dom->getElementsByTagName('employee');
    foreach ($employeeNodes as $employeeNode) {
        $employee = [
            'name' => $employeeNode->getElementsByTagName('name')->item(0)->nodeValue,
            'email' => $employeeNode->getElementsByTagName('email')->item(0)->nodeValue,
            'phone' => $employeeNode->getElementsByTagName('phone')->item(0)->nodeValue,
            'address' => $employeeNode->getElementsByTagName('address')->item(0)->nodeValue
        ];
        $employees[] = $employee;
    }
    return $employees;
}

/**************************** update the xml file *****************************/
function updateEmployee($file_name, $index, $name, $email, $phone, $address) 
{
    $employees = getEmployees($file_name);
    $employees[$index] = [
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'address' => $address
    ];
    updateEmployees($file_name, $employees);
}

function updateEmployees($file_name, $employees) 
{
    $dom = new DOMDocument('1.0', 'UTF-8');
    $root = $dom->createElement('employees');
    foreach ($employees as $employee) {
        $employeeNode = $dom->createElement('employee');
        $nameElement = $dom->createElement('name', $employee['name']);
        $emailElement = $dom->createElement('email', $employee['email']);
        $phoneElement = $dom->createElement('phone', $employee['phone']);
        $addressElement = $dom->createElement('address', $employee['address']);

        $employeeNode->appendChild($nameElement);
        $employeeNode->appendChild($emailElement);
        $employeeNode->appendChild($phoneElement);
        $employeeNode->appendChild($addressElement);

        $root->appendChild($employeeNode);
    }
    $dom->appendChild($root);
    $dom->save($file_name);
}

/**************************** Delete emp from the file *****************************/
function deleteEmployee($file_name, $index) 
{
    $employees = getEmployees($file_name);
    unset($employees[$index]);
    $employees = array_values($employees);
    updateEmployees($file_name, $employees);
}

/**************************** Searching for emp in the file *****************************/
function searchByName($file_name, $name) 
{
    $employees = getEmployees($file_name);
    $matchingEmployees = [];
    foreach ($employees as $employee) {
        if (stripos($employee['name'], $name) !== false) {
            $matchingEmployees[] = $employee;
        }
    }
    return $matchingEmployees;
}
