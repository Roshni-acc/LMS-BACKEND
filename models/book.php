<?php

//functionality to add and manage books 

// function to store book
function storeBook($conn, $param) {
    extract($param);
    $errors = [];

    # Server-side validation
    if (empty($title)) {
        $errors[] = "Title is required";
    } elseif (!preg_match('/^[A-Z][a-zA-Z0-9\s]+$/', $title)) {
        $errors[] = "Title must start with a capital letter and contain only letters, numbers, and spaces.";
    }


    if (empty($author)) {
        $errors[] = "Author is required";
    } elseif (!preg_match('/^[A-Z][a-zA-Z\s]+$/', $author)) {
        $errors[] = "Author name must start with a capital letter and contain only letters and spaces.";
    }


    if (empty($ISBN)) {
        $errors[] = "ISBN is required";
    } elseif (!ctype_digit($ISBN) || strlen($ISBN) != 13) { 
        $errors[] = "ISBN must be exactly 13 numeric digits.";
    }

    if (isISBNUnique($conn, $ISBN)) {
        $errors[] = "This ISBN already exists";
    }

    if (isSameBookTitle($conn, $title)) {
        $errors[] = "This book title already exists";
    }

    # If there are errors, return them all
    if (!empty($errors)) {
        return ["error" => $errors];
    }
    
   

    # Formatting the title and author name
    $title = ucwords($title);
    $author = ucwords($author);

    

    # validation stops
    $datetime= date ("Y-m-d H:i:s");
    
    $sql = "INSERT INTO books (title,author,publication_year, ISBN , category_id ,created_at)
                VALUES ('$title','$author','$publication_year','$ISBN',$category_id,'$datetime')";
                   $result ['success']=  $conn->query($sql);
                   return $result;
                //  conn is database object and param is form or post request  object

}


//function to get categories
function getCategories($conn){

    $sql = "SELECT id , Name from categories";
    $result =  $conn->query($sql);
    return $result;
}
function getallBooks($conn)
{
     $sql = "SELECT b.* ,c.Name as cat_name FROM books b left join categories c on c.id = b.category_id 
      ORDER BY id DESC";
    $result = $conn->query($sql);
    return $result;
}
function getBooksById($conn,$id)
{
     $sql = "SELECT * from books where id = '$id' ";
    $result = $conn->query($sql);
    return $result;
}


// function to ensure that ISBN is unique
function isISBNUnique($conn,$ISBN , $id = NULL){
    $sql = "SELECT id  from books where ISBN = '$ISBN'";
    
    if($id){
        $sql .= "and id != $id";
    }
    
    $result =  $conn->query($sql);
    if($result->num_rows >0){
        return true;
    }
    else return false;

}

// function to check the same the book title 
function issameBookTitle($conn,$title){
    $sql = "SELECT id from books where title = '$title'";
    $result = $conn->query($sql);
    if($result->num_rows> 0){
        return true ;
    }
    else return false;
}

//function to delete the books 
function  deleteBooks($conn,$id){
    $sql= "delete from books where id = '$id' ";
    $result = $conn->query($sql);
    return $result;
}


function updateBooksStatus($conn , $id , $status){

    $sql =  " update books set status = '$status' where id = '$id' ";
    $result = $conn->query ($sql);
    return $result;
}


function updateBook($conn, $param) {
    extract($param);
    # Server-side validation
    if (empty($title)) {
        $errors[] = "Title is required";
    } elseif (!preg_match('/^[A-Z][a-zA-Z0-9\s]+$/', $title)) {
        $errors[] = "Title must start with a capital letter and contain only letters, numbers, and spaces.";
    }

   elseif (empty ($ISBN)){
    $result = array ("error"=>"ISBN is required");
    return $result;
   }
   elseif (isISBNUnique($conn,$ISBN,$id)){
    $result = array ("error"=>"ISBN is already registered ");
    return $result;
   }
   elseif (empty($author)) {
    $errors[] = "Author is required";
} elseif (!preg_match('/^[A-Z][a-zA-Z\s]+$/', $author)) {
    $errors[] = "Author name must start with a capital letter and contain only letters and spaces.";
}

if (empty($publication_year) || !is_numeric($publication_year) || strlen($publication_year) != 4) {
    $errors[] = "Valid 4-digit publication year is required";
}


$title = ucwords($title);
$author = ucwords($author);

    # validation stops
    $datetime= date ("Y-m-d H:i:s");
    
    $sql = "UPDATE books SET title = '$title' ,author = '$author' ,publication_year = '$publication_year', ISBN = '$ISBN', category_id = $category_id ,updated_at = '$datetime' 
    WHERE id = '$id'";
     # Execute the query and return success/failure message
     if ($conn->query($sql)) {
        return ["success" => "Book updated successfully"];
    } else {
        return ["error" => "Database update failed: " . $conn->error];
    }
}




?>