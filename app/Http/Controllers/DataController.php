<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data;
use Illuminate\Support\Facades\Crypt;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $_ = new Data;
        $os = $_->Os();
        $ip = $_SERVER['REMOTE_ADDR'];
        /**
         * We are picking the mac but chances are incase the app seats on a server with no mac address
         * this is going to mean that this is going to return an empty string. so this means that in many
         * cases there is a possibility that this will not work.
         */
        $mac = str_replace("   Media disconnected", "", exec('getmac'));
        $signature = Crypt::encryptString('secret');

        /**
         * Let try cnrypting an array here, we ara going to use try catch definitely because we clearly 
         * know it's going to fail hahahaha.
         * 
         * !Okay-> This was surely not meant to work don't even have an idea how its comes to work ahahah
         */
        try {
            $user_data = array(
                // 'Signature' => $signature,
                'OS' => $os,
                'Mac' => $mac,
                'IP' => $ip,
                // 'data' => $_SERVER
            );
            $signature = Crypt::encrypt($user_data);
            $decrypt = Crypt::decrypt($signature);
            return array(
                'Signature'=>$signature,
                'data'=>$decrypt,
            );

        } catch (\Throwable $th) {
            //throw $th;
            return $th;
        }
        
        return array(
            'Signature'=>$signature,
            'OS'=>$os, 
            'Mac'=>$mac,
            'IP'=>$ip,
            'data'=>$_SERVER);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
