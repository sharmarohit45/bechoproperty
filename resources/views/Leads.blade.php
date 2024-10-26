@extends('Layout')

@section('main')
    <div class="container" style="margin-top: 100px">
        <div class="row g-0 gx-5 align-items-end bg-primary text-white mb-5">
            <div class="col-12">
                <div class="text-center mx-auto mb-5 mt-5">
                    <h1 class="mb-3">Property Leads</h1>
                </div>
            </div>
        </div>
        <div class="row mt-5 mb-5">
            @foreach ($leads as $lead)
                <div class="col mb-4">
                    <div class="card">
                        <div class="row p-4" style="background-color:#e8e8e8">
                            <div class="col-sm-9 p-2" style="background-color: black;">
                                <div
                                    class="card card-cover h-100 overflow-hidden rounded-5 shadow-lg bg-card_img">
                                    <div class="d-flex flex-column h-100 pt-0 p-5 pb-3 text-shadow-1">
                                        <h5 class="p-5 pb-3 text-shadow-1"><b>Property Type : </b> {{ $lead->property_type }}</h5>
                                        <h5 class="p- pb-3 text-shadow-1"><b>Property City : </b> {{ $lead->city }}</h5>
                                        <h5 class="p-5 pb-3 text-shadow-1"><b>Property For : </b> {{ $lead->property_for }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3" style="background-color: white; border-left:1px solid #dddddd;">
                                <div class="row bg-primary text-center p-2">
                                    <div class="col-sm-12 text-white">
                                        <h3>Contact Detail</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 pt-2">
                                        <ul style="list-style: none">
                                            <li class="pb-2"><h2>{{ $lead->name }}</h2></li>
                                            <li style="margin-bottom: 10px; font-size: 18px; color: #333;">
                                                <strong class="text-dark"> <i class="bi bi-envelope-fill"></i></strong>
                                                <span style="margin-bottom: 10px; font-size: 18px; color: #333;">
                                                    ***********@gmail.com</span>
                                            </li>
                                            <li style="margin-bottom: 20px; font-size: 18px; color: #333;">
                                                <strong class="text-dark"> <i class="bi bi-telephone-fill"></i></strong>
                                                <span style="margin-bottom: 10px; font-size: 18px; color: #333;">
                                                    ***********@gmail.com</span>
                                            </li>
                                            <li style="margin-bottom: 10px; font-size: 18px; color: #333;">
                                                <a class="btn btn-primary" style="color:white">Request a Call for Free
                                                    Contact</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
