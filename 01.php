<?php

/**
 * Class admin
 * 责任链模式
 */
class admin
{
    public function __construct()
    {
        if ($this->top === null){
           return;
        }
        $this->toper = new $this->top();
    }

    public function prePorc($danger)
    {
        if ($danger <= $this->pow){
            $this->porc();
        }else{
            $this->toper->prePorc($danger);
        }
    }
}

class banzhu extends admin
{
   protected $pow = 1;
   protected $top = 'polic';

   public function porc(){
       echo '删帖';
   }
}

class polic extends admin
{
    protected $pow = 2;
    protected $top = 'guoan';

    public function porc(){
        echo '拘留';
    }
}

class guoan extends admin
{
    protected $pow = 3;
    protected $top = null;

    public function porc(){
        echo '灭口';
    }
}

$danger = 3;

$admin = new banzhu();
$admin->prePorc($danger);