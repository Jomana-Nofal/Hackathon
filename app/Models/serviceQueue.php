<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class serviceQueue extends Model
{
    use HasFactory;
    protected $table="service_queues";
    
    protected $fillable = [
        'avg_time','service_id','current_queue_id'
    ];
}
