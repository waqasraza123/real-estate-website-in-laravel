@extends('layouts.app')

@section('content')

    <section class="short-image no-padding blog-short-title">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-12 short-image-title">
                    <h5 class="subtitle-margin second-color">{{ Lang::get('profile.dashboard_profile') }}</h5>
                    <h1 class="second-color">Notification Settings</h1>
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
                        {{--Notify massages--}}

                        @if(Session::has('success'))
                            <div class="success-box margin-top-30">
                                <p>{{ Session::get('success') }}</p>
                                <div class="small-triangle"></div>
                                <div class="small-icon"><i class="jfont"></i></div>
                            </div>
                        @endif

                        @if(Session::has('error'))
                            <div class="error-box margin-top-30">
                                <p>{{ Session::get('error') }}</p>
                                <div class="small-triangle"></div>
                                <div class="small-icon"><i class="jfont"></i></div>
                            </div>
                        @endif

                        {{-- end notify Massage--}}
                        <div class="col-xs-12">
                            <h1>Notification Settings<span class="special-color">.</span></h1>
                            <div class="title-separator-primary"></div>
                        </div>
                    </div>
                    <form action="{{ route('saveUserNotify') }}" method="post">
                        {{ csrf_field() }}
                    <div class="row margin-top-30">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-7">
                                    <h4 class="list-offer-title">Saved Searches</h4>
                                    <p>
                                        Receive updates on apartments in areas you have saved.
                                    </p>
                                </div>
                                <div class="col-lg-5">
                                    <div class="grid margin-top-15">
                                        <div class="col-sm-3 " >
                                            <div class="radioGroup">
                                                <input type="radio" class="primaryRadio"  @if($notification->saved_searches == '1')  checked  @endif  value="1" id="propType5" name="saved_searches" title="">
                                                <label  for="propType5"><span data-bind="text: Description" class="spanes">On</span></label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3" >
                                            <div class="radioGroup">
                                                <input type="radio" class="primaryRadio"  @if($notification->saved_searches == '0')  checked  @endif  value="0" id="propType3" name="saved_searches" title="">
                                                <label  for="propType3"><span data-bind="text: Description" class="spanes">Off</span></label>
                                            </div>
                                        </div>
                                        <div class="claerfix"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="title-separator-primary"></div>
                        </div>

                    </div>
                    <div class="row margin-top-15">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-7">
                                    <h4 class="list-offer-title">Favorites</h4>
                                    <p>
                                        Receive updates on your favorite apartments.
                                    </p>
                                </div>
                                <div class="col-lg-5">
                                    <div class="grid margin-top-15">
                                        <div class="col-sm-3 " >
                                            <div class="radioGroup">
                                                <input type="radio" class="primaryRadio"  @if($notification->favorites == '1')  checked  @endif  value="1" id="propType1" name="favorites" title="">
                                                <label  for="propType1"><span data-bind="text: Description" class="spanes">On</span></label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3" >
                                            <div class="radioGroup">
                                                <input type="radio" class="primaryRadio"  @if($notification->favorites == '0')  checked  @endif  value="0" id="propType2" name="favorites" title="">
                                                <label  for="propType2"><span data-bind="text: Description" class="spanes">Off</span></label>
                                            </div>
                                        </div>
                                        <div class="claerfix"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="title-separator-primary"></div>
                        </div>
                    </div>
                    <div class="row margin-top-15">
                        <div class="col-lg-12">
                            <h4 class="list-offer-title">Delivery Options</h4>
                            <div class="listGroup">
                                <label class="labeles" for="settingsIncomeRange">Alert Frequency</label>
                                <select id="settingsIncomeRange" name="delivery_option" class="selectpicker selectDropdown incomeSelect"
                                        title="" style="display: none;">
                                    <option value="1" @if(Auth::user()->delivery_option == '1') selected @endif>Immediate</option>
                                    <option value="2" @if(Auth::user()->delivery_option == '2') selected @endif>Daily</option>
                                    <option value="3" @if(Auth::user()->delivery_option == '3') selected @endif>Weekly</option>
                                </select>
                            </div>
                            <div class="title-separator-primary"></div>
                        </div>

                    </div>
                    <div class="row margin-top-15">
                        <div class="col-xs-12">
                            <div class="center-button-cont">
                                <button type="submit" href="#" class="button-primary ">
                                    <span>save</span>
                                    <div class="button-triangle"></div>
                                    <div class="button-triangle2"></div>
                                    <div class="button-icon"><i class="fa fa-lg fa-floppy-o"></i></div>
                                </button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                @include('user.parts.left_side')
            </div>
        </div>
    </section>

@endsection

@section('scripts')

@endsection

