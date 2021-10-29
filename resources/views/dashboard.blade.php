<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome To Our System') }}
        </h2>
        <p style="color:#818cf8;">From here you can easily book your ticket from wherever you are </P>
    </x-slot>
    <style>
        h3
        {
            font-weight:bolder;
            font-size:18px;
            margin-bottom:10px;
        }
    </style>
    @if (session('status'))
      
          <p class="btn btn-danger">
          {{ session('status') }}
        </p>
     
      
  @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" p-6 bg-white border-b border-gray-200 ">
                    
                    <div class="text-center" style="width:100%;">
                        <div>
                            <h2>Employee (1)</h2><br>
                            <form method="post" action="{{route('queue.serve')}}">
                                @csrf
                                <label for="service-select">Start Serve:</label>

                                <select name="current_queue" id="queue-select">
                                    <option value="">--Start Serve--</option>
                                    @foreach($queues as $queue)
                                    <option value="{{$queue->ticket_number}}">Ticket:#{{$queue->ticket_number}}</option>
                                    @endforeach
                                </select>
                                    <button type="submit" name="start" value="start" style="background-color:#c03232; color:white; padding: 10px;" >Start</button>   
                                    <button type="submit" name="end" value="end" style="background-color:#c03232; color:white; padding: 10px;" >End</button>     
  
                                        
                            </form>
                            <br>
                            <div class="border"style="height:300px;border:solid 1px black;">
                            <h3 style="color: #454c97; background-color: #d0d1ff;padding: 10px;">In Waite :</h3>
   
    

                            <br>
                                @foreach($inWait as $queue)
                                <span style="padding: 10px;background-color: #9e9ff9;font-weight: 700; margin-right: 15px; margin-bottom: 15px;">
   
    
                                    Ticket:#{{$queue->ticket_number}}
                                </span>
                                @endforeach
                            </div>
                            <div class="border"style="height:300px;border:solid 1px black;">
                            <h3 style="color: #454c97; background-color: #d0d1ff;padding: 10px;">In Serve :</h3>
                            <br>
                                @foreach($inServe as $queue)
                                <span style="padding: 10px;background-color: #9e9ff9;font-weight: 700; margin-right: 15px; margin-bottom: 15px;">
   
    
                                    Ticket:#{{$queue->ticket_number}}
                                </span>
                                @endforeach
                            </div>
                            </br> 
                        </div>


                        <div class="">
                        <form method="post" action="{{route('ticket.store')}}">
                            @csrf
                        <label for="service-select">Choose a service:</label>

                        <select name="service" id="service-select">
                            <option value="">--Please choose an option--</option>
                            @foreach($services as $service)
                            <option value="{{$service->name}}">{{$service->name}}</option>
                            @endforeach
                        </select>
                            <button type="submit" name="book-btn" style="background-color:#c03232; color:white; padding: 10px;" >Book a ticket</button>     
                         </form>
                    </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
