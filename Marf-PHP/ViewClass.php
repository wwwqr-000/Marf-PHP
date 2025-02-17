<?php
class ViewClass {
    private $name;
    private $html;
    
    public function show() {
        die(self::$html);
    }

    public function getName() {
        return self::$name;
    }
}
?>