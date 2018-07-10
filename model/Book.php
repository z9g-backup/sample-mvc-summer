<?php
class Book{
    private $bookId;
	private $name;
    private $author;
    private $publishYear;
    private $production;

    public function __construct($id, $name, $author, $publishYear, $production)
    {
        $this->bookId = $id;
        $this->name = $name;
        $this->author = $author;
        $this->publishYear = $publishYear;
        $this->production = $production;
    }

    
    

    /**
     * Get the value of bookId
     */ 
    public function getBookId()
    {
        return $this->bookId;
    }

    /**
     * Set the value of bookId
     *
     * @return  self
     */ 
    public function setBookId($bookId)
    {
        $this->bookId = $bookId;

        return $this;
    }

    

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    

    /**
     * Get the value of author
     */ 
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set the value of author
     *
     * @return  self
     */ 
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }
    

    /**
     * Get the value of publishYear
     */ 
    public function getPublishYear()
    {
        return $this->publishYear;
    }

    /**
     * Set the value of publishYear
     *
     * @return  self
     */ 
    public function setPublishYear($publishYear)
    {
        $this->publishYear = $publishYear;

        return $this;
    }

    /**
     * Get the value of production
     */ 
    public function getProduction()
    {
        return $this->production;
    }

    /**
     * Set the value of production
     *
     * @return  self
     */ 
    public function setProduction($production)
    {
        $this->production = $production;

        return $this;
    }

    public static function getListBook(){
        global $con;
        $sql = "select * from book";
        $result = mysqli_query($con, $sql);

        $books = [];
        foreach ($result as $key=>$value) {
            $book = new Book($value['id'],$value['name'],$value['author'],$value['publish_year'],$value['production']);
            $books[] = $book;
        }
        return $books;
    }

    public static function get($id){
        
        global $con;
        $sql = "select * from book where id = $id";
        $result = mysqli_query($con, $sql);
        
        if (mysqli_num_rows($result) > 0){
            $value = mysqli_fetch_assoc($result);
            $book = new Book($value['id'],$value['name'],$value['author'],$value['publish_year'],$value['production']);
            return $book;
        }
        return 0;
    }

    public static function add($book)
    {
        global $con;
        $sql = "insert into book('name','author','publish_year','production') values 
            ({$book->getName()},{$book->getAuthor()},{$book->getPublishYear()},{$book->getProduction()})";
        $result = mysqli_query($con, $sql);    
    }

    public static function searchBook($query){
        global $con;
        $sql = "select * from book where name like";
        $result = mysqli_query($con, $sql);

        $books = [];
        foreach ($result as $key=>$value) {
            $book = new Book($value['id'],$value['name'],$value['author'],$value['publish_year'],$value['production']);
            $books[] = $book;
        }
        return $books;
    }
}
?>