<?php

class Queue
{
    private $queue = array();

    public function Enqueue($item)
    {
        $this->queue[] = $item;
    }

    public function Dequeue()
    {
        if($this->Size() < 1)
        {
            return null;
        }

        $last_key = $this->getLastKey();

        $item = null;

        for($k = 0; $k <= $last_key; $k++)
        {
            if ($k == 0)
            {
                $item = $this->queue[$k];
            }
            else
            {
                $new_k = $k - 1;
                $this->queue[$new_k] = $this->queue[$k];
            }  
        }
        unset($this->queue[$last_key]);
        return $item;
    }

    public function Size()
    {
        return count($this->queue);
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

$q = new Queue();

for($i = 1; $i <= 5; $i++)
{
    $a = readline("Upisite broj: ");
    $q->Enqueue($a);
}

while($b = $q->Dequeue())
{
    echo $b. "\n";
}
?>