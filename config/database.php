<?php
/**
 * Database Configuration
 */

$servername = 'localhost';
$username   = 'root';
$password   = '';
$dbname     = 'randomjokes';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die('DB CONNECTION FAILED: ' . $conn->connect_error);
}