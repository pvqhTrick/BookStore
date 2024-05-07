<?php
class Book
{
    public $IdBook;
    public $IdCategory;
    public $Title;
    public $Author;
    public $Description;
    public $ImageURL;
    public $Price;
    public $Quantity;
  
    public function getData()
    {
        $servername = "localhost";
        $db_username = "root";
        $db_password = "";
        $database = "bookstore";

        $conn = mysqli_connect($servername, $db_username, $db_password, $database);

        if (!$conn) {
            die("False connect to DB: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM books";
        $result = mysqli_query($conn, $sql);
        while (mysqli_num_rows($result) > 0 ){
            
        }
        return new Book($this->IdBook, $this->IdCategory, $this->Title, $this->Author, $this->Description, $this->ImageURL, $this->Price, $this->Quantity);
    }

}
?>