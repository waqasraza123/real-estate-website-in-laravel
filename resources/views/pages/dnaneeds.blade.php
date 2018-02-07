@extends('layouts.app')


@section('content')
    <section class="short-image no-padding blog-short-title">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-12 short-image-title">
                    <h5 class="subtitle-margin second-color">D&A NEEDS</h5>
                    <div class="short-title-separator"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-light  section-top-shadow">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <div class="dark-col margin-top-60">
                    <div class="grid">
                        <div class="col-xs-12">
                            <h4 class="special-color" style="font-size: 24px;margin-top: 10px;margin-bottom: 20px;">D&N</h4>
                        </div>
                    </div>
                    <div class="grid">
                        <div class="col-xs-12 margin-top-15">
                            <div class="row">
                                <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                    <input type="checkbox" value="1" @if(old('dogs') == 1)  checked @endif id="c100" name="all_box" class="main-checkbox" >
                                    <label for="c100"><span></span>{{ Lang::get('listing.dogs_ok') }}</label><br>
                                </div>
                                <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                    <input type="checkbox" value="1" @if(old('dogs') == 1)  checked @endif id="c100" name="all_box" class="main-checkbox" >
                                    <label for="c100"><span></span>Lofts box </label><br>
                                </div>
                                <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                    <input type="checkbox" value="1" @if(old('dogs') == 1)  checked @endif id="c100" name="all_box" class="main-checkbox" >
                                    <label for="c100"><span></span>Dens box </label><br>
                                </div>
                                <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                    <input type="checkbox" value="1" @if(old('dogs') == 1)  checked @endif id="c100" name="all_box" class="main-checkbox" >
                                    <label for="c100"><span></span>Townhomes  </label><br>
                                </div>
                                <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                    <input type="checkbox" value="1" @if(old('dogs') == 1)  checked @endif id="c100" name="all_box" class="main-checkbox" >
                                    <label for="c100"><span></span>All Bills</label><br>
                                </div>
                                <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                    <input type="checkbox" value="1" @if(old('dogs') == 1)  checked @endif id="c10" name="dogs" class="main-checkbox" >
                                    <label for="c10"><span></span>{{ Lang::get('listing.dogs_ok') }}</label><br>
                                </div>
                                <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                    <input type="checkbox" value="1" @if(old('cats') == 1)  checked @endif id="c2" name="cats" class="main-checkbox">
                                    <label for="c2"><span></span>{{ Lang::get('listing.cats_ok') }}</label><br>
                                </div>
                                <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                    <input type="checkbox" id="c3" @if(old('no_pets') == 1)  checked @endif name="no_pets" value="1" class="main-checkbox">
                                    <label for="c3"><span></span>{{ Lang::get('listing.no_pets') }}</label><br>
                                </div>
                                <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                    <input type="checkbox" id="c4" @if(old('furnished') == 1)  checked @endif name="furnished" value="1" class="main-checkbox">
                                    <label for="c4"><span></span>{{ Lang::get('listing.furnished') }}</label><br>
                                </div>
                                <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                    <input type="checkbox" value="1" @if(old('no_smocking') == 1)  checked @endif id="c5" name="no_smocking" class="main-checkbox">
                                    <label for="c5"><span></span>{{ Lang::get('listing.no_smo') }}</label><br>
                                </div>
                                <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                    <input type="checkbox"  value="1" @if(old('wheelchair') == 1)  checked @endif id="c6" name="wheelchair" class="main-checkbox">
                                    <label for="c6"><span></span>{{ Lang::get('listing.wheel_access') }}</label>
                                </div>
                                <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                    <input type="checkbox"  value="1" @if(old('washer_dryer') == 1)  checked @endif id="c11" name="washer_dryer" class="main-checkbox">
                                    <label for="c11"><span></span>{{ Lang::get('pages.w_ad') }}</label>
                                </div>
                                <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                    <input type="checkbox"  value="1" @if(old('washer_dryer_hockups') == 1)  checked @endif id="c7" name="washer_dryer_hockups" class="main-checkbox">
                                    <label for="c7"><span></span>{{ Lang::get('pages.w_h') }}</label>
                                </div>
                                <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                    <input type="checkbox"  value="1" @if(old('onsite_laundry') == 1)  checked @endif id="c8" name="onsite_laundry" class="main-checkbox">
                                    <label for="c8"><span></span>{{ Lang::get('pages.o_n') }}</label>
                                </div>
                                <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                    <input type="checkbox"  value="1" @if(old('fitness_center') == 1)  checked @endif id="c9" name="fitness_center" class="main-checkbox">
                                    <label for="c9"><span></span>{{ Lang::get('pages.f_c') }}</label>
                                </div>
                                <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                    <input type="checkbox"  value="1" @if(old('pool') == 1)  checked @endif id="c40" name="pool" class="main-checkbox">
                                    <label for="c40"><span></span>{{ Lang::get('pages.p_l') }}</label>
                                </div>
                                <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                    <input type="checkbox"  value="1" @if(old('yard') == 1)  checked @endif id="c41" name="yard" class="main-checkbox">
                                    <label for="c41"><span></span>{{ Lang::get('pages.yard') }}</label>
                                </div>
                                <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                    <input type="checkbox"  value="1" @if(old('hard_floor') == 1)  checked @endif id="c42" name="hard_floor" class="main-checkbox">
                                    <label for="c42"><span></span>{{ Lang::get('pages.h_f') }}</label>
                                </div>
                                <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                    <input type="checkbox"  value="1" @if(old('wal_closet') == 1)  checked @endif id="c43" name="wal_closet" class="main-checkbox">
                                    <label for="c43"><span></span>{{ Lang::get('pages.w_cl') }}</label>
                                </div>
                                <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                    <input type="checkbox"  value="1" @if(old('updated_kitchen') == 1)  checked @endif id="c44" name="updated_kitchen" class="main-checkbox">
                                    <label for="c44"><span></span>{{ Lang::get('pages.upde_kitc') }}</label>
                                </div>
                                <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                    <input type="checkbox"  value="1" @if(old('close_public') == 1)  checked @endif id="c45" name="close_public" class="main-checkbox">
                                    <label for="c45"><span></span>{{ Lang::get('pages.clo_tr') }}</label>
                                </div>
                                <div class="checkboxGroup" style="  float:left; margin-left: 10px;  padding: 10px;">
                                    <input type="checkbox"  value="1" @if(old('dog_park') == 1)  checked @endif id="c46" name="dog_park" class="main-checkbox">
                                    <label for="c46"><span></span>{{ Lang::get('pages.d_pa') }}</label>
                                </div>
                                <div class="checkboxGroup" style="float:left; margin-left: 10px;  padding: 10px;">
                                    <input type="checkbox" value="1" @if(old('move_in') == 1)  checked @endif id="c22" name="move_in" class="main-checkbox" >
                                    <label for="c22"><span></span>{{ Lang::get('listing.m_i_s') }}</label><br>
                                </div>
                                <div class="checkboxGroup" style="float:left; margin-left: 10px;  padding: 10px;">
                                    <input type="checkbox" value="1" @if(old('townhome_need') == 1)  checked @endif id="c22" name="townhome_need" class="main-checkbox" >
                                    <label for="c22"><span></span>{{ Lang::get('listing.m_i_s') }}</label><br>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection