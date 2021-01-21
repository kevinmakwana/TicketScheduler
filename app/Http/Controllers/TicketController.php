<?php

namespace App\Http\Controllers;

use App\Http\Resources\TicketResourceCollection;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function openTickets(){
        $tickets = new TicketResourceCollection(Ticket::openStatus()->orderBy('id','ASC')->paginate(25));
        return response()->json(['status'=>200,'message'=>'Open Tickets','data'=>$tickets],200);
    }

    public function closeTickets(){
        $tickets = new TicketResourceCollection(Ticket::closeStatus()->orderBy('id','ASC')->paginate(25));
        return response()->json(['status'=>200,'message'=>'Closed Tickets','data'=>$tickets],200);
    }

    public function userTickets($email){
        $tickets = Ticket::userTickets($email)->orderBy('id','ASC')->paginate(25);
        return response()->json(['status'=>200,'message'=>'User Tickets','data'=>$tickets],200);
    }

    public function ticketStats(){
        $tickets = Ticket::get();
        $data['totalTickets'] = $tickets->count();
        $data['unprocessedTickets'] = $tickets->where('status',0)->count();
        $user = Ticket::select('user_email',DB::raw('count(*) as total'))
                        ->groupBy('user_email')
                        ->orderBy('total','DESC')
                        ->first();
        if(!$user){
            $data['user'] = $user;
        }else{
            $data['user'] = $user->user_email;
        }

        $lastProcessedAt = $tickets->where('status',1)->reverse()->first();
        if(!$lastProcessedAt){
            $data['last_processed_at'] = $lastProcessedAt;
        }else{
            $data['last_processed_at'] = $lastProcessedAt->updated_at->diffForHumans();
        }

        return response()->json(['status'=>200,'message'=>'Tickets Stats','data'=>$data],200);
    }
}
