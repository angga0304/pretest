<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataStoreLoad extends Model
{
    public function store(string $text)
    {
    	$result = array();
    	$explodeLine = explode('\n', $text);
    	foreach ($explodeLine as $key => $line) {
    		$explodedValue = explode(';', $line);
    		foreach ($explodedValue as $value) {
    			$explodedArray = explode('=', $value);
    			if (count($explodedArray) == 2) {
	    			$result[$key][$explodedArray[0]] = $explodedArray[1];
    			}
    		}
    	}
    	session(['dataStoreLoad'=> $result]);
    	return true;
    }
}
