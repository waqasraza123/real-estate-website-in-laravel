@extends('layouts.app')

@section('content')

    <section class="short-image no-padding blog-short-title">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-12 short-image-title">
                    <h5 class="subtitle-margin second-color">{{ Lang::get('profile.dashboard_profile') }}</h5>
                    <h1 class="second-color">{{ Lang::get('profile.m_a') }}</h1>
                    <div class="short-title-separator"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-light section-top-shadow">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-9 col-md-push-3">
                    <div class="row">
                        <div class="col-xs-12">
                            <h5 class="subtitle-margin">{{ Lang::get('profile.account') }}</h5>
                            <h1> {{ Lang::get('profile.setings') }}<span class="special-color">.</span></h1>
                            <div class="title-separator-primary"></div>
                        </div>
                    </div>
                    @if($errors->all())
                        <div class="alert alert-danger fade in" style="width: 82%;margin: 0px auto;">
                            @foreach($errors->all() as $error)
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <strong>Oh snap!</strong>  <br>{{$error}}
                            @endforeach
                        </div>
                        <br>
                    @endif
                    <form name="agent-from" id="profile_form" action="{{ route('updateProfile') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{ Auth::user()->id }}" name="id">
                        <div class="row margin-top-60">
                            <div class="col-xs-6 col-xs-offset-3 col-sm-offset-0 col-sm-3 col-md-4">
                                <div class="agent-photos">
                                    <img src="@if(Auth::user()->avatar) {{ asset('assets\images').'/'.Auth::user()->avatar }}  @else {{ asset('images\agent3.jpg') }}@endif" id="agent-profile-photo"
                                         class="img-responsive" alt="">
                                    <div class="change-photo">
                                        <i class="fa fa-pencil fa-lg"></i>
                                        <input type="file" name="avatar" id="agent-photo">
                                    </div>
                                    <input type="text" disabled="disabled" id="agent-file-name" class="main-input">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-9 col-md-8">
                                <div class="labelled-input">
                                    <label for="first-name">{{ Lang::get('listing.first_name') }}</label><input id="first_name" name="first_name" type="text" class="input-full main-input" placeholder="" value="{{ Auth::user()->first_name }}">
                                    <div class="clearfix"></div>
                                </div>
                                <div class="labelled-input">
                                    <label for="last-name">{{ Lang::get('listing.last_name') }}</label><input id="last_name" name="last_name" type="text" class="input-full main-input" placeholder="" value="{{ Auth::user()->last_name }}">
                                    <div class="clearfix"></div>
                                </div>
                                <div class="labelled-input">
                                    <label for="email">{{ Lang::get('listing.email') }}</label><input id="email" name="email" type="email" class="input-full main-input" placeholder="" value={{ Auth::user()->email }}>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="labelled-input">
                                    <label for="phone">{{ Lang::get('listing.phone') }}</label><input id="phone" name="phone" type="tel" class="input-full main-input" placeholder="" value="{{ Auth::user()->phone }}">
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row margin-top-30">
                            <div class="col-lg-6">
                                <label class="labeles"  for="settingsState">{{ Lang::get('profile.state') }}</label>
                                <select id="settingsState" name="state" class="selectpicker selectDropdown stateSelect input-full main-input" title="" >
                                    <option value="">Choose a State</option>
                                    <option value="AK">Alaska</option>
                                    <option value="AL">Alabama</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="AZ">Arizona</option>
                                    <option value="CA">California</option>
                                    <option value="CO">Colorado</option>
                                    <option value="CT">Connecticut</option>
                                    <option value="DC">District of Columbia</option>
                                    <option value="DE">Delaware</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="HI">Hawaii</option>
                                    <option value="IA">Iowa</option>
                                    <option value="ID">Idaho</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IN">Indiana</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MD">Maryland</option>
                                    <option value="ME">Maine</option>
                                    <option value="MI">Michigan</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MO">Missouri</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MT">Montana</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="NV">Nevada</option>
                                    <option value="NY">New York</option>
                                    <option value="OH">Ohio</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="OR">Oregon</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="TX">Texas</option>
                                    <option value="UT">Utah</option>
                                    <option value="VA">Virginia</option>
                                    <option value="VT">Vermont</option>
                                    <option value="WA">Washington</option>
                                    <option value="WI">Wisconsin</option>
                                    <option value="WV">West Virginia</option>
                                    <option value="WY">Wyoming</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <div class="row margin-top-60">
                                    <div class="checkboxGroup" style="  float:left;margin-left: 10px;padding: 10px;">
                                        <input type="checkbox" value="1" @if(Auth::user()->dogs == '1') checked @endif id="c1" name="dogs" class="main-checkbox">
                                        <label for="c1"><span></span>{{ Lang::get('profile.dogs') }}</label><br>
                                    </div>
                                    <div class="checkboxGroup" style="  float:left;margin-left: 10px;padding: 10px;">
                                        <input type="checkbox" value="1" id="c2" @if(Auth::user()->cats == '1') checked @endif name="cats" class="main-checkbox">
                                        <label for="c2"><span></span>{{ Lang::get('profile.cats') }}</label><br>
                                    </div>
                                    <div class="checkboxGroup" style="  float:left;margin-left: 10px;padding: 10px;">
                                        <input type="checkbox" value="1" id="c3" @if(Auth::user()->other == '1') checked @endif name="other" class="main-checkbox">
                                        <label for="c3"><span></span>{{ Lang::get('profile.other') }}</label><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row margin-top-30">
                            <div class="col-lg-6">
                                <label  for="city">{{ Lang::get('profile.city') }}</label>
                                <input id="city" name="city" type="text" class="input-full main-input" placeholder="City" value="{{ Auth::user()->city }}">
                            </div>
                            <div class="col-sm-6">
                                <label  for="birthday">{{ Lang::get('profile.bd') }}</label>
                                <input class="input-full main-input" id="birthday" type="text" name="birthday" value="@if(Auth::user()->birthday != null){{\Carbon\Carbon::parse(Auth::user()->birthday)->format('m/d/Y') }} @endif" placeholder="Date" readonly=""  title="">
                            </div>
                        </div>
                        <div class="row margin-top-30">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h5 class="labeles">{{ Lang::get('profile.gender') }}</h5>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="radioGroup">
                                            <input type="radio" class="primaryRadio" @if(Auth::user()->gender == '1') checked @endif  value="1" id="gender" name="gender" title="">
                                            <label  for="gender"><span  class="spanes">{{ Lang::get('profile.male') }}</span></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="radioGroup">
                                            <input type="radio" class="primaryRadio" @if(Auth::user()->gender == '2') checked @endif  value="2" id="gender2" name="gender" title="">
                                            <label  for="gender2"><span  class="spanes">{{ Lang::get('profile.famele') }}</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h5 class="labeles">{{ Lang::get('profile.mat_status') }}</h5>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="radioGroup">
                                            <input type="radio" class="primaryRadio" @if(Auth::user()->status == '1') checked @endif  value="1" id="status" name="status" title="">
                                            <label  for="status"><span  class="spanes">{{ Lang::get('profile.married') }}</span></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="radioGroup">
                                            <input type="radio" class="primaryRadio" @if(Auth::user()->status == '2') checked @endif  value="2" id="status2" name="status" title="">
                                            <label  for="status2"><span  class="spanes">{{ Lang::get('profile.single') }}</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row margin-top-30">
                            <div class="col-lg-6">
                                <div class="listGroup">
                                    <label class="labeles" for="settingsIncomeRange">{{ Lang::get('profile.range') }}</label>
                                    <select id="settingsIncomeRange" name="range" class="selectpicker selectDropdown incomeSelect"
                                            title="" style="display: none;">
                                        <option value="">{{ Lang::get('profile.chose_range') }}</option>
                                        <option value="1" @if(Auth::user()->range == '1') selected @endif>$0-35K</option>
                                        <option value="2" @if(Auth::user()->range == '2') selected @endif>36K-75K</option>
                                        <option value="3" @if(Auth::user()->range == '3') selected @endif>75K-125K</option>
                                        <option value="4" @if(Auth::user()->range == '4') selected @endif>126K+</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="listGroup">
                                    <label class="labeles" for="settingsNumOfChildren">{{ Lang::get('profile.number_off_child') }}</label>
                                    <select id="settingsNumOfChildren" name="children" class="selectpicker selectDropdown childrenSelect" title="" style="display: none;">
                                        <option value="">{{ Lang::get('profile.choose_num') }}</option>
                                        <option value="0" @if(Auth::user()->children == '0') selected @endif>{{ Lang::get('profile.none') }}</option>
                                        <option value="1" @if(Auth::user()->children == '1') selected @endif>1</option>
                                        <option value="2" @if(Auth::user()->children == '2') selected @endif>2</option>
                                        <option value="3" @if(Auth::user()->children == '3') selected @endif>3</option>
                                        <option value="4" @if(Auth::user()->children == '4') selected @endif>4</option>
                                        <option value="5" @if(Auth::user()->children == '5') selected @endif>5</option>
                                        <option value="6" @if(Auth::user()->children == '6') selected @endif>6</option>
                                        <option value="7" @if(Auth::user()->children == '7') selected @endif>7</option>
                                        <option value="8" @if(Auth::user()->children == '8') selected @endif>8</option>
                                        <option value="9" @if(Auth::user()->children == '9') selected @endif>9</option>
                                        <option value="10" @if(Auth::user()->children == '10') selected @endif>10</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row margin-top-30">
                            <div class="col-xs-12 col-lg-6">
                                <div class="labelled-input-short">
                                    <label for="facebook">
									<span class="label-icon-circle pull-left">
										<i class="fa fa-facebook"></i>
									</span>
                                        Facebook
                                    </label>
                                    <input id="facebook" name="facebook_link" type="text" class="input-full main-input"
                                           placeholder="https://www.facebook.com/" value="{{ Auth::user()->facebook_link }}">
                                    <div class="clearfix"></div>
                                </div>

                            </div>
                            <div class="col-xs-12 col-lg-6">
                                <div class="labelled-input-short">
                                    <label for="gplus">
									<span class="label-icon-circle pull-left">
										<i class="fa fa-google-plus"></i>
									</span>
                                        Google +
                                    </label>
                                    <input id="gplus" name="google_link" type="text" class="input-full main-input"
                                           placeholder="https://www.google.com/" value="{{ Auth::user()->google_link }}">
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row margin-top-30">
                            <div class="col-xs-12">
                                <div class="info-box">
                                    <p>{{ Lang::get('profile.pass_text') }}</p>
                                    <div class="small-triangle"></div>
                                    <div class="small-icon"><i class="fa fa-info fa-lg"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="row margin-top-15">
                            <div class="col-xs-12 col-lg-6">
                                <div class="labelled-input-short">
                                    <label for="first-name">{{ Lang::get('profile.new_pass') }}</label>
                                    <input id="password" name="password" type="password" class="input-full main-input"
                                           placeholder="" value="">
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-lg-6">
                                <div class="labelled-input-short">
                                    <label for="first-name">{{ Lang::get('profile.repeat_pass') }}</label>
                                    <input id="repeat-password" name="repeat-password" type="password"
                                           class="input-full main-input" placeholder="" value="">
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row margin-top-15">
                            <div class="col-xs-12">
                                <div class="center-button-cont center-button-cont-border">
                                    <button type="submit" href="#" class="button-primary ">
                                        <span>{{ Lang::get('profile.save') }}</span>
                                        <div class="button-triangle"></div>
                                        <div class="button-triangle2"></div>
                                        <div class="button-icon"><i class="fa fa-lg fa-floppy-o"></i></div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row margin-top-60"></div>
                </div>
                @include('user.parts.left_side')
            </div>
        </div>
    </section>

@endsection
@section('scripts')
    <script type="text/javascript">
        $(function() {
            $('input[name="birthday"]').daterangepicker({
                    singleDatePicker: true,
                    showDropdowns: true
                },
                function(start, end, label) {
                    var years = moment().diff(start, 'years');
                });
        });
    </script>
    <script>
        $( document ).ready( function () {
            $("#profile_form").validate({
                rules: {
                    first_name: "required",
                    address: "required",
                    listing_type: "required",
                    beds_count: "required",
                    phone: "required",
                    last_name: "required",
                    email: {
                        required: true,
                        email: true
                    },
                    agree: "required"
                },
                messages: {
                    first_name: "Please enter your Firstname",
                    phone: "Please enter your Phone number",
                    last_name: "Please enter your Lastname",
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    confirm_password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long",
                        equalTo: "Please enter the same password as above"
                    },
                    email: "Please enter a valid email address",
                    agree: "Please accept our policy"
                },
                errorElement: "em",
                errorPlacement: function (error, element) {
                    // Add the `help-block` class to the error element
                    error.addClass("help-block");

                    if (element.prop("type") === "checkbox") {
                        error.insertAfter(element.parent("label"));
                    } else {
                        error.insertAfter(element);
                    }
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).parents(".col-sm-5").addClass("has-error").removeClass("has-success");
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).parents(".col-sm-5").addClass("has-success").removeClass("has-error");
                }
            });
        });
    </script>
@endsection
