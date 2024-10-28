<?php

class Tiger extends Animal {

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method))
            {
                $this -> $method($value);
            }
        }
    }

    public function sound()
    {
        echo "Roar !!";
    }

    public function move()
    {
        echo "I'm walking.";
    }
}

?>