<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Property;
use App\Models\Enquiry;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $agentCount = User::count();
        $propertyCount = Property::count();
        $enquiryCount = Enquiry::count();
        return view('admin.adminhome', compact('agentCount', 'propertyCount', 'enquiryCount'));
    }
}
