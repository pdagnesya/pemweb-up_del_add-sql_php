<?php 

function connection() {
   // membuat konekesi ke database system
   $dbServer = 'localhost';
   $dbUser = 'root';
   $dbPass = '';
   $dbName = "classicmodels";
   $dbPort = "3307";

   $conn = mysqli_connect($dbServer, $dbUser, $dbPass,$dbName,$dbPort);

   if(! $conn) {
	die('Koneksi gagal: ' . mysqli_error());
   }
   //memilih database yang akan dipakai
	
   return $conn;
}