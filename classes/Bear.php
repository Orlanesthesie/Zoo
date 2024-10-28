<?php

class Bear extends Animal {

    public function __construct($data)
    {
        parent::__construct($data);
    }

    public function sound()
    {
        echo "Groar !!";
    }

    public function move()
    {
        echo "I'm walking.";
    }
}
?>