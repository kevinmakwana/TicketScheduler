<?php

namespace Tests\Feature;

use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TicketTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_list_open_tickets() {
        
       $tickets = Ticket::factory()->count(5)->make();
       $this->get(route('open-tickets'))
       ->assertJsonStructure([
        'status',
        'message',
        'data'
       ])
       ->assertStatus(200);
    }

    public function test_can_list_close_tickets() {
        
        $tickets = Ticket::factory()->count(5)->make();
        $this->json('GET', route('close-tickets'), ['Accept' => 'application/json'])
        ->assertStatus(200)
        ->assertJsonStructure([
         'status',
         'message',
         'data'
        ]);
     }

     public function test_can_list_user_tickets() {
        
        $ticket = Ticket::factory()->create([
            "subject" => "Test Subject",
            "description"   => "Test Description",
            "user_name" => "Susan Wojcicki",
            "user_email" => "ken@mailinator.com",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);

        $this->json('GET', route('user-tickets',[$ticket->user_email]), ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data'
        ]);
    }

    public function test_can_ticket_stats(){
        $this->json('GET', route('stats'), ['Accept' => 'application/json'])
        ->assertStatus(200)
        ->assertJsonStructure([
            'status',
            'message',
            'data'
        ]);
    }
}
