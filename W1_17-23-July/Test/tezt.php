<?php

//include "./tezt.json";

// Database configuration
$host = 'localhost';
$dbName = 'members_db';
$username_ = 'root';
$password_ = '';

// Handle member registration

    $pdo = new PDO("mysql:host=$host;dbname=$dbName", $username_, $password_);

    // INSERT INTO employees (employee_name, employee_salary, employee_age) VALUES 
	// ("Tiger Nixom", "320800", "61"),
    // ("Garrett Winters", "170750", "63"),
    // ("Ashton Cox", "86000", 66),
    // ("Cedric Kelly", "433060", "22"),
    // ("Airi Satou", "162700", "33");

    $sql = "SELECT * FROM employee";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll();

    for ($j = 0; $j != sizeof($results); $j++) { 
        $result = $results[$j];

        // echo "ID: " . $result['id']. "<br>";   
        echo "Name: " . $result['employee_name']. "<br>";   
        echo "Salary: " . $result['employee_salary']. "<br>";   
        echo "Age: " . $result['employee_age']. "<br><br>"; 
    }