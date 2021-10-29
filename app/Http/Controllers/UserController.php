<?php

namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\Queue;


use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $services = Service::all();
        $queues=Queue::all();
        $inWait = Queue::where('called_at','=', null)->get();
        $inServe = Queue::where('called_at','!=', null)->where('served_at','=',null)->get();

        return view('dashboard', ['services' => $services,'queues' => $queues,'inServe' => $inServe,'inWait' => $inWait]);
    }
}
