<?php

//include "./tezt.json";

// Database configuration
$host = 'localhost';
$dbName = 'members_db';
$username_ = 'root';
$password_ = '';

// Handle member registration

    $pdo = new PDO("mysql:host=$host;dbname=$dbName", $username_, $password_);

    // INSERT INTO `employee` (`employee_name`, `employee_salary`, `employee_age`, `profile_image`) VALUES
    // ('Tiger Nixon', '320800', '61', ''),
    // ('Garrett Winters', '170750', '63', ''),
    // ('Ashton Cox', '86000', '66', ''),
    // ('Cedric Kelly', '433060', '22', ''),
    // ('Airi Satou', '162700', '33', ''),
    // ('Brielle Williamson', '372000', '61', ''),
    // ('Herrod Chandler', '137500', '59', ''),
    // ('Rhona Davidson', '327900', '55', ''),
    // ('Colleen Hurst', '205500', '39', ''),
    // ('Sonya Frost', '103600', '23', ''),
    // ('Jena Gaines', '90560', '30', ''),
    // ('Quinn Flynn', '342000', '22', ''),
    // ('Charde Marshall', '470600', '36', ''),
    // ('Haley Kennedy', '313500', '43', ''),
    // ('Tatyana Fitzpatrick', '385750', '19', ''),
    // ('Michael Silva', '198500', '66', ''),
    // ('Paul Byrd', '725000', '64', ''),
    // ('Gloria Little', '237500', '59', ''),
    // ('Bradley Greer', '132000', '41', ''),
    // ('Dai Rios', '217500', '35', ''),
    // ('Jenette Caldwell', '345000', '30', ''),
    // ('Yuri Berry', '675000', '40', ''),
    // ('Caesar Vance', '106450', '21', ''),
    // ('Doris Wilder', '85600', '23', '');

    include "./tezt-json.php";

    $json_data = json_decode($json, true);
    // var_dump($json_data);

    $json_employee = $json_data['data'];
    // var_dump($json_employee[0]);

    foreach ($json_employee as $key => $value) {
        // echo "Key: " . $key ." => Name: " . $value['employee_name'] . "<br>"; 
        echo "<br>Name: " . $value['employee_name'] . "<br>"; 
        echo "Salary: " . $value['employee_salary'] . "<br>"; 
        echo "Age: " . $value['employee_age'] . "<br>"; 

        $sql = "INSERT INTO employee (employee_name, employee_salary, employee_age) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$value['employee_name'], $value['employee_salary'], $value['employee_age']]);
    }
    
    // $sql = "SELECT * FROM employee";

    // $stmt = $pdo->prepare($sql);
    // $stmt->execute();

    // $results = $stmt->fetchAll();

    // for ($j = 0; $j != sizeof($results); $j++) { 
    //     $result = $results[$j];

    //     // echo "ID: " . $result['id']. "<br>";   
    //     echo "<br>Name: " . $result['employee_name']. "<br>";   
    //     echo "Salary: " . $result['employee_salary']. "<br>";   
    //     echo "Age: " . $result['employee_age']. "<br>"; 
    // }