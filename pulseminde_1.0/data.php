<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css?v=1.0">
</head>
<body>
    <a href=index.html><h1>&#x21d0; back</h1></a>
    <table style="border: 1px solide white ;  text-align: center; font-size: 20px; width:100%;" >
        <thead>
            <tr style=background-color:black>
                <th>Tsest ID</th>
                <th>Temperature</th>
                <th>Pulse rate</th>
                <th>stress index</th>
                <th>Date</th>
                <th>Time</th>
            </tr>
        </thead>

        <tbody>
            <?php 
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "pulsemind";

            $connection = new mysqli($servername, $username, $password, $database);

            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }
            
            // Modify the SQL query to order by 'id' in descending order
            $sql = "SELECT * FROM esp32 ORDER BY testid DESC";
            $result = $connection->query($sql);

            if(!$result) {
                die("Invalid query:" . $connection->error);
            }

            while($row = $result->fetch_assoc()){
                echo "<tr>
                    <td>".$row["testid"] ."</td>
                    <td>".$row["temp"] ."</td>
                    <td>".$row["heartrate"] ."</td>
                    <td>".$row["stressindex"] ."</td>
                    <td>".$row["date"] ."</td>
                    <td>".$row["time"] ."</td>
                </tr>";
            }  
            ?>
        </tbody>
    </table>
</body>
</html>
