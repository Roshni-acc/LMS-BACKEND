<?php

function create($conn,$param){
   
    extract($param);
    $errors = [];

    # Server-side validation
    if (empty($book_id)) {
        $errors[] = "books selection  is required";
    } 

    if (empty($student_id)) {
        $errors[] = "student selection is required";
    }
    
    # If there are errors, return them all
    if (!empty($errors)) {
        return ["error" => $errors];
    }
    
    # validation stops
    $datetime= date ("Y-m-d H:i:s");
    
    $sql = "INSERT INTO book_loans (book_id,student_id,loan_date, return_date ,created_at)
                VALUES ($book_id,$student_id,'$loan_date','$return_date','$datetime')";
                   $result ['success']=  $conn->query($sql);
                   return $result;
                //  conn is database object and param is form or post request  object

}

function getloans($conn) {
    $sql = "SELECT l.*, b.title AS book_title, s.name AS student_name  
            FROM book_loans l 
            INNER JOIN books b ON b.id = l.book_id
            INNER JOIN students s ON s.id = l.student_id  -- Fixed Here
            ORDER BY l.id DESC";

    $result = $conn->query($sql);  

    if (!$result) {
        die("Query Error: " . $conn->error);  // Debugging output
    }
    return $result;  // Return the MySQLi result directly
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


// function to get all the students  in loans 
function getStudents($conn){
    {
        $sql = "SELECT id,Name FROM students  ";
       $result = $conn->query($sql);
       return $result;
   }
}
//to get books in loans 
function getBooks($conn){
    {
        $sql = "SELECT id,title FROM books  ";
       $result = $conn->query($sql);
       return $result;
   }
}

function deleteloans($conn,$id){
    $sql= "delete from book_loans where id = '$id' ";
    $result = $conn->query($sql);
    return $result;
}
function  updateLoanStatus($conn,$id,$is_return){
    $sql =  " update book_loans set is_return = '$is_return' where id = '$id' ";
    $result = $conn->query ($sql);
    return $result;
}

//get students by id 
function getLoanId($conn, $id){
    $sql = "SELECT * from book_loans where id = '$id' ";
    $result = $conn->query($sql);
    return $result;
}

//update student details 
function updateLoan($conn, $param){

    extract($param);
    $errors = [];

    # Server-side validation
    if (empty($book_id)) {
        $errors[] = "books selection  is required";
    } 

    if (empty($student_id)) {
        $errors[] = "student selection is required";
    }
    
    # If there are errors, return them all
    if (!empty($errors)) {
        return ["error" => $errors];
    }
    
    # validation stops
    $datetime= date ("Y-m-d H:i:s");
    
    
    $sql = "UPDATE book_loans SET book_id = '$book_id' ,student_id = '$student_id' ,loan_date = '$loan_date', return_date = '$return_date' ,updated_at = '$datetime' 
    WHERE id = '$id'";
     # Execute the query and return success/failure message

    
     $result ['success'] = $conn->query($sql);
     return $result;
}


?>