
<?php

    function convertCurrency($price) {
        $result = $price;
        if(($result%10) == 0) {
            $result =number_format(--$result).'.99';
        } else {
            number_format($price);
        }
        return '₪'.$result;
    }