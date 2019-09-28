<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataStoreLoad;
use App\Http\Requests\Question1Validation;

class DataStoreLoadController extends Controller
{

	protected $entity;

	public function __construct(DataStoreLoad $entity)
	{
		$this->entity = $entity;
	}

    public function store(Question1Validation $request)
    {
    	$param = $request->get('textline');
    	$store = $this->entity->store($param);
    	return redirect()->route('question1.load');
    }

    public function load(Request $request)
    {
    	return view('question1.result')->withData($request->session()->get('dataStoreLoad'));
    }
}
