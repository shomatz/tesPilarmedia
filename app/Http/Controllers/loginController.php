<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Session;


class loginController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function authenticate(Request $req) {
        $user = $req->user;
        $pass = $req->pass;
        dd($user);
        if ($user == 'tes' && $pass == '1234') {
            //Auth::login($user);
            $dataInfo=['status'=>'sukses'];            
            //return json_encode($dataInfo);
            return json_encode($dataInfo);
        } else {
            $dataInfo=['status'=>'gagal'];            
            return json_encode($dataInfo);
        }

    }

}
