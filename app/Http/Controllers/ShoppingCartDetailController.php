<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use App\Models\ShoppingCartDetail;
use Illuminate\Support\Facades\Session;

class ShoppingCartDetailController extends Controller
{

    public function store(Request $request)
    {
        $product = Product::find($request->product_id);
        $shopping_cart = ShoppingCart::get_the_session_shopping_cart();
        $shopping_cart-> my_store($product, $request);
        return back();
        //  dd($shopping_cart->id);
    }
 
    
    

    public function update(Request $request, ShoppingCartDetail $shoppingCartDetail)
    {
        
    }

   
    public function destroy(ShoppingCartDetail $shoppingCartDetail)
    {
        $shoppingCartDetail->delete();
        return back();
    }
}
