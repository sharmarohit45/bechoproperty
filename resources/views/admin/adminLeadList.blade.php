@extends('admin.adminHeader')
@section('admin-main')
<div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
        <button class="btn btn-dark" id="menu-toggle"><i class="bi bi-list"></i></button>
    </nav>

    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Lead List</h3>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body">
                        @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if ($leads->isEmpty())
                        <div class="alert alert-info">No enquiries available.</div>
                        @else
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead class="text-white text-smaller">
                                    <tr>
                                    <tr>
                                        <th>Id</th>
                                        <th>Lead Property for</th>
                                        <th>Type</th>
                                        <th>Budget</th>
                                        <th>City</th>
                                        <th>Lead Person</th>
                                        <th>Email</th>
                                        <th>Name</th>
                                        <th>Lead Status</th>
                                        <th>Contact</th>
                                        <th>conditions_check</th>
                                        <th colspan="2" class="text-center">Action</th>
                                    </tr>
                                    </tr>
                                </thead>
                                <tbody class="text-white">
                                    @foreach ($leads as $lead)
                                    <tr>
                                        <td class="text-center text-white">{{ $lead->id }}</td>
                                        <td class="text-white">{{ $lead->property_for }}</td>
                                        <td class="text-white">{{ $lead->property_type }}</td>
                                        <td class="text-white">{{ $lead->budget }}</td>
                                        <td class="text-white">{{ $lead->city }}</td>
                                        <td class="text-white">{{ $lead->contact_type }}</td>
                                        <td class="text-white">{{ $lead->email }}</td>
                                        <td class="text-center text-white">{{ $lead->name }}</td>
                                        <td class="text-white">{{ $lead->lead_action }}</td>
                                        <td class="text-center text-white">{{ $lead->mobile_no }}</td>
                                        <td class="text-center text-white">{{ $lead->agree_to_terms }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection