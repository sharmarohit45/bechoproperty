<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AdminAgentList extends Controller
{
    public function index()
    {
        $userData = User::all();
        return view('admin.adminAgentList', compact('userData'));
    }
    
    public function showagentdetails($id)
    {
        $agent = User::findOrFail($id);
        return view('admin.adminagentdetails', compact('agent'));
    }
    
    public function create()
    {
        return view('properties.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'propertyType' => 'required|string|max:255',
            'propertyPrice' => 'required|numeric',
            'propertyName' => 'required|string|max:255',
            'location' => 'required|string|max:255',
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

        User::create(array_merge($validated, [
            'image_paths' => json_encode($imagePaths),
            'posted_from' => Auth::id(), // Ensure this line is included
        ]));
        return redirect()->route('viewpropertylist')->with('success', 'Property created successfully.');
    }

    public function show(User $property)
    {
        return view('properties.show', compact('property'));
    }

    public function edit($id)
    {
        $property = User::findOrFail($id);
        return response()->json($property);
    }

    public function update(Request $request, User $property)
    {
        $validated = $request->validate([
            'propertyType' => 'required|string|max:255',
            'propertyPrice' => 'required|numeric',
            'propertyName' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'squareFit' => 'required|integer',
            'bedNumber' => 'required|integer',
            'bathNumber' => 'required|integer',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'delete_images' => 'array',
        ]);

        $imagePaths = json_decode($property->image_paths, true) ?: [];
        if ($request->has('delete_images')) {
            foreach ($request->delete_images as $deletePath) {
                File::delete(public_path($deletePath));
                $imagePaths = array_diff($imagePaths, [$deletePath]);
            }
        }

        
        if ($request->hasFile('images')) {
            $propertyFolderName = preg_replace('/[^A-Za-z0-9_\-]/', '_', $validated['propertyName']);
            $directoryPath = public_path("propertyimages/{$propertyFolderName}"); // Use public_path here

       
            if (!File::exists($directoryPath)) {
                File::makeDirectory($directoryPath, 0755, true); // Create directory if it doesn't exist
            }

            foreach ($request->file('images') as $image) {
                if ($image->isValid()) {
                  
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    
                 
                    $image->move($directoryPath, $imageName);

                 
                    $imagePaths[] = "propertyimages/{$propertyFolderName}/{$imageName}";
                } else {
                    // Log error for invalid image upload
                    // \Log::error('Invalid image upload: ' . $image->getError());
                }
            }
        }


        $property->update(array_merge($validated, [
            'image_paths' => json_encode($imagePaths)
        ]));

        return redirect()->route('properties.index')->with('success', 'Property updated successfully.');
    }

    public function destroy(User $property)
    {
       
        $imagePaths = json_decode($property->image_paths, true) ?: [];
        foreach ($imagePaths as $imagePath) {
            File::delete(public_path($imagePath));
        }

        $property->delete();

        return redirect()->route('properties.index')->with('success', 'Property deleted successfully.');
    }
}
