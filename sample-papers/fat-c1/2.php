<!DOCTYPE html>

<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>2Q | C2 FAT</title>
    </head>

    <body>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Country</th>
                <th>Credits</th>
            </tr>
            <?php
                $hostname = "localhost";
                $username = "root";
                $password = "shyam1947";
                $database = "work";

                $mysql = mysqli_connect($hostname, $username, $password, $database);
                if(!$mysql) {
                    die("Failed to establish connection");
                }
                else {
                    $query = "SELECT * FROM costumer ORDER BY name DESC, id ASC; ";
                    $result = mysqli_query($mysql, $query);

                    while($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['country'] ?></td>
                                <td><?php echo $row['credits'] ?></td>
                            </tr>
                        <?php
                    }
                }
            ?>
        </table>
    </body>
</html>