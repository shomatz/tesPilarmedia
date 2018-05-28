<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Session;
use DB;


class MasterController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index() {
        $kota = DB::Table('kota')->get();
        return view('Master.index');
    }

    public function tabel()
    {
        $kota = DB::Table('kota')->get();
        $dat = array();
        foreach ($kota as $r) {
          $dat[] = (array) $r;
        }
        $i=0;
        $data = array();
        foreach ($dat as $key) {
          //if($key['jumlah'] > $key['s_qty']){
            $data[$i]['prov'] = $key['NamaKota'];
            $data[$i]['kota'] = $key['FK_Propinsi'];
            $data[$i]['action'] = '<button id="edit" class="btn btn-warning btn-sm" 
                                  data-toggle="modal" 
                                  data-target="#edit">Edit</button>
                                  <button id="delete" class="btn btn-warning btn-sm" 
                                  data-toggle="modal" 
                                  data-target="#delete">Delete</button>';
            $i++;
          //}
        }
        $datax = array('data' => $data);
        echo json_encode($datax);
    }

    public function prov()
    {
        $kota = DB::Table('kota')->select('FK_Propinsi')->get();
        $option ='';
        foreach ($kota as $r) {
            $option = '<option value="'.$r->FK_Propinsi.'">'.$r->FK_Propinsi.'</option>';
        }

        echo $option;
    }

    public function save(Request $req)
    {
        $save = DB::Table('kota')
        ->insert([
            'FK_Propinsi' => $req->prop,
            'kota' => $req->kota,
            'kode_kota' => $req->kota,
            'jenis' => $req->prop
        ]);
        
    }

}
