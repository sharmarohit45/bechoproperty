@extends('Layout')
@section('main')
<div class="container" style="margin-top: 100px">
    <div class="row bg-primary text-white text-center pt-2 pb-2 mb-3">
        <div class="col">
            <h1>Search Property Buyers</h1>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-6">
            <div class="card p-3">
                <form action="{{ route('lead.store') }}" method="POST">
                    @csrf
                    <div class="form-group mt-2">
                        <label for=""><strong>Property for</strong></label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="property_for" id="inlineRadio1" value="Buy">
                            <label class="form-check-label" for="inlineRadio1">Buy</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="property_for" id="inlineRadio2" value="Rent">
                            <label class="form-check-label" for="inlineRadio2">Rent</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="property_for" id="inlineRadio3" value="PG">
                            <label class="form-check-label" for="inlineRadio3">PG</label>
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <label for=""><strong>Property Type</strong></label>
                        <input type="text" name="property_type" id="property_type" class="form-control" required>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group mt-2">
                                <label for=""><strong>Budget</strong></label>
                                <input type="text" name="budget" id="budget" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mt-2">
                                <label for=""><strong>City</strong></label>
                                <input type="text" name="city" id="city" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group mt-2">
                        <h1><strong>Contact Details</strong></h1>
                        <hr>
                    </div>
                    <div class="form-group mt-2">
                        <label for="">I am</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="contact_type" id="contact_type_agent" value="Agent">
                            <label class="form-check-label" for="contact_type_agent">Agent</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="contact_type" id="contact_type_builder" value="Builder">
                            <label class="form-check-label" for="contact_type_builder">Builder</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="contact_type" id="contact_type_owner" value="Owner">
                            <label class="form-check-label" for="contact_type_owner">Owner</label>
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <label for=""><strong>Email</strong></label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group mt-2">
                                <label for=""><strong>Name</strong></label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mt-2">
                                <label for=""><strong>Mobile No.</strong></label>
                                <input type="number" name="mobile_no" id="mobile_no" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <div>
                            <input class="form-check-input" type="checkbox" name="agree_to_terms" id="agree_to_terms" value="1" required>
                            <span> Yes, I agree to the <b>Terms & Conditions</b></span>
                        </div>
                    </div>
                    <div class="row mt-3 mb-3">
                        <div class="col text-center">
                            <button type="submit" class="btn btn-dark form-control">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card p-2">
                <h1>Why Search Property Buyers?</h1>
                <p>We help you to find the Property buyers.</p>
                <p>Get Genuine Property Buyers.</p>
                <p>Select Property Buyers city-wise.</p>
                <p>Save Your Money & Time.</p>
            </div>
        </div>
    </div>
</div>
@endsection