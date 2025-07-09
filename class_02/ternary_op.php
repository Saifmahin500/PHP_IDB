<?php
 $beef_Price = 500;

 $decision = ( $beef_Price == 300) ? "buy 3kg beef" : "Dont Buy Beef";

 echo($decision);
 echo("<br>");

 $foo = 2;


 $bar = ($foo == 1) ? "1" :
        (( $foo == 1 ) ? "2": "other value" );

        echo( $bar);

    
?>