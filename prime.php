<?php

    //if number is a number, and is greater than 0, and if it's a whole number (rounds to the same value/no decimal places)
    if(is_numeric($_GET['number']) && $_GET['number'] > 0 && $_GET['number'] == round($_GET['number'], 0)){
        $i = 2;
        $isPrime = true;
        
        //while incremented var is less than num
        //all nums are divisible by 1 so start at 2
        while ($i < $_GET['number']) {
            if ($_GET['number'] % $i == 0) { //can be divisible by a number
                $isPrime = false;
            }
            $i++;
        }
        
        if ($isPrime) {
            echo "<p>".$i." is a prime number!</p>";
        } else {
            echo "<p>".$i." is not prime.</p>";
        }  
        
    } else if ($_GET) {
        echo "<p>Please enter a positive whole number.</p>";
    }
?>

<p>Please enter a whole number.</p>

<form>
    <input name="number" type="text">
    <input type="submit" value="Go!">
</form>