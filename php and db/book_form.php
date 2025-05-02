
<h2>Add Book</h2>
<form method="POST">
    Accession No: <input type="number" name="accession_no" required><br><br>
    Title: <input type="text" name="title" required><br><br>
    Authors: <input type="text" name="authors" required><br><br>
    Edition: <input type="text" name="edition" required><br><br>
    Publisher: <input type="text" name="publisher" required><br><br>
    <input type="submit" name="add" value="Add Book">
</form>

<hr>

<h2>Search Book by Title</h2>
<form method="POST">
    Title: <input type="text" name="search_title" required>
    <input type="submit" name="search" value="Search">
</form>

<?php
// Connect to MySQL
$conn = new mysqli("localhost", "root", "", "library");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle Add Book
if (isset($_POST['add'])) {
    $a = $_POST['accession_no'];
    $t = $_POST['title'];
    $au = $_POST['authors'];
    $e = $_POST['edition'];
    $p = $_POST['publisher'];

    $sql = "INSERT INTO books (accession_no, title, authors, edition, publisher)
            VALUES ('$a', '$t', '$au', '$e', '$p')";

    if ($conn->query($sql) === TRUE) {
        echo "<br>Book added successfully!";
    } else {
        echo "<br>Error: " . $conn->error;
    }
}

// Handle Search
if (isset($_POST['search'])) {
    $search = $_POST['search_title'];
    $sql = "SELECT * FROM books WHERE title LIKE '%$search%'";
    $result = $conn->query($sql);

    echo "<h3>Search Results:</h3>";
    if ($result->num_rows > 0) {
        echo "<table border='1' cellpadding='5'>
                <tr><th>Accession No</th><th>Title</th><th>Authors</th><th>Edition</th><th>Publisher</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['accession_no']}</td>
                    <td>{$row['title']}</td>
                    <td>{$row['authors']}</td>
                    <td>{$row['edition']}</td>
                    <td>{$row['publisher']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "No books found with that title.";
    }
}

$conn->close();
?>
