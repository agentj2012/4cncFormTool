<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
      //get data
      $username = $_POST['username'];
      $password = $_POST['password'];

      //connect to database
      $host = "sql212.ezyro.com";
      $dbuser = "ezyro_36067300";
      $dbpsw = "a8822dc5f";
      $dbname = "ezyro_36067300_logininfo";

      $conn = new mysqli($host, $dbuser, $dbpsw, $dbname);
        if ($conn->connect_error){
            die("Connection Failed: ". $conn->connect_error);
        };
      //validate
      $query = "SELECT * FROM login WHERE username='$username' AND password='$password'";

      $result = $conn->query($query);

      if($result->num_rows == 1) {
        //login success
        header("Location: main.html");
        exit();
      }
      else{
        //Login Failed
        header("Location: login.html");
        exit();
      }

      $conn->close();

    };
    ?>