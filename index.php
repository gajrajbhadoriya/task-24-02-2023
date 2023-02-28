<?php

require_once __DIR__ . '/vendor/autoload.php';
// error_reporting(0);
$data = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = require __DIR__ . '/fetch-data.php';    
}

list('fast' => $speed, 'near' => $near, 'small' => $small, 'large' => $large) = $data;
// dd($speed, $near, $small , $large);

// dd($data);
// $data = ['fast' => $speed, 'near' => $near, 'small' => $small, 'large' => $large];
// dd($retrive);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Asteroid Neo Stats</title>
    <style>
       table, th, td {
        border: 5px solid;
    }
    </style>
</head>
<body>
    <h1>Asteroid Neo Stats</h1>
    <form method="POST" action="">
        <label for="start_date">Start Date:</label>
        <input type="text" id="start_date" name="start_date"><br>
        <label for="end_date">End Date:</label>
        <input type="text" id="end_date" name="end_date"><br>
        <input type="submit" value="Submit">
    </form>

    <br><br>

    <h2>Fastest Asteroid</h2>
    <table>
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Speed</th>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $speed['id']; ?></td>
                <td><?php echo $speed['name']; ?></td>
                <td><?php echo $speed['speed']; ?> km/h</td>
            </tr>
        </tbody>
    </table>

    <br><br>

    <h2>Nearest Asteroid</h2>   
    <table>
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Distance</th>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $near['id']; ?></td>
                <td><?php echo $near['name']; ?></td>
                <td><?php echo $near['distance']; ?> km/h</td>
            </tr>
    </tbody>
    </table>

    <br><br>

    <h2>Smallest Asteroid</h2>
    <table>
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Minimum Size</th>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $small['id']; ?></td>
                <td><?php echo $small['name']; ?></td>
                <td><?php echo $small['minSize']; ?> km/h</td>
            </tr>
    </tbody>
    </table>

    <br><br>

    <h2>Largest Asteroid</h2>
    <table>
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Maximum Size</th>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $large['id']; ?></td>
                <td><?php echo $large['name']; ?></td>
                <td><?php echo $large['maxSize']; ?> km/h</td>
            </tr>
    </tbody>
    </table>

    <br><br>
</body>
</html>


