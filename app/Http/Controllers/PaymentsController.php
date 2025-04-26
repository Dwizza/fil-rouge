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
                'unit_amount' => $annonce->price * 100, 
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'success_url' => route('home'),
        'cancel_url' => route('home'),
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






    // public function checkout($id){
    //     $annonce = annonce::findOrFail($id);

    //     return view('particulier.checkout',compact('annonce'));
    // }
    // public function payment(Request $request){
    // $request->validate([
    //     'payment_method' => 'required',
    //     'annonce_id' => 'required|exists:annonces,id',
    // ]);
    // // dd('dazt');

    // $user = auth()->user();
    // $annonce = Annonce::findOrFail($request->annonce_id);

    // try {
    //     $user->charge($annonce->price, $request->payment_method, [
    //         'automatic_payment_methods' => [
    //             'enabled' => true,
    //             'allow_redirects' => 'never',
    //             ]
    //         ]);

    //     Payments::create([
    //         'user_id' => $user->id,
    //         'annonce_id' => $annonce->id,
    //         'amount' => $annonce->price + 7,
    //         'status' => 'succeeded',
    //         'paid_at' => now(),
    //     ]);

    //     return redirect()->route('user.annonceDetail', $annonce->id)->with('success', 'Paiement réussi !');

    // } catch (\Exception $e) {
    //     return back()->with('error', 'Erreur de paiement : ' . $e->getMessage());
    
    // }

    // }
}
