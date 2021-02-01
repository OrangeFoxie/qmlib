<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class datasheetController extends Controller
{
    //
    public function showDocs(){
        $docs = DB::table('documents')
        ->join('stations','stations.id','=','Station_id')
        ->join('rooms','rooms.id','=','Room_id')
        ->join('users','users.id','=','users_id')
        ->select('documents.id','documents.name', 'documents.path as path', 'stations.name as stationName', 'rooms.name as roomName', 'users.username as users_name')        
        ->orderBy('documents.id')
        ->get();

        $rooms = DB::table('rooms')->get();     

        $stations = DB::table('stations')
        ->join('rooms','Room_id','=','rooms.id')
        ->select('rooms.name as RoomName', 'rooms.id as RoomID','stations.id as id', 'stations.name as name')
        ->orderBy('RoomID')
        ->get();        

        if( $docs && $rooms && $stations ){
            return view('datasheet', compact('docs','rooms','stations'));
        }else{
            return view('datasheet');
        }
    }
}
