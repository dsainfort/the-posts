<?php
    /*
    * Redirect Helpers
    * Example - redirect('home.php');
    */
    function redirect ($page) {
        header('location:' . URLROOT . $page);
    }