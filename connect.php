<?php

   $dbhost = "localhost";
   $dbuser = "root";
   $dbpass = "";
   $dbname = "book_store";

   $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

   if(!$conn){

        die("Somthing Wrong in Connection");
   }