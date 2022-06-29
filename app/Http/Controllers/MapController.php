<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\Yaml\Yaml;

class MapController extends Controller
{
    public function map_posts($response)
    {
        $responses=json_decode($response);
        $dic=Yaml::parse(file_get_contents("../mappingdictionary.yml"));
        foreach($responses as $rsp){
            $res = (array)$rsp;
            $post = [
                'user_id' => $res[$dic["posts"]["user_id"]],
                'title' => $res[$dic["posts"]["title"]],
                'body' => $res[$dic["posts"]["body"]],
            ];
            Post::create($post);
        }

        return count($responses);
    }

    public function map_users($response){
        $responses = json_decode($response);
        $dic=Yaml::parse(file_get_contents("../mappingdictionary.yml"));
        $users = [];
        foreach($responses as $rsp){
            $res = (array)$rsp;
            $user = [
                "name" => $res[$dic["users"]["name"]],
                "email" => $res[$dic["users"]["email"]],
                "phone" => $res[$dic["users"]["phone"]],
                "company" => json_encode((array) $res[$dic["users"]["company"]],true),
            ];
            $usr = User::create($user);
        }
        return count($responses);
    }
}
