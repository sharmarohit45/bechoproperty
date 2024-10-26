@extends('admin.adminHeader')
@section('admin-main')
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
            <button class="btn btn-dark" id="menu-toggle"><i class="bi bi-list"></i></button>
        </nav>
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard Overview</h1>
            <div class="row">
                <div class="col-lg-4">
                    <a href="/admin-agents" style="text-decoration: none">
                        <div class="card">
                            <div class="card-header">Total Agents</div>
                            <div class="widget">
                                <h2 class="text-center text-white">{{ $agentCount }}</h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="/viewpropertylist" style="text-decoration: none">
                        <div class="card">
                            <div class="card-header">Total Properties</div>
                            <div class="widget">
                                <h2 class="text-center text-white">{{ $propertyCount }}</h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="/admin/enquiries" style="text-decoration: none">
                        <div class="card">
                            <div class="card-header">Total Enquiries</div>
                            <div class="widget">
                                <h2 class="text-center text-white">{{ $enquiryCount }}</h2>
                            </div>
                    </a>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-6">
                    <a href="/admin-agents" style="text-decoration: none">
                        <div class="card">
                            <div class="card-header">Total Leads</div>
                            <div class="widget">
                                <h2 class="text-center text-white">0</h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6">
                    <a href="/viewpropertylist" style="text-decoration: none">
                        <div class="card">
                            <div class="card-header">Total Packages</div>
                            <div class="widget">
                                <h2 class="text-center text-white">0</h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
