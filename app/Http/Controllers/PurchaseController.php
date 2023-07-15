<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Purchase;
use App\Models\Movie;
use App\Models\Revenue;

use Illuminate\Support\Facades\Session;

class PurchaseController extends Controller
{
    //
    public function purchase($id) {
        $user = Session::get('id');
        $revenue = Revenue::where('status', 'current')->first();
        $revenueID = $revenue->id;
        $initialAmount = intval($revenue->amount);
        $movie = Movie::where('id', $id)->first();
        $movieName = $movie->name;
        $price = intval($movie->price);
        $image = $movie->image;  
        $currentAmount = $initialAmount + $price;

        Purchase::create([
            'user' => $user,
            'movie' => $movieName,
            'price' => $price,
            'image' => $image,
            'revenue_id' => $user,
        ]);

        $update = Revenue::where('status', 'current')
        ->update([
            'amount' => $currentAmount,
        ]);

        return back()->with('message', 'Congratulations, Purchase successful');
    }
}
