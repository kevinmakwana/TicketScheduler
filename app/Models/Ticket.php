<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
        'description',
        'user_name',
        'user_email',
        'status'
    ];
    public static function openStatus(){
        return self::where('status',0);
    }

    public static function closeStatus(){
        return self::where('status',1);
    }
    
    public static function userTickets($email){
        return self::where('user_email',$email);
    }

    public static function updateUnprocessedTickets(){
        self::where('status','0')->orderBy('id','ASC')->take(10)->update(['status'=>1]);
    }
}
