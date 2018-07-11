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
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <?php
                        if (isset($preparedBook)):
                    ?>
                    <form action=".?action=update_book" method="post">
                        <div class="form-group">
                            <label for="">Book Id</label>
                            <input type="text" class="form-control" name="id" placeholder="id" value="<?php echo $preparedBook->getBookId();?>" readonly/>
                        </div>
                        <div class="form-group">
                            <label for="">Book Name</label>
                            <input type="text" class="form-control" name="name" placeholder="name" value="<?php echo $preparedBook->getName();?>" required/>
                        </div>
                        <div class="form-group">
                            <label for="">Book Author</label>
                            <input type="text" class="form-control" name="author" placeholder="author" value="<?php echo $preparedBook->getAuthor();?>" required/>
                        </div>
                        <div class="form-group">
                            <label for="">Book Publishing Year</label>
                            <input type="number" class="form-control" name="publishYear" placeholder="publishYear" value="<?php echo $preparedBook->getPublishYear();?>" required/>
                        </div>
                        <div class="form-group">
                            <label for="">Book Publishing Company</label>
                            <input type="text" class="form-control" name="production" placeholder="production" value="<?php echo $preparedBook->getProduction();?>" required/>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Update Book">
                    </form>  
                    <?php        
                        else:    
                    ?>

                    <form action=".?action=add_book" method="post">
                        <div class="form-group">
                            <label for="">Book Name</label>
                            <input type="text" class="form-control" name="name" placeholder="name" required/>
                        </div>
                        <div class="form-group">
                            <label for="">Book Author</label>
                            <input type="text" class="form-control" name="author" placeholder="author" required/>
                        </div>
                        <div class="form-group">
                            <label for="">Book Publishing Year</label>
                            <input type="number" class="form-control" name="publishYear" placeholder="publishYear" required/>
                        </div>
                        <div class="form-group">
                            <label for="">Book Publishing Company</label>
                            <input type="text" class="form-control" name="production" placeholder="production" required/>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Add Book">
                    </form>  
                    <?php
                        endif;
                    ?>   
                </div>
            </div>
        </div>   
    </main>
</body>
</html>