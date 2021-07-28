<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\posts;
use App\Models\clients;

class dummyApiController extends Controller
{
    public function getdata()
    {
        $post = posts::get();
        $clients = clients::get();
        // return $post . "<br><br>" . $clients;
        return compact('post','clients');
    }

    public function senddata(Request $req)
    {
        return $req;
        $clients = new clients;
        $clients->name = $req->name;
        $result = $clients->save();

        if ($result) {
            return ['result' => 'Data Save'];
        }else{
            return ['result' => 'Data Not Save'];
        }
        
    }
}
