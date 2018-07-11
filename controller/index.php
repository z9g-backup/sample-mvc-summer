<?php
    ;
    include_once("../model/Book.php");
    $con = mysqli_connect("192.168.10.10","homestead","secret","mvc_sample");

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
            // include_once("../view/search_book.php");
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
            $book = new Book(0, $_POST['name'], $_POST['author'], $_POST['publishYear'], $_POST['production']);
            Book::add($book);
            header("Location: /");
            break;
        case 'update_book':
            $book = new Book($_POST['id'], $_POST['name'], $_POST['author'], $_POST['publishYear'], $_POST['production']);
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