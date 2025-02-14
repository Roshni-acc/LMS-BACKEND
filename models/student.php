<?php

function create($conn,$param){
   
    extract($param);
    $errors = [];

    # Server-side validation
    if (empty($Name)) {
        $errors[] = "Name is required";
    } elseif (!ctype_upper($Name[0])) {
        $errors[] = "The first letter of the name must be capitalized";
    }

    if (empty($email)) {
        $errors[] = "email is required";
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    } 
    if (isEmailUnique($conn, $email)) {
        $errors[] = "This email  already exists";
    }

    if (empty($phone_no)) {
        $errors[] = "phone no . is required";
    }
    elseif (!preg_match('/^\d{10}$/', $phone_no)) {
        $errors[] = "Phone number must be exactly 10 digits";
    }

    if (empty($address)) {
        $errors[] = "address  is required";
    }
    if (isPhoneUnique($conn, $phone_no)) {
        $errors[] = "This phone no  already exists";
    }

    # If there are errors, return them all
    if (!empty($errors)) {
        return ["error" => $errors];
    }


    

    # validation stops
    $datetime= date ("Y-m-d H:i:s");
    
    $sql = "INSERT INTO students (Name,phone_no,email, address ,created_at)
                VALUES ('$Name','$phone_no','$email','$address','$datetime')";
                   $result ['success']=  $conn->query($sql);
                   return $result;
                //  conn is database object and param is form or post request  object

}


function isEmailUnique($conn,$email,$id = NULL){

    $sql = "select id from students where email='$email'";
    if($id){
        $sql .= " and id != $id";

    }
   $result = $conn->query($sql);
   if($result->num_rows > 0 ){

    return true ;
   }
   else return false;


}

function isPhoneUnique($conn, $phone_no,$id = NULL)
{
    $sql = "select id from students where phone_no ='$phone_no'";
    if($id){
        $sql .= " and id != $id";

    }
   $result = $conn->query($sql);
   if($result->num_rows > 0 ){

    return true ;
   }
   else return false;
}




?>