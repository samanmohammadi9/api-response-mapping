<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MapController;
use Illuminate\Support\Facades\Http;

class GetResponseController extends Controller
{
    //get responses with no child (simple)
    public function simple_response(){
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        $mc = new MapController();
        $result = $mc->map_posts($response);
        return json_encode(
            [
                'status' => 'success',
                'message' => $result.' row mapped and inserted',
            ]
        );
    }

    //get responses with child objects
    public function responses_with_child(){
        $response = Http::get('https://jsonplaceholder.typicode.com/users');
        $mc = New MapController();
        $result = $mc->map_users($response);
        return json_encode(
            [
                'status' => 'success',
                'message' => $result.' row mapped and inserted',
            ]
        );

    }
}
