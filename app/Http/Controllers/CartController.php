<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order_online;
use App\Models\User;
use App\Models\Product;
use Auth;
use Illuminate\Support\Facades\DB;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        
        if(auth::check()) {
            $id = Auth::guard('web')->id();
            $order = Order_online::where('user_id', $id)->get();
            return view('content.order')->with('items',$order[0]);

        }
        return view('content.order');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {           
        $login = null;
        if(auth::check()) {
            $id = Auth::guard('web')->id();
            $order = Order_online::where('user_id', $id)->get();
            $product = Product::find($request->productId);
            $results = DB::select('select * from onlines where order_online_id = :id and product_id = :pid', ['id' => $order[0]->id, 'pid' =>$product->id]);

            if($results == []){
                DB::insert('insert into onlines (order_online_id, product_id, quantity) values (?, ?, ?)', [$order[0]->id, $product->id, 1]);
            }
            else {
                DB::update(
                    'update onlines set quantity = quantity + 1 where order_online_id = ? and product_id = ?',
                    [$order[0]->id,$product->id]
                );
            };
            return redirect('/cart');
        }
        $login = 'Bạn cần đăng nhập để đặt hàng';
        return view('auth.login')->with('login', $login);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $auth = Auth::guard('web')->id();
        $order_online = Order_online::find($request->order_id);
        $all = $request->all();
        return $order_online->products;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $auth = Auth::guard('web')->id();
        $order = Order_online::where('user_id', $auth)->get();
        $deleted = DB::delete('delete from onlines where order_online_id = :id and product_id = :pid', ['id' => $order[0]->id, 'pid' => $id]);
        return redirect('/cart');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $name = $request->input('quantity');
        return $name;
        // return redirect('/cart');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
