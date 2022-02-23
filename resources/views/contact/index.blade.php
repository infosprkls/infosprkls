@extends('layouts.app', ['activePage' => 'contact', 'titlePage' => __('Contact Support')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 m-auto">
                    <div class="contact-form">
                        <h1>Contact Us</h1>
                        <p class="hint-text">If you encounter any problems, or have any questions, please let us know!</p>
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputFirstName">First Name</label>
                                        <input type="text" class="form-control" id="inputFirstName" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="inputLastName">Last Name</label>
                                        <input type="text" class="form-control" id="inputLastName" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">Email Address</label>
                                <input type="email" class="form-control" id="inputEmail" required>
                            </div>
                            <div class="form-group">
                                <label for="inputMessage">Message</label>
                                <textarea class="form-control" id="inputMessage" rows="5" required></textarea>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </form>
                    </div>
            </div>
        </div>
    </div>
@endsection
