@extends('layouts.default')

@section('maincontent')
<div class="row">

    <div class="col-sm-2 box-shadow-grey no-margin-padding">

        <div class="row">
            <div class="col-sm-12 extra-padding-25">
                
                <h5>Business Control Panel</h5>
                <hr/>

                <nav>
                    <div class="nav flex-column nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-one-tab" data-toggle="tab" href="#nav-one" role="tab" aria-controls="nav-one" aria-selected="true">Gardian</a>
                    <a class="nav-item nav-link" id="nav-two-tab" data-toggle="tab" href="#nav-two" role="tab" aria-controls="nav-two" aria-selected="false">Terms of Service</a>
                    <a class="nav-item nav-link" id="nav-three-tab" data-toggle="tab" href="#nav-three" role="tab" aria-controls="nav-three" aria-selected="false">Log in</a>
                    <a class="nav-item nav-link" id="nav-four-tab" data-toggle="tab" href="#nav-four" role="tab" aria-controls="nav-four" aria-selected="false">Register</a>
                    </div>
                </nav>
            </div><!-- end of sub col -->
        </div><!-- sub row -->
        <br/>
        <br/>
        
        <div class="row">
            <div class="col-sm-12 extra-padding-25">
                <h5>Modules</h5>
                <hr/>
                <nav>
                    <div class="nav flex-column nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link" id="nav-five-tab" data-toggle="tab" href="#nav-five" role="tab" aria-controls="nav-five" aria-selected="true">K-Inventory</a>
                    <a class="nav-item nav-link" id="nav-six-tab" data-toggle="tab" href="#nav-six" role="tab" aria-controls="nav-six" aria-selected="false">K-Clients</a>
                    <a class="nav-item nav-link" id="nav-seven-tab" data-toggle="tab" href="#nav-seven" role="tab" aria-controls="nav-seven" aria-selected="false">K-Suppliers</a>
                    <a class="nav-item nav-link" id="nav-eight-tab" data-toggle="tab" href="#nav-eight" role="tab" aria-controls="nav-eight" aria-selected="false">K-Assistant</a>
                    <a class="nav-item nav-link" id="nav-nine-tab" data-toggle="tab" href="#nav-nine" role="tab" aria-controls="nav-nine" aria-selected="false">K-POS</a>
                    </div>
                </nav>
            </div><!-- end of sub col-->
        </div><!-- sub row -->
        <br/>
        <br/>
        
        <div class="row">
            <div class="col-sm-12 extra-padding-25">
                <h5>Contact us</h5>
                <hr/>

                <div class="extra-padding-10">
                    <p>For business inquiries</p>
                    <p>gardianmemeti@gmail.com</p>
                </div>

                <div class="extra-padding-10">
                    <p>For legal inquiries</p>
                    <p>gardianmemeti@gmail.com</p>
                </div>

                <div class="extra-padding-10">
                    <p>For sales inquiries</p>
                    <p>gardianmemeti@gmail.com</p>
                </div>
            </div><!-- end of sub col-->
        </div><!-- sub row -->

    </div><!-- sidebar col/ left col -->

    <div class="col-sm-8 extra-padding-25">

        <div class="tab-content" id="nav-tabContent">

            <div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="row">  
                            <div class="col-sm-10 mx-auto box-border-left">
                                
                                <h3>About Platform</h3>
                                <hr/>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            </div><!-- sub col -->

                        </div><!-- sub row -->
                        <br/>
                        <br/>
                        <div class="row">  
                            <div class="col-sm-10 mx-auto box-border-right">
                                
                                <h3 class="d-flex justify-content-end">Business Control Panel</h3>
                                <hr/>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            </div><!-- sub col -->

                        </div><!-- sub row -->
                        <br/>
                        <br/>
                        <div class="row">  
                            <div class="col-sm-10 mx-auto box-border-bottom">
                                
                                <h3 align="center">MODULES</h3>
                                <hr/>
                                <div class="row extra-padding-25">
                                    
                                    <div class="col-sm-2 text-center">
                                        <i class="fas fa-box-open fa-2x"></i>
                                        <p>K-Inventory</p>
                                    </div><!-- module 1 -->

                                    <div class="col-sm-2 text-center">
                                            <i class="fas fa-user-friends fa-2x"></i>
                                        <p>K-Clients</p>
                                    </div><!-- module 2 -->

                                    <div class="col-sm-2 text-center">
                                            <i class="fas fa-warehouse fa-2x"></i>
                                        <p>K-Suppliers</p>
                                    </div><!-- module 3 -->

                                    <div class="col-sm-2 text-center">
                                        <i class="fas fa-clipboard-list fa-2x"></i>
                                        <p>K-Assistant</p>
                                    </div><!-- module 4 -->

                                    <div class="col-sm-2 text-center">
                                        <i class="fas fa-store-alt fa-2x"></i>
                                        <p>K-POS</p>
                                    </div><!-- module 5 -->

                                </div>
                            </div><!-- sub col -->

                        </div><!-- sub row -->

                    </div><!-- main col - tab one -->
                </div><!-- main row - tab one -->
            </div><!-- tab one end -->

            <div class="tab-pane fade" id="nav-two" role="tabpanel" aria-labelledby="nav-two-tab">test1</div><!--tab two end -->
            <div class="tab-pane fade" id="nav-three" role="tabpanel" aria-labelledby="nav-three-tab">
                <div class="row">
                    <div class="col-sm-12 extra-padding-25">
                            
                        <br/>
                        <br/>
                        <div class="row">
                            <div class="col-sm-7 mx-auto extra-padding-15 box-border-top">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="email-login" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email-login" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password-login" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password-login" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Login') }}
                                            </button>

                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--tab three end -->
            <div class="tab-pane fade" id="nav-four" role="tabpanel" aria-labelledby="nav-four-tab">
                <div class="row">
                    <div class="col-sm-12 extra-padding-25">

                        <div class="row">
                            <div class="col-sm-7 mx-auto extra-padding-15 box-border-top-warning">
                                <h1>test.</h1>
                            </div><!-- end of sub col -->
                        </div><!-- end of sub row -->
                        <br/>
                        <br/>
                        <div class="row">
                            <div class="col-sm-7 mx-auto extra-padding-15 box-border-left">
                                 <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="company" class="col-md-4 col-form-label text-md-right">{{ __('Company') }}</label>

                                        <div class="col-md-6">
                                            <input id="company" type="text" class="form-control{{ $errors->has('company') ? ' is-invalid' : '' }}" name="company" value="{{ old('company') }}" required >

                                            @if ($errors->has('company'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('company') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>

                                        <div class="col-md-6">
                                            <select class="form-control" id="type" name="type">
                                            <option value="0">Small business</option>
                                            <option value="1">Enterprise</option>
                                            <option value="2">Enterprenuer</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- end of main col -->
                </div><!-- end of main row-->

            </div><!--tab four end -->
            <div class="tab-pane fade" id="nav-five" role="tabpanel" aria-labelledby="nav-five-tab">test4</div><!--tab five end -->
            <div class="tab-pane fade" id="nav-six" role="tabpanel" aria-labelledby="nav-six-tab">test5</div><!--tab six end -->
            <div class="tab-pane fade" id="nav-seven" role="tabpanel" aria-labelledby="nav-seven-tab">test6</div><!--tab seven end -->
            <div class="tab-pane fade" id="nav-eight" role="tabpanel" aria-labelledby="nav-eight-tab">test7</div><!--tab eight end -->
            <div class="tab-pane fade" id="nav-nine" role="tabpanel" aria-labelledby="nav-nine-tab">test8</div><!--tab nine end -->
        </div>

    </div><!-- main content col/ right col -->

</div><!-- end of main row -->
@endsection


