<?php

class Stack
{
    private $stack = array();

    public function Push($item)
    {
        $this->stack[] = $item;
    }

    public function Pop()
    {
        if($this->Size() < 1)
        {
            return null;
        }

        $last_key = $this->getLastKey();

        $item = $this->stack[$last_key];

        unset($this->stack[$last_key]); //Mice element iz tog polja, ugradena funkcija

        return $item;
    }

    public function Size()
    {
        return count($this->stack);
    }

    private function getLastKey()
    {
        $last_key = (int)$this->Size() - 1;

        if($last_key < 0)
        {
            $last_key = 0;
        }

        return $last_key;
    }
}

$s = new Stack();

for($i = 1; $i <= 5; $i++)
{
    $a = readline("Upisite broj: ");
    $s->Push($a);
}

while($b = $s->Pop())
{
    echo $b. "\n";
}

?>