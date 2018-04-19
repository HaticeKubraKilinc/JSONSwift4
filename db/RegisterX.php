<?php

$con=mysqli_connect("localhost","root","password","Twitter");
 
// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
  $sql = "SELECT * FROM  user";
 
// // Check if there are results
 if ($result = mysqli_query($con, $sql))
 {
   
 $data = mysqli_fetch_array($result, MYSQLI_NUM);
if($data[0] > 1) {
    echo "User Already in Exists<br/>";
}



//	require('serviceX.php');
    // If the values are posted, insert them into the database.
    else if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['fullname'])){
         //   echo "bbbbbbbbbb";

        $username = $_POST['username'];
	    $email = $_POST['email'];
        $password = $_POST['password'];
         $fullname = $_POST['fullname'];
 
        $query = "INSERT INTO user (username, password, email, fullname) VALUES ('$username', '$password', '$email' , '$fullname')";

     //   echo $query;

        $result = mysqli_query($con, $query);
        if($result){
            echo  "User Created Successfully.";
        }else{
           echo "User Registration Failed";
        }
    }

   }
   else{
    echo "kullanıcı eklenemedi var olan kullanıcıların json formatındaki görüntüsü";
    // If so, then create a results array and a temporary one
    // to hold the data
    $resultArray = array();
    $tempArray = array();
 
    // Loop through each row in the result set
    while($row = $result->fetch_object())
    {
        // Add each row into our results array
        $tempArray = $row;
        array_push($resultArray, $tempArray);
    }
 
    // Finally, encode the array to JSON and output the results
    echo json_encode($resultArray);
   }


    ?>