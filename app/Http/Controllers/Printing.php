<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Operator, Association, Driver, Route};

class Printing extends Controller
{
    public function index()
    {
        return view('print');
    }

    public function store(Request $request)
    {
        return $this->getData($request);
    }

    public function printAll(Request $request)
    {
        switch($request->type) {
            case 'operator':    
                return Operator::all();
                break;
            case 'association':     
                return Association::all();
                break;
            case 'driver':     
                return Driver::all();
                break;
            case 'route':     
                return Route::all();
                break;
        }
    }

    private function getData($request)
    {
        $data = [];
        foreach ($request->toprint as $id) {
            array_push($data, $this->checkType($request->type, $id));
        }
        return $data;
    }

    private function checkType($type, $id)
    {
        switch($type) {
            case 'operator':    
                return Operator::find($id);
                break;
            case 'association':     
                return Association::find($id);
                break;
            case 'driver':     
                return Driver::find($id);
                break;
            case 'route':     
                return Route::find($id);
                break;
        }
    }
}
