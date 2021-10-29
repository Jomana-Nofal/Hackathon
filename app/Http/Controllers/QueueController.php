<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Queue;
use App\Models\serviceQueue;
use App\Models\Service;

class QueueController extends Controller
{
    public function store(Request $request)
    { 
        // to get service id
        $service= Service::where('name',$request->service)->first();
        $service_id =$service->id;

        // to increment ticket_number value  
        $max_id = Queue::all();      
        if (count($max_id)== 0)
        {
            $number = 1 ;
        }else{
            $number = Queue::all()->max('ticket_number');
            $number= $number+1;
        }

        $queueWaite = Queue::where('called_at','=', null)->get();
        $queueWaiteCount = count($queueWaite);
        
        // add new row to queue
        $queue = Queue::create([
            'ticket_number'=>$number,
            'user_id'=> 4, 
            'service_id'=>$service_id,
        ]);       
        $queue->save();

       
        // // add new row to serviceQueue
        // $serviceQueue = serviceQueue::create([
        //     'avg_time' => 0,
        //     'service_id'=>$service_id,
        //     'current_queue_id' =>$queue->id,
        // ]);
        // $serviceQueue->save();
       
        return redirect()->back()->with('status',"your ticket-number:($queue->ticket_number) | in Waite :($queueWaiteCount).");

    }

    public function serve(Request $request)
    {
       if($request->start){
        // $queue = Queue::where('ticket_number','=', $request->current_queue)->first();
        $queueUpdate = Queue::find($request->current_queue);
        $queueUpdate->update([
            'called_at' => now(),
        ]);
        $queueUpdate->save();
        return redirect()->back();  
       }else{
            $queueUpdate = Queue::find($request->current_queue);
            $queueUpdate->update([
                'served_at' => now(),
            ]);
            $queueUpdate->save();
            return redirect()->back(); 
    
    }
       
         
    }
    
}
