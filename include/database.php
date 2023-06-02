<?php
$servername = mysqli_connect("localhost", "root", "", "StronaWWW");

if(!$servername)
{
    die("Brak połączenia z bazą danych: " .mysqli_connect_error());
}
