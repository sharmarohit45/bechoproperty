@extends('admin.adminHeader')

@section('admin-main')
<div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
        <button class="btn btn-dark" id="menu-toggle"><i class="bi bi-list"></i></button>
    </nav>
    <div class="row">
        <div class="col">
            <div class="row p-1">
                <div class="col text-white text-center bg-primary pt-2 pb-2">
                    <h1>{{ $agent->name }}</h1>
                </div>
            </div>
            <div class="card mt-3">
                <div class="row">
                    <div class="col p-5">
                        <table class="table table-bordered text-white">
                            <tr class="text-white text-center">
                                <th colspan="5">Agent Details</th>
                            </tr>
                            <tr>
                                <th>Agent Name</th>
                                <td colspan="3">{{ $agent->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td colspan="3">{{ $agent->email }}</td>
                            </tr>
                            <tr>
                                <th>Contact Number</th>
                                <td colspan="3">{{ $agent->phone_number }}</td>
                            </tr>
                            <tr>
                                <th>Contact Direct</th>
                                <td colspan="3" class="text-center">
                                    <a href="https://wa.me/{{ $agent->phone_number }}" target="_blank">
                                        <i class="text-white bi bi-whatsapp f-10"></i>
                                    </a> &nbsp; &nbsp; &nbsp;
                                    <a href="tel:{{ $agent->phone_number }}">
                                        <i class="text-white bi bi-telephone-fill"></i>
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col p-5">
                        <img src="{{ asset('storage/' . $agent->profile_photo_path) }}" alt="Profile Photo" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
