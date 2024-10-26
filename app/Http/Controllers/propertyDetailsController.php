<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class propertyDetailsController extends Controller
{
    public function index()
    {
        $properties = Property::all();
        return view('allproperties', compact('properties'));
    }
    public function get_property()
    {
        $properties = Property::all();
        return view('welcome', compact('properties'));
    }
   
}
