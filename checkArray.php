<?php
    
    if ($_POST) {
        $names = array("kenzie123", "evan666");
        
        $isKnown = false;
        
        foreach ($names as $value) //skip key part because we only care about vals       
        {
            if ($value == $_POST['name']) {
                $isKnown = true;
            }
            //if POST does not contain one of the array elements, it's false
        }
        
        if ($isKnown) {
            echo "Hello, ".$_POST['name']."!";
        }
        else {
            echo "I don't know you.";
        }    
    }
?>

<form method="post">
    <p>What is your name?</p>
    <input name="name" type="text">
    <input type="submit" value="Go!">
</form>