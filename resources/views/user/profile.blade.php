@extends('layouts.app')
<style>
    .checkboxGroup{
        float:left;
        margin-left: 10px;
        padding: 10px;
    }
</style>
@section('content')

    <section class="short-image no-padding blog-short-title">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-12 short-image-title">
                    <h5 class="subtitle-margin second-color">{{ Lang::get('profile.dashboard_profile') }}</h5>
                    <h1 class="second-color">my account</h1>
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
                    <form name="agent-from" action="#" enctype="multipart/form-data">
                        <div class="row margin-top-60">
                            <div class="col-xs-6 col-xs-offset-3 col-sm-offset-0 col-sm-3 col-md-4">
                                <div class="agent-photos">
                                    <img src="{{ asset('images\agent3.jpg') }}" id="agent-profile-photo"
                                         class="img-responsive" alt="">
                                    <div class="change-photo">
                                        <i class="fa fa-pencil fa-lg"></i>
                                        <input type="file" name="agent-photo" id="agent-photo">
                                    </div>
                                    <input type="text" disabled="disabled" id="agent-file-name" class="main-input">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-9 col-md-8">
                                <div class="labelled-input">
                                    <label for="first-name">{{ Lang::get('listing.first_name') }}</label><input id="first-name" name="first-name" type="text" class="input-full main-input" placeholder="" value="Timothy">
                                    <div class="clearfix"></div>
                                </div>
                                <div class="labelled-input">
                                    <label for="last-name">{{ Lang::get('listing.last_name') }}</label><input id="last-name" name="last-name" type="text" class="input-full main-input" placeholder="" value="Johnson">
                                    <div class="clearfix"></div>
                                </div>
                                <div class="labelled-input">
                                    <label for="email">{{ Lang::get('listing.email') }}</label><input id="email" name="email" type="email" class="input-full main-input" placeholder="" value="agent@somedomain.tld">
                                    <div class="clearfix"></div>
                                </div>
                                <div class="labelled-input">
                                    <label for="phone">{{ Lang::get('listing.phone') }}</label><input id="phone" name="phone" type="tel" class="input-full main-input" placeholder="" value="123-456-789">
                                    <div class="clearfix"></div>
                                </div>
                                <div class="labelled-input last">
                                    <label for="address">{{ Lang::get('listing.address') }}</label><input id="address" name="address" type="text"
                                                                               class="input-full main-input"
                                                                               placeholder="" value="Some address here">
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row margin-top-30">
                            <div class="col-lg-6">
                                <label class="labeles"  for="settingsState">{{ Lang::get('profile.state') }}</label>
                                <select id="settingsState" class="selectpicker selectDropdown stateSelect input-full main-input" title="" >
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
                                    <div class="checkboxGroup">
                                        <input type="checkbox" id="c1" name="cc" class="main-checkbox">
                                        <label for="c1"><span></span>{{ Lang::get('profile.dogs') }}</label><br>
                                    </div>
                                    <div class="checkboxGroup">
                                        <input type="checkbox" id="c2" name="cc" class="main-checkbox">
                                        <label for="c2"><span></span>{{ Lang::get('profile.cats') }}</label><br>
                                    </div>
                                    <div class="checkboxGroup">
                                        <input type="checkbox" id="c3" name="cc" class="main-checkbox">
                                        <label for="c3"><span></span>{{ Lang::get('profile.other') }}</label><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row margin-top-30">
                            <div class="col-lg-6">
                                <label  for="city">{{ Lang::get('profile.city') }}</label>
                                <input id="city" name="city" type="text" class="input-full main-input" placeholder="" value="City">
                            </div>
                            <div class="col-sm-6">
                                <label  for="birthday">{{ Lang::get('profile.bd') }}</label>
                                <input class="input-full main-input" id="birthday" type="text" name="birthday" placeholder="Date" readonly="" required="true" title="">
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
                                            <input type="radio" class="primaryRadio"  value="2" id="gender" name="gender" title="">
                                            <label  for="gender"><span  class="spanes">{{ Lang::get('profile.male') }}</span></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="radioGroup">
                                            <input type="radio" class="primaryRadio"  value="2" id="gender2" name="gender" title="">
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
                                            <input type="radio" class="primaryRadio"  value="2" id="status" name="status" title="">
                                            <label  for="status"><span  class="spanes">{{ Lang::get('profile.married') }}</span></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="radioGroup">
                                            <input type="radio" class="primaryRadio"  value="2" id="status2" name="status" title="">
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
                                    <select id="settingsIncomeRange" class="selectpicker selectDropdown incomeSelect"
                                            title="" style="display: none;">
                                        <option value="">{{ Lang::get('profile.chose_range') }}</option>
                                        <option value="1">$0-35K</option>
                                        <option value="2">36K-75K</option>
                                        <option value="3">75K-125K</option>
                                        <option value="4">126K+</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="listGroup">
                                    <label class="labeles" for="settingsNumOfChildren">{{ Lang::get('profile.number_off_child') }}</label>
                                    <select id="settingsNumOfChildren" class="selectpicker selectDropdown childrenSelect" title="" style="display: none;">
                                        <option value="">{{ Lang::get('profile.choose_num') }}</option>
                                        <option value="0">{{ Lang::get('profile.none') }}</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
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
                                    <input id="facebook" name="facebook" type="text" class="input-full main-input"
                                           placeholder="" value="http://facebook.url">
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
                                    <input id="gplus" name="gplus" type="text" class="input-full main-input"
                                           placeholder="" value="http://gplus.url">
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
                                    <a href="#" class="button-primary ">
                                        <span>{{ Lang::get('profile.save') }}</span>
                                        <div class="button-triangle"></div>
                                        <div class="button-triangle2"></div>
                                        <div class="button-icon"><i class="fa fa-lg fa-floppy-o"></i></div>
                                    </a>
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
@endsection
