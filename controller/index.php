<?php
    ;
    include_once("../model/Book.php");
    $con = mysqli_connect("192.168.10.10","homestead","secret","mvc_sample");
    mysqli_set_charset($con,"utf8");
    // mysqli_query($con,'set name utf8');

    if (!$con)
    {
        die("Connection error: " . mysqli_connect_error());
    }

    $action = filter_input(INPUT_GET,'action');
    if (empty($action)) {
        $action = filter_input(INPUT_POST,'action');
        if (empty($action))
            $action = "list_book";
    }
    
    switch ($action) {
        case 'search_book':
            // include_once("../view/search_book.php");//merge search_book with list_book view
            $search_query = filter_input(INPUT_POST, 'query');
            if (empty($search_query))
            {
                header("Location: /");
                break;
            }
        case 'list_book':
            include_once("../view/list_book.php");
            break;
        case 'add_form_book':
            include_once("../view/add_form_book.php");
            break;
        case 'update_form_book':
            $preparedBook = Book::get(filter_input(INPUT_GET,'bookId'));
            include_once("../view/add_form_book.php");      
            break;
        case 'add_book':
            $book = new Book(0, mysqli_real_escape_string($con, $_POST['name']), mysqli_real_escape_string($con, $_POST['author']), 
                        $_POST['publishYear'], mysqli_real_escape_string($con, $_POST['production']));
            Book::add($book);
            header("Location: /");
            break;
        case 'update_book':
            $book = new Book($_POST['id'], mysqli_real_escape_string($con, $_POST['name']), mysqli_real_escape_string($con, $_POST['author']), 
                        $_POST['publishYear'], mysqli_real_escape_string($con, $_POST['production']));
            Book::update($book);
            header("Location: /");
            break;        
        case 'delete_book';
            $bookId = filter_input(INPUT_GET, 'bookId');
            Book::delete($bookId);
            header("Location: /");
            break;    
        default:
            echo "404 NOT FOUND";    
    }



?>