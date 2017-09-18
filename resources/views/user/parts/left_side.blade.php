<div class="col-xs-12 col-md-3 col-md-pull-9">
    <div class="sidebar-left">
        <h3 class="sidebar-title">{{ Lang::get('profile.back') }}<span class="special-color">.</span></h3>
        <div class="title-separator-primary"></div>
        <div class="profile-info margin-top-60">
            <div class="profile-info-title negative-margin">{{ Auth::user()->first_name }}</div>
            <img src="@if(Auth::user()->avatar) {{ asset('assets\images').'/'.Auth::user()->avatar }}  @else {{ asset('images\agent3.jpg') }}@endif" alt="" class="pull-left">
            <div class="profile-info-text pull-left">
                <p class="subtitle-margin">Agent</p>
                <p class="">42 Estates</p>

                <a href="#" class="logout-link margin-top-30"><i class="fa fa-lg fa-sign-out"></i>Logout</a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="margin-top-30">
            <a href="{{ route('account' , ['id' => Auth::user()->id]) }}" class="button-primary  button-fulls">
                <span class="peofile_left_text">{{ Lang::get('profile.my_profile') }}</span>
                <div class="button-triangle"></div>
                <div class="button-triangle2"></div>
                <div class="button-icon"><i class="fa fa-user"></i></div>
            </a>
        </div>
        <div class="margin-top-15">
            <a href="{{ route('accountListing' , ['id' => Auth::user()->id]) }}" class="button-primary  button-fulls">
                <span class="peofile_left_text">{{ Lang::get('profile.my_listing') }}</span>
                <div class="button-triangle"></div>
                <div class="button-triangle2"></div>
                <div class="button-icon"><i class="fa fa-building-o"></i></div>
            </a>
        </div>
        <div class=" margin-top-15">
            <a href="my-profile.html" class="button-primary  button-fulls">
                <span class="peofile_left_text">{{ Lang::get('profile.dashboard') }}</span>
                <div class="button-triangle"></div>
                <div class="button-triangle2"></div>
                <div class="button-icon"><i class="fa fa-comment"></i></div>
            </a>
        </div>
        <div class=" margin-top-15">
            <a href="{{ route('savedListings' , ['id' => Auth::user()->id] )  }}" class="button-primary  button-fulls">
                <span class="peofile_left_text">Saved Listings </span>
                <div class="button-triangle"></div>
                <div class="button-triangle2"></div>
                <div class="button-icon"><i class="fa fa-search-plus"></i></div>
            </a>
        </div>
        <div class=" margin-top-15">
            <a href="{{ route('accountSavedSearches' , ['id' => Auth::user()->id] )  }}" class="button-primary  button-fulls">
                <span class="peofile_left_text">{{ Lang::get('profile.saved_searches') }}</span>
                <div class="button-triangle"></div>
                <div class="button-triangle2"></div>
                <div class="button-icon"><i class="fa fa-search-plus"></i></div>
            </a>
        </div>
        <div class=" margin-top-15">
            <a href="{{ route('accountFavorites' , ['id' => Auth::user()->id]) }}" class="button-primary  button-fulls">
                <span class="peofile_left_text">{{ Lang::get('profile.favorites') }}</span>
                <div class="button-triangle"></div>
                <div class="button-triangle2"></div>
                <div class="button-icon"><i class="fa fa-heart"></i></div>
            </a>
        </div>
        <div class=" margin-top-15">
            <a href="{{ route('userNotification'  , ['id' => Auth::user()->id]) }}" class="button-primary  button-fulls">
                <span class="peofile_left_text">{{ Lang::get('profile.notifi_set') }}</span>
                <div class="button-triangle"></div>
                <div class="button-triangle2"></div>
                <div class="button-icon"><i class="fa fa-envelope"></i></div>
            </a>
        </div>
    </div>
</div>