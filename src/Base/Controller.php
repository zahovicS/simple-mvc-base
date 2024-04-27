<?php

namespace System\Base;
use System\Http\Request;

class Controller
{
    public function request(){
        return Request::capture();
    }    
}
