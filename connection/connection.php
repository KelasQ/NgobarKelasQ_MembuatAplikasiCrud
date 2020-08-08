<?php 

$conn = new mysqli('localhost', 'root', '', 'appcrud');

if (!$conn) {
	exit();
}