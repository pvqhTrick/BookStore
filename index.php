<?php include 'header.php'; ?>


    <h2>Danh sách sách</h2>
    <form method="GET" action="search.php">
        <input type="text" name="query" placeholder="Nhập từ khóa tìm kiếm">
        <input type="submit" value="Tìm kiếm">
    </form>
    
    <?php
        // Kiểm tra xem người dùng có quyền admin hay không
        if (isset($_SESSION["is_admin"]) && $_SESSION["is_admin"] === true) {
            echo '<a href="add_book.php">Thêm sách</a><br>';
        }
    ?>

    <div class="books">
        <?php
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
        
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="book">';
                echo '<img src="uploads/' . $row["image"] . '" alt="' . $row["title"] . '">';
                echo '<h3 class="title">' . $row["title"] . '</h3>';
                echo '<p>Author: ' . $row["author"] . '</p>';
                echo '<p class="description">' . $row["description"] . '</p>';
                echo '<p>Price: ' .$row["price"] .' VND'. '</p>';
                echo '<form method="POST" action="add_to_cart.php">';
                echo '<input type="hidden" name="book_id" value="' . $row["id"] . '">';
                echo '<input type="submit" value="Add to Cart"><br>';
                    if (isset($_SESSION["is_admin"]) && $_SESSION["is_admin"] === true) {
                        echo '<a href="edit_book.php?book_id=' . $row["id"] . '">Edit</a>';
                        echo '<a href="delete_book.php?book_id=' . $row["id"] . '">Delete</a>';
                }
                echo '</form>';
                echo '</div>';
            }
        } else {
            echo "NotFound";
        }

        mysqli_close($conn);
        ?>
    </div>

<?php include 'footer.php'; ?>