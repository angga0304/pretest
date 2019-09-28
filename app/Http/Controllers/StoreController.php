<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;

class StoreController extends Controller
{
	private $shop;

	public function __construct(Shop $shop)
	{
		$this->shop = $shop;
	}

    public function index(Request $request)
    {
    	$items = $this->shop->getItems();
    	return view('question3.index')->withProducts($items);
    }

    public function store(Request $request)
    {
    	$param = $request->get('chart');
    	$payment = $this->shop->calculate($request);
    	// dd($payment);
    	return view('question3.cashier')->withDetail($payment);
    }
}
