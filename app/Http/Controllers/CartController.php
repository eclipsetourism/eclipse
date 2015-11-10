<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Repositories\Package\PackageRepositoryInterface;
use App\ShoppingCart\ShoppingCart;
use Illuminate\Http\Request;

class CartController extends Controller
{

    protected $package;

    protected $cart;

    public function __construct(PackageRepositoryInterface $package, ShoppingCart $cart) {

        $this->package = $package;

        $this->cart = $cart;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cart =  $this->cart->content();

        return view('public.cart.index', compact('cart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        if( ! $request->date ) {

            flash()->error('Preferred Date!', 'Please select your preferred date.');
            
            return redirect()->back();
        }

        $this->cart->add([
            'id'            => $request->package_id,
            'name'          => $request->name,
            'qty'           => (int) $request->quantity, //adult_quantity
            'price'         => floatval($request->price),     //adult_price
            'options'       => [
                'child_quantity'     => $request->child_quantity,
                'child_price'   => $request->child_price,
                'date'          => $request->date,
                'date_submit'   => $request->date_submit,
                'package'       => $this->package->find($request->package_id)
            ]
        ]);

        flash()->success('Yay!', 'The Packages has been successfully added to your cart.');

        return redirect()->route('cart.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $rowId)
    {   
        $this->cart->update($rowId, [
            'qty'   => $request->adult_quantity,
            'options'   => [
                'child_quantity'    => $request->child_quantity
            ]
        ]);

        flash()->success('Yay!', 'You successfully updated an item from the cart.');

        return redirect()->route('cart.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        $this->cart->remove($rowId);

        flash()->success('Yay!', 'You successfully remove an item from the cart.');

        return redirect()->route('cart.index');
    }
}
