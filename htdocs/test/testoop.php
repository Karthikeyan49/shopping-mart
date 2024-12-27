<?php
class sample{
    private $conn;
    public function sample(){
        $this->id=3;
        return $this->id;
    }
}
$sam=new sample();
echo $sam->sample();