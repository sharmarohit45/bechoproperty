<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquiry;
use Illuminate\Support\Facades\File;

class AdminEnquiry extends Controller
{
    public function index()
    {
        $enquiryData = Enquiry::all();
        return view('admin.adminenquiry', compact('enquiryData'));
    }
    public function create()
    {
        return view('enquiry.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'property_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
        ]);
        Enquiry::create($validated);
        return redirect()->route('allproperties')->with('success', 'Enquiry submitted successfully.');
    }

    public function show(Enquiry $property)
    {
        return view('admin.enquiry.show', compact('property'));
    }

    public function edit($id)
    {
        $property = Enquiry::findOrFail($id);
        return view('enquiry.edit', compact('property'));
    }
    public function update(Request $request, Enquiry $property)
    {
        $validated = $request->validate([
            'property_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
        ]);
        $property->update($validated);
        return redirect()->route('adminenquiry.index')->with('success', 'Enquiry updated successfully.');
    }
    public function destroy(Enquiry $enquiry)
    {
        $enquiry->delete();
        return redirect()->route('adminenquiry.index')->with('success', 'Enquiry deleted successfully.');
    }
}
