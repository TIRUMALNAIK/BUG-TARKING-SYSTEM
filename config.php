<?php

    $conn = mysqli_connect("localhost", "root", "", "bug-track");
    if(!$conn)
    {
        die ("Unable to connect database : ".mysqli_connect_error());
    }
?>