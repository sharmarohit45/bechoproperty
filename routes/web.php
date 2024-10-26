<?php

use App\Http\Controllers\AdminAgentList;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminEnquiry;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\AgentPropertyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\propertyDetailsController;

// Home Route
Route::get('/', [propertyDetailsController::class, 'get_property'])->name('welcome');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
// Package Routes
Route::get('/package', function () {
    return view('agent.agentpackages');
});

Route::get('/admin/enquiries', [AdminEnquiry::class, 'filterEnquiries'])->name('admin.enquiries.filter');

Route::get('/admin/package', function () {
    return view('admin.adminpackage');
});
Route::get('/contact', function () {
    return view('contactus');
});
Route::get('/projects', function () {
    return view('projects');
});
Route::get('/agent-package', function () {
    return view('agent.agentpackagelist');
});
Route::get('/our-packages', function () {
    return view('our-packages');
});
Route::get('/Property-Lead', function () {
    return view('propertyLead');
});


Route::get('/all-properties', [propertyDetailsController::class, 'index'])->name('allproperties');
Route::resource('properties', PropertyController::class);
Route::resource('lead', LeadController::class);


// Agent Properties Routes
Route::resource('agentproperties', AgentPropertyController::class);
Route::resource('adminenquiry', AdminEnquiry::class);
Route::delete('adminenquiry/{property}', [AdminEnquiry::class, 'destroy'])->name('adminenquiry.destroy');


// Custom Routes for Agent Properties
Route::get('/viewpropertylist', [PropertyController::class, 'viewPropertyList'])->name('viewpropertylist');
Route::get('/agentPropertyList', [AgentPropertyController::class, 'agentPropertyList'])->name('agentPropertyList');
Route::get('/redirect', [HomeController::class, 'redirect'])->middleware('auth', 'verified');
Route::get('/view_property', [AgentController::class, 'view_property']);

// Additional routes for editing and updating
Route::get('agentproperties/{agentproperty}/edit', [AgentPropertyController::class, 'edit'])->name('agentproperties.edit');
Route::put('agentproperties/{agentproperty}', [AgentPropertyController::class, 'update'])->name('agentproperties.update');
Route::delete('/agentproperties/{property}', [AgentPropertyController::class, 'destroy'])->name('agentproperties.destroy');

Route::get('/admin-agents', [AdminAgentList::class, 'index']);
Route::get('/agent/property/{id}', [AgentPropertyController::class, 'showFullDetail'])->name('agent.property.show');
Route::get('/admin/property/{id}', [PropertyController::class, 'showFullDetail'])->name('admin.property.show');
Route::get('/admin/agent/{id}', [AdminAgentList::class, 'showagentdetails'])->name('admin.agent.show');

Route::get('/admin/enquiries', [AdminEnquiry::class, 'index'])->name('adminenquiry.index');
Route::get('/admin/Property-Lead', function () {
    return view('admin.adminLeadList');
});
// Route::get('/properties/search', [PropertyController::class, 'search'])->name('properties.search');

Route::get('/properties/search', [PropertyController::class, 'search'])->name('properties.search');
Route::get('/admin/leads', [LeadController::class, 'index'])->name('lead.index');

Route::get('/properties/search', [PropertyController::class, 'search'])->name('properties.search');


Route::post('/search', [PropertyController::class, 'search'])->name('search');
Route::get('/rent', [PropertyController::class, 'getPropertiesForRent']);
Route::get('/buy', [PropertyController::class, 'getPropertiesForSell']);
Route::get('/Leads', [LeadController::class, 'LeadDetails']);
