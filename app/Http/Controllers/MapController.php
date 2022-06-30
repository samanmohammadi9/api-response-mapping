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
            $post = [];
            foreach ($dic['posts'] as $key => $val){
                $post[$key] = $res[$val];
            }
            Post::create($post);
        }

        return count($responses);
    }

    public function map_users($response){
        $responses = json_decode($response);
        $dic=Yaml::parse(file_get_contents("../mappingdictionary.yml"));
        foreach($responses as $rsp){
            $res = (array)$rsp;
            $user = [];
            foreach ($dic['users'] as $key => $val){
                $user[$key] = is_object($res[$val])? json_encode($res[$val] , true) :  $res[$val];
            }
            User::create($user);
        }
        return count($responses);
    }
}
