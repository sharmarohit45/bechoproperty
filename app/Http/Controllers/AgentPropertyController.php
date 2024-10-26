<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File; 
use Illuminate\Http\Request;

class AgentPropertyController extends Controller
{
    public function index()
    {
        $properties = Property::where('posted_from', Auth::id())->get();
        return view('agent.propertyList', compact('properties'));
    }

    public function agentPropertyList()
    {
        $properties = Property::where('posted_from', Auth::id())->get();
        return view('agent.agentpropertylist', compact('properties'));
    }
    public function showFullDetail($id)
    {
        $property = Property::findOrFail($id); // Find the property by its ID
    
        // Decode the JSON-encoded image paths to an array
        $images = json_decode($property->image_paths, true); 
    
        return view('agent.agentpropertydetails', compact('property', 'images')); // Return the details view with property and images
    }

    public function create()
    {
        return view('agentproperties.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([

            'propertyType' => 'required|string|max:255',
            'propertyPrice' => 'required|numeric',
            'propertyName' => 'required|string|max:255',
            'propertyFor' => 'required|string|max:25',
            'state' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'squareFit' => 'required|integer',
            'bedNumber' => 'required|integer',
            'bathNumber' => 'required|integer',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePaths = [];

        if ($request->hasFile('images')) {
            $propertyFolderName = preg_replace('/[^A-Za-z0-9_\-]/', '_', $validated['propertyName']);
            $directoryPath = public_path("propertyimages/{$propertyFolderName}");


            if (!File::exists($directoryPath)) {

                File::makeDirectory($directoryPath, 0755, true);
            }

            foreach ($request->file('images') as $image) {
                if ($image->isValid()) {
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    $image->move($directoryPath, $imageName);
                    $imagePaths[] = "propertyimages/{$propertyFolderName}/{$imageName}";
                } else {

                    // \Log::error('Invalid image upload: ' . $image->getError());
                }
            }
        }

        Property::create(array_merge($validated, [
            'image_paths' => json_encode($imagePaths),
            'posted_from' => Auth::id(), // Ensure this line is included
        ]));
        return redirect()->route('agentPropertyList')->with('success', 'Property created successfully.');
    }

    public function show(Property $property)
    {
        return view('agentproperties.show', compact('property'));
    }

    public function edit($id)
    {
        $property = Property::findOrFail($id);
        return view('agent.editagentproperties', compact('property'));
    }

    public function update(Request $request, $id)
    {
        $property = Property::findOrFail($id);
        
        $validated = $request->validate([
            'propertyType' => 'required|string|max:255',
            'propertyPrice' => 'required|numeric',
            'propertyName' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'squareFit' => 'required|integer',
            'bedNumber' => 'required|integer',
            'bathNumber' => 'required|integer',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'delete_images' => 'array',
        ]);

        // Update the property without the images
        $property->update($request->except('images'));

        // Handle image uploads if provided
        if ($request->hasFile('images')) {
            $imagePaths = [];
            $propertyFolderName = preg_replace('/[^A-Za-z0-9_\-]/', '_', $property->propertyName);
            $directoryPath = public_path("propertyimages/{$propertyFolderName}");

            // Check if directory exists, create if not
            if (!File::exists($directoryPath)) {
                File::makeDirectory($directoryPath, 0755, true);
            }

            foreach ($request->file('images') as $image) {
                if ($image->isValid()) {
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    $image->move($directoryPath, $imageName);
                    $imagePaths[] = "propertyimages/{$propertyFolderName}/{$imageName}";
                }
            }
            $property->image_paths = json_encode($imagePaths);
            $property->save();
        }

        return redirect()->route('agentPropertyList')->with('success', 'Property updated successfully!');
    }

    public function destroy(Property $property)
    {
         
        $imagePaths = json_decode($property->image_paths, true) ?: [];
        foreach ($imagePaths as $imagePath) {
            $fullPath = public_path($imagePath);
            if (File::exists($fullPath)) {
                File::delete($fullPath);
                
            } else {
                              
            }
        }
    
        $property->delete();
      
        return redirect()->route('agentPropertyList')->with('success', 'Property deleted successfully.');
    }
    

}
