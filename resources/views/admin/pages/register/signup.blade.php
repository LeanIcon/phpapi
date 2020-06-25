@include('admin.layouts.header')

<div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center bg-dark text-white">{{ __('Sign Up') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register.form') }}">
                            @csrf
    
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Register As') }}</label>
    
                                <div class="col-md-6">
                                    <select class="form-control" name="type" id="">
                                        <option value="">Select</option>
                                        <option value="wholesaler">Wholesaler</option>
                                        <option value="retailer">Retailer</option>
                                        <option value="pharmacist">Pharmacist</option>
                                    </select>
                                </div>
                            
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Region') }}</label>
                                <div class="col-md-6">
                                    @if (!is_null($regions))
                                    <select class="form-control" name="region" id="">
                                        <option value="">Select Region</option>
                                        @foreach ($regions as $region)
                                            <option value="{{$region->id}}">{{$region->name}}</option>
                                        @endforeach
                                    </select>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>
                                <div class="col-md-6">
                                    @if (!is_null($locations))
                                    <select class="form-control" name="location" id="location">
                                        <option value="">Select Location</option>
                                        {{-- @foreach ($locations as $location)
                                            <option value="{{$location->id}}">{{$location->name}}</option>
                                        @endforeach --}}
                                    </select>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Company Name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Registration No') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('reg_no') is-invalid @enderror" name="reg_no" value="{{ old('reg_no') }}" required autocomplete="reg_no" autofocus>
                                    @error('reg_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone / Mobile') }}</label>
    
                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="name" autofocus>
    
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                    <button type="button" onclick="history.back()" class="btn btn-sm btn-danger">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page content -->
</div>
<!-- end page-wrapper -->
<!-- jQuery  -->
<!-- jQuery  -->
<script src="{{url('admin/assets/js/jquery.min.js')}}"></script>
<script src="{{url('admin/assets/js/bootstrap.bundle.min.js')}}"></script>
<!-- App js -->
<script src="{{url('admin/assets/js/app.js')}}"></script>
<script>
    $(document).ready(function(){
        $('select[name="region"]').on('change',function(){
            let regID=$(this).val();
            if(regID){
                console.log(regID);
                $.ajax({
                    url:'/location/getLocations/'+regID,
                    type:'GET',
                    dataType:'JSON',
                    success:function(data){
                        console.log(data);
                        $('select[name="location"]').empty();
                        let items = '<option value="">Select Location </option>';
                       
                            // items += "<option value='" + key + "'>" + value + "</option>";
                            
                        for (var i = 0; i < data.length; i++) {
                        items += "<option value='" + data[i].id + "'>" + data[i].name + "</option>";
                        }
                        $('#location').empty().append(items);
                        }
                    
                });
            }
        });
    });
</script>
</body>
</html>