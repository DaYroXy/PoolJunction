<?php

    // Simple page redirect.    
    function redirect($location = '') {
        die(header("location: ".URLROOT."/".$location));
    }

    