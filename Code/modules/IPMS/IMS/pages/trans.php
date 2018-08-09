<?php

// php code to search data in mysql database and set it in input text

if(isset($_POST['search']))
{
    // id to search
    $id = $_POST['id'];
    
    // connect to mysql
    $connect = mysqli_connect("localhost", "root", "","test_db");
    
    // mysql search query
    $query = "SELECT `fname`, `lname`, `age` FROM `users` WHERE `id` = $id LIMIT 1";
    
    $result = mysqli_query($connect, $query);
    
    // if id exist 
    // show data in inputs
    if(mysqli_num_rows($result) > 0)
    {
      while ($row = mysqli_fetch_array($result))
      {
        $fname = $row['fname'];
        $lname = $row['lname'];
        $age = $row['age'];
      }  
    }
    
    // if the id not exist
    // show a message and clear inputs
    else {
        echo "Undifined ID";
            $fname = "";
            $lname = "";
            $age = "";
    }
    
    
    mysqli_free_result($result);
    mysqli_close($connect);
    
}

// in the first time inputs are empty
else{
    $fname = "";
    $lname = "";
    $age = "";
}


?>

<!DOCTYPE html>

<html>

    <head>

        <title> PHP FIND DATA </title>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>

    <body>

    <form action="php_search_in_mysql_database.php" method="post">

        Id:<input type="text" name="id"><br><br>

        First Name:<input type="text" name="fname" value="<?php echo $fname;?>"><br>
<br>

        Last Name:<input type="text" name="lname" value="<?php echo $lname;?>"><br><br>

        Age:<input type="text" name="age" value="<?php echo $age;?>"><br><br>

        <input type="submit" name="search" value="Find">

           </form>

    </body>

</html>