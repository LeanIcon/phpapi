@include('admin.layouts.header')
    <div class="container">
        <div class="col-lg-12">
            <div class="col-lg-6 mx-auto">
                <h4 class="mx-auto" >Welcome to Nnuro Verification Portal</h4>
                <div class="card">
                    <div class="card-header">
                        ENTER OTP
                    </div>
                    <div class="card-body">
                        <form method="POST" class="form">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="phone" class="form-control" placeholder="Phone Number">
                                <small class="text-info" >Number during registration (10 digits)</small>
                            </div>
                            <div class="form-group">
                                <input type="text" name="otp" class="form-control" placeholder="Enter OTP">
                                <small class="text-info" >Pincode sent to Registered Number</small>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">
                                    VERIFY
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>