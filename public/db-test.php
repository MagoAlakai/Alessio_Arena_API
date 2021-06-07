<?php

        $servername = "alessio-arena-db";  
        $username = "root";
        $password = "xz32NNgr45!";
        
        try {
          $conn = new PDO("mysql:host=$servername;dbname=jwt", $username, $password);
          // set the PDO error mode to exception
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          echo( "Connected successfully" );
        } catch(PDOException $e) {
          echo( $e->getMessage() );
        }