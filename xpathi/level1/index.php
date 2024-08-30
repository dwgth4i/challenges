<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Search</title>
</head>
<body>
    <h1>Objective: Find a flag somewhere in the XML document</h1>
    <h1>Search for a Book</h1>
    <form method="GET" action="">
        <label for="search">Enter search term:</label>
        <input type="text" id="search" name="s" required>
        <input type="submit" value="Search">
    </form>

    <?php

    $xml = simplexml_load_file('data1.xml') or die("Error: Cannot create object");



    if (isset($_GET["s"])) {

        $query = "/library/book[contains(title/text(),'" . $_GET["s"] . "')]";
        
        $result = $xml->xpath($query);

        if ($result) {
            echo "<h2>Search Results:</h2>";
            foreach ($result as $node) {
                echo "<div>";
                foreach ($node as $key => $value) {
                    echo "<p><strong>" . ucfirst($key) . ":</strong> " . htmlspecialchars($value) . "</p>";
                }
                echo "</div><hr/>";
            }
        } else {
            echo "<h2>No results found for " . htmlspecialchars($_GET["s"]) . "</h2>";
        }
    }
    ?>
</body>
</html>
