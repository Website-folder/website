<?php
$username = $_POST['username'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phoneCode = $_POST['phoneCode'];
$phone = $_POST['phone'];

if (!empty($username) || !empty($password) ||!empty($gender) || !empty($email) || !empty($phoneCode) || !empty($phone)){
    $host = "localhost"; 
    $dbusername = "krxugfqu_register2"; 
    $dbpassword = "CodelyokO8888"; 
    $dbname = "krxugfqu_register1"; 
    
    //create connection 
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname); 
    
    
    if (mysqli_connect_error()){
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error()); 
    }else{
       
        $SELECT = "SELECT email From register Where email = ? limit 1"; 
        $INSERT = "INSERT Into register (username, password, gender, email, phoneCode, phone) values (?, ?, ?, ?, ?, ?)"; 
        
        //prepare statement 
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $email); 
        $stmt->execute();
        $stmt->bind_result($email); 
        $stmt->store_result();
        $rnum = $stmt->num_rows;
        
        if ($rnum==0){
            $stmt->close(); 
            
            $stmt = $conn->prepare($INSERT); 
            $stmt->bind_param("ssssii", $username, $password, $gender, $email, $phoneCode, $phone); 
            $stmt->execute();
            echo "new record inserted sucessfully";
        }else{
            echo "Someone already register using that email";
        }
    }
    $stmt->close();
    $conn->close();
    
}else{
    echo "All fields are required"; 
}
?>