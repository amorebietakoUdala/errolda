<?php
header('Content-Type: text/html; charset=utf-8');

require '../vendor/autoload.php';

$dsn = 'DSN=padron';

$connection = odbc_connect("DSN=padron","","d150lantik");

try {
    $connPdo = new PDO($dsn);
} catch (PDOException $e) {
    echo $e->getMessage() . '</br>';
}

$config = new \Doctrine\DBAL\Configuration();
$connectionParams = array(
    'user'     => "Admin",
    'password' => "d150lantik",
    'pdo'      => $connPdo,
    'driverClass' => 'Royopa\Doctrine\DBAL\Driver\MSAccess\Driver\Driver',
);

$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);

$sql = 'SELECT * FROM myTable';
$stmt = $conn->query($sql);

while ($row = $stmt->fetch()) {
    echo $row['columnName'] . '</br>';
}