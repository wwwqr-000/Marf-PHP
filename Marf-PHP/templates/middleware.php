<?php
class Middleware {
    protected $name;

    public function getName() {
        return $this->name;
    }

    public function check($arg = null) {
        return false;
    }
}
?>