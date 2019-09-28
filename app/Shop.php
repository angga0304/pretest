<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public function getItems()
    {
    	$items = [
    		'Cabbage' => [
    			'type' => 'groceries',
    			'price' => '10'
    		],
    		'Chair' => [
    			'type' => 'furniture',
    			'price' => '250'
    		],
    		'Lamp' => [
    			'type' => 'furniture',
    			'price' => '5'
    		],
    		'Tomato' => [
    			'type' => 'groceries',
    			'price' => '3'
    		],
    		'Bag' => [
    			'type' => 'lifestyle',
    			'price' => '100'
    		],
    		'Glasses' => [
    			'type' => 'lifestyle',
    			'price' => '80'
    		]
    	];

    	return collect($items);
    }

    public function getGroceriesItem($cart)
    {
    	$returnData = $cart->filter(function ($value, $key)
    	{
    		return $value['type'] == 'groceries';
    	});

    	return $returnData;
    }

    public function getnonGroceriesItem($cart)
    {
    	$returnData = $cart->filter(function ($value, $key)
    	{
    		return $value['type'] != 'groceries';
    	});

    	return $returnData;
    }

    public function calculate($request)
    {
    	$percentageDiscount = 0;
    	if ( !empty( $request->get('employee') ) ) {
    		$percentageDiscount = 30;
    	} elseif ( !empty( $request->get('affiliate') ) ) {
    		$percentageDiscount = 10;
    	} elseif ( !empty( $request->get('longcust') ) ) {
    		$percentageDiscount = 5;
    	}

    	$productsData = $this->getItems();
    	$totalGroceries = 0;
    	$totalOther = 0;
    	$calculation = array();
    	foreach ( array_filter( $request->get('chart') ) as $key => $value ) {
    		$cart = $productsData[$key];
    		$cart['qty'] = $value;
    		$cart['subtotal'] = $value * $cart['price'];
    		$calculation[$key] = $cart;
    	}
    	$cartInfo = collect($calculation);
    	$totalGroceries = $this->getGroceriesItem($cartInfo)->sum('subtotal');
    	$totalnonGroceries = $this->getnonGroceriesItem($cartInfo)->sum('subtotal') * ((100-$percentageDiscount) / 100);
    	$bonusDisc =  (int)floor(($totalGroceries + $totalnonGroceries) / 100) * 5;

    	return [
    		'cart' => $calculation,
    		'totalGroceries' => $totalGroceries,
    		'totalnonGroceries' => $totalnonGroceries,
    		'bonusDisc' => $bonusDisc,
    		'memberDisc' => $percentageDiscount,
    		'total' => $totalGroceries + $totalnonGroceries - $bonusDisc
    	];
    }
}
