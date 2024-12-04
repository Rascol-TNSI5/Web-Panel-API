<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST['data']; 
    echo $data
} else {
    echo "c pas une post";
}
?>
