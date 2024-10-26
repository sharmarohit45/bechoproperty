<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == 'admin') {
             $agentCount = User::count();
            $propertyCount = Property::count();
            $enquiryCount = Enquiry::count();
            
            return view('admin.adminhome', compact('agentCount', 'propertyCount', 'enquiryCount'));
        } else {
            return view('agent.agentdashboard');
        }
    }
}
