<?php

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
        case 'list_book':
            include_once("../view/list_book.php");
            break;
        case 'add_book':
            include_once("../view/add_book.php");
            break;
        case 'search_book':
            include_once("../view/search_book.php");
            break;
        case 'update_book':
            include_once("../view/update_book.php");      
            break;      
        default:
            echo "aaa";    
    }



?>