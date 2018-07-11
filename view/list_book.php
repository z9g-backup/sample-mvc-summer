<?php
    if (isset($search_query)) {
        $books = Book::searchBook($search_query);
    } else {
        $books = Book::getListBook();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        require_once("import_resources.php");
    ?>
    <title>List book</title>
</head>

<body>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="?action=search_book" method="post">
                        <div class="active-purple-4 mb-4 input-group">
                            <input class="form-control" type="text" name="query" placeholder="Search" aria-label="Search">
                            <div class="input-group-btn">
                                <div class="btn-group" role="group">
                                    <button type="submit" class="btn btn-primary">
                                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Book Id</th>
                                    <th>Name</th>
                                    <th>Author</th>
                                    <th>Publishing Year</th>
                                    <th>Production</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($books as $key=>$value):
                                ?>
                                <tr>
                                    <?php
                                        echo "<td>{$value->getBookId()}</td>";
                                        echo "<td>{$value->getName()}</td>";
                                        echo "<td>{$value->getAuthor()}</td>";
                                        echo "<td>{$value->getpublishYear()}</td>";
                                        echo "<td>{$value->getProduction()}</td>";
                                        
                                    ?>
                                    <td>
                                        <a href="?action=update_form_book&bookId=<?php echo $value->getBookId()?>">
                                            <button class="btn btn-warning">
                                                <span class="glyphicon glyphicon-edit"></span> Update book</button>
                                        </a>
                                        <a href="?action=delete_book&bookId=<?php echo $value->getBookId()?>">
                                            <button class="btn btn-danger">
                                                <span class="glyphicon glyphicon-remove"></span> Delete book</button>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                                    echo "</tr>";
                                    endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <a href=".?action=add_form_book">
                        <button class="btn btn-success">Add book</button>
                    </a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>