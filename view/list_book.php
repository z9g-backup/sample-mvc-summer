<?php
    $books = Book::getListBook();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List book</title>
</head>
<body>
    <main>
        <table>
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
                </tr>
                <?php
                    echo "</tr>";
                    endforeach ;
                ?>
            </tbody>
        </table>
    </main>
</body>
</html>