<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        require_once("import_resources.php");
    ?>
    <title>Book</title>
</head>
<body>
    <main>
        <?php
            if (isset($preparedBook)):
        ?>
        <form action=".?action=update_book" method="post">
            <input type="text" name="id" placeholder="id" value="<?php echo $preparedBook->getBookId();?>" readonly/>
            <input type="text" name="name" placeholder="name" value="<?php echo $preparedBook->getName();?>" required/>
            <input type="text" name="author" placeholder="author" value="<?php echo $preparedBook->getAuthor();?>" required/>
            <input type="number" name="publishYear" placeholder="publishYear" value="<?php echo $preparedBook->getPublishYear();?>" required/>
            <input type="text" name="production" placeholder="production" value="<?php echo $preparedBook->getProduction();?>" required/>
            <input type="submit" value="Update Book">
        </form>  
        <?php        
            else:    
        ?>

        <form action=".?action=add_book" method="post">
            <input type="text" name="name" placeholder="name" required/>
            <input type="text" name="author" placeholder="author" required/>
            <input type="number" name="publishYear" placeholder="publishYear" required/>
            <input type="text" name="production" placeholder="production" required/>
            <input type="submit" value="Add Book">
        </form>  
        <?php
            endif;
        ?>      
    </main>
</body>
</html>