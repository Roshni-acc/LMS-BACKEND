<?php

//functionality to add and manage books 

// function to store book



// function to get all the counts
function getCounts($conn)
{
    $counts = array(
        'total_books' => 0,
        'total_students' => 0,
        'total_loans' => 0,
        'total_amount' => 0,
        

    );

    // get books counts
     $sql = "SELECT count(id) as total_books from books";
    $result = $conn->query($sql);
    if($result->num_rows> 0){
        $books= mysqli_fetch_assoc($result);
        $counts['total_books']=$books['total_books'];

    }
    //get students counts
    $sql = "SELECT count(id) as total_students from students";
    $result = $conn->query($sql);
    if($result->num_rows> 0){
        $books= mysqli_fetch_assoc($result);
        $counts['total_students']=$books['total_students'];


    }

    //get loans count
    $sql = "SELECT count(id) as total_loans from book_loans";
    $result = $conn->query($sql);
    if($result->num_rows> 0){
        $books= mysqli_fetch_assoc($result);
        $counts['total_loans']=$books['total_loans'];

    }
    $sql = "SELECT sum(amount) as total_amount from subscription";
    $result = $conn->query($sql);
    if($result->num_rows> 0){
        $books= mysqli_fetch_assoc($result);
        $counts['total_amount']=$books['total_amount'];

    }
    

    return $counts;
}

function getTabData($conn)
{
    $tabs = array(
        'students' => array(),
        'loans' => array(),
        'subscription' => array(),
        
        

    );

    //get  recent students 
    $sql = "SELECT * from students order by id desc limit 5";
    $result = $conn->query($sql);
    if($result->num_rows> 0){
        while($rows = $result->fetch_assoc()){
        $tabs['students'] [] = $rows;
        }
    }

    // get recent loans
    $sql = "SELECT l.*, b.title AS book_title, s.name AS student_name  
    FROM book_loans l 
    INNER JOIN books b ON b.id = l.book_id
    INNER JOIN students s ON s.id = l.student_id  -- Fixed Here
    ORDER BY l.id DESC limit 5 ";

    $result = $conn->query($sql);
    if($result->num_rows> 0){
        while($rows = $result->fetch_assoc()){
        $tabs['loans'] [] = $rows;
        }
    }
    
    // get recent subcription
    $sql  = "select s.*, p.title as plan_name, st.name as student_name 
        from subscription s
        inner join subscription_plans p on p.id = s.plan_id
        inner join students st on st.id = s.student_id  order by s.id desc limit 5";

    
    $result = $conn->query($sql);
    if($result->num_rows> 0){
        while($rows = $result->fetch_assoc()){
        $tabs['subscription'] [] = $rows;
        }
    }



    return $tabs;
}


function getBooksById($conn,$id)
{
     $sql = "SELECT * from books where id = '$id' ";
    $result = $conn->query($sql);
    return $result;
}




//function to get categories
function getCategories($conn){
     
    $sql = "SELECT id , Name from categories";
    $result =  $conn->query($sql);
    return $result;
}










?>