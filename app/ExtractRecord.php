<?php

namespace App;

class ExtractRecord
{
    public $value;
    public $description;
    public $date;
    public $type;
    
    public function __construct($value, $description, $date, $type){
        $this->value = $value;
        $this->description = $description;
        $this->date = $date;
        $this->type = $type;
   }
}