<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeadModel;

class LeadController extends Controller
{
    public function index()
    {
        $leads = LeadModel::all(); 
        return view('admin.adminLeadList', compact('leads'));
    }
    public function LeadDetails()
    {
        $leads = LeadModel::all(); 
        return view('Leads', compact('leads'));
    }

    public function create()
    {
        return view('lead.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'property_for' => 'required',
        'property_type' => 'required',
        'budget' => 'required',
        'city' => 'required',
        'contact_type' => 'required',
        'email' => 'required|email',
        'name' => 'required',
        'mobile_no' => 'required|numeric',
        'agree_to_terms' => 'accepted',
            ]);

    LeadModel::create($request->all());

    return redirect()->view('propertyLead')->with('success', 'Enquiry submitted successfully.');
}

}
