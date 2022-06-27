<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;

class GetResponseController extends Controller
{
    //get responses with no child (simple)
    public function get_simple_response(){
        return json_encode(['status' => 'success' , 'data' => 'test']);
    }

    //get responses with child objects
    public function get_responses_with_child(){
        return json_encode(['status' => 'success' , 'data' => 'test']);
    }
}
