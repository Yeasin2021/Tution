<?php
namespace App\Facades;
use Illuminate\Support\Facades\Facade;

class Count extends Facade {
    protected static function getFacadeAccessor(){
        return "Count";
    }
}

?>
