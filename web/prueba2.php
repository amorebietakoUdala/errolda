<?php
header('Content-Type: text/html; charset=utf-8');

require '../vendor/autoload.php';

$dsn = 'odbc:Driver={Microsoft Access Driver (*.mdb, *.accdb)};Dbq=C:\Users\ibilbao\Desktop\DBWPAYTO-converted-nopassword.mdb;';

try {
    $connPdo = new PDO($dsn);
} catch (PDOException $e) {
    echo $e->getMessage() . '</br>';
}

$config = new \Doctrine\DBAL\Configuration();
$connectionParams = array(
    'user'     => null,
    'password' => null,
    'pdo'      => $connPdo,
    'driverClass' => 'Royopa\Doctrine\DBAL\Driver\MSAccess\Driver\Driver',
);

$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);

$sql = 'SELECT * FROM TBWPHABI';
$stmt = $conn->query($sql);

while ($row = $stmt->fetch()) {
    echo $row['HANOMBRE'] . '</br>';
}
