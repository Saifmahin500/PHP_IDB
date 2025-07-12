<?php
class Mymath {
    public static $pi = 3.1415;

    public static function areaOfCircle($r) {
        return self::$pi * $r * $r;
    }
}

echo Mymath::areaOfCircle(5);  // Output: 78.5375
?>
