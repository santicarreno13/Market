<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShoppingCart extends Model
{

    protected $fillable = [
        'status',
        'user_id',
        'order_date',
   
    ];
    public function shopping_cart_details(){
        return $this->hasMany(ShoppingCartDetail::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function findOrCreateBySessionId($shopping_cart_id){
        if ($shopping_cart_id) {
            return ShoppingCart::find($shopping_cart_id);
        } else {
            return ShoppingCart::create();
        }
    }

    public function quantity_of_products(){
        return $this->shopping_cart_details->sum('quantity');
    }
    public function total_price(){
        $total=0;
        foreach ($this->shopping_cart_details as $key => $shopping_cart_detail){
            $total += $shopping_cart_detail->price * $shopping_cart_detail->quantity;
        }
        return $total;
    }

    public static function get_the_session_shopping_cart(){  
        $session_name = 'shopping_cart_id';
        $shopping_cart_id = Session::get($session_name);
        $shopping_cart = self::findOrCreateBySessionId($shopping_cart_id);
        return $shopping_cart;
    }

    public function my_store($product, $request){
        $this->shopping_cart_details()->create([
            'quantity'=> $request->quantity,
            'price'=> $product->price,
            'product_id' => $product->id,
        ]);
    }
    public function my_update($request){
        foreach ($this->shopping_cart_details as $key => $detail){
            $result[] = array("quantity" => $request->quantity[$key]);
            $detail->update($result[$key]);
        }
        
    }
}
