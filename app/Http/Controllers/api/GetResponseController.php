<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use phpDocumentor\Reflection\Types\Integer;

class GetResponseController extends Controller
{
    //get responses with no child (simple)
    public function simple_response(){
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');
    }

    //get responses with child objects
    public function responses_with_child(){
        $response = Http::get('https://jsonplaceholder.typicode.com/users');
    }
}
