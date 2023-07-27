<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class ImageLibrary extends Controller
{
    public $Client;
    public function __construct()
    {
        $this->Client=new Admin;
    }

    public function getImage()
    {
        $Image=$this->Client->getImageDB();
        return view('Forms.LibararyImage')->with("Image",$Image);
    }
}
