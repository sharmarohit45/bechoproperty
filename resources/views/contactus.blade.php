@extends('Layout')
@section('main')
    <div class="container" style="margin-top: 100px">
        <div class="row bg-primary">
            <div class="col-sm-12">
                <div class="text-center mx-auto mb-5 mt-5 text-white">
                    <h1 class="mb-3">Contact Us</h1>
                    {{-- <p>Explore our available properties below.</p> --}}
                </div>
            </div>
        </div>
        <div class="row p-5">
            <div class="col-sm-7 col-lg-6">
                <form action="">
                    <div class="card p-3">
                        <div class="row">
                            <div class="col">
                                <h3>Get in Touch</h3>
                                <p>Having Questions? Tell us about your Business, Our experts will check all the aspects and
                                    call you back to explain how BechoProperty.com would help you to get quotes for your
                                    Business.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for=""><strong>Name</strong></label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for=""><strong>Email</strong></label>
                                <input type="email" class="form-control">
                            </div>
                            <div class="col">
                                <label for=""><strong>City</strong></label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for=""><strong>Contact No.</strong></label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col">
                                <label for=""><strong>Company</strong></label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for=""><strong>Querry</strong></label>
                                <textarea name="" id="" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row pt-3 pb-3">
                            <div class="col">
                                <button class="btn btn-dark">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-5 col-lg-6">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d112178.64480204455!2d77.40182545!3d28.5222018!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce5a43173357b%3A0x37ffce30c87cc03f!2sNoida%2C%20Uttar%20Pradesh!5e0!3m2!1sen!2sin!4v1728799635467!5m2!1sen!2sin"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    
    </div>
@endsection
