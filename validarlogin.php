<?php
                $servername = "localhost";
                $username = "root"; 
                $password = "root";
                $dbname = "tuchefacasa.com";

                // Create connection
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "SELECT email, pass FROM cliente WHERE "
                        . "email='".$_GET['email']."' AND pass='".$_GET['pass']."';";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    echo "loguead";
                } else {
                    echo "error, no existes";
                }

                mysqli_close($conn);
?>
