<?php

namespace App\Http\Controllers;

use App\Models\annonce;
use App\Models\payments;
use Illuminate\Http\Request;
use Stripe\StripeClient;

class PaymentsController extends Controller
{

    public $stripe;

    public function __construct(){

        $this->stripe = new StripeClient(
            config('stripe.api_key.secret')
        );

    }
    public function payment($id)
{
    $annonce = annonce::findOrFail($id);

    $user = auth()->user(); 

    $session = $this->stripe->checkout->sessions->create([
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price_data' => [
                'currency' => 'USD',
                'product_data' => [
                    'name' => $annonce->title,
                    'images' => [
                        $annonce->image,
                    ],
                    'description' => $annonce->description,
                ],
                'unit_amount' => $annonce->price , 
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'success_url' => route('user.annonceDetail', ['id' => $annonce->id]),
        'cancel_url' => route('user.annonceDetail', ['id' => $annonce->id]),

    ]);

    \DB::table('paiements')->insert([
        'user_id' => $user->id,  
        'annonce_id' => $annonce->id,
        'amount' => $annonce->price * 100,  
        'status' => 'pending',  
        'paid_at' => null, 
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect($session->url);
    }
}
