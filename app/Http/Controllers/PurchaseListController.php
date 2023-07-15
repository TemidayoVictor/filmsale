<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Purchase;

class PurchaseListController extends Controller
{
    //
    
    public function __construct() {
        $this->middleware(['auth']);
    }

    public function index($id) {
        $purchases = Purchase::where('user', $id)->get();
        $total = 0;
        foreach($purchases as $purchase) {
            $total = $total + $purchase->price;
        }
        return view('client.purchase-list', [
            'upperNav' => 'nav',
            'sideNav' => 'purchaseList',
            'purchases' => $purchases,
            'total' => $total,
        ]);
    }
}
