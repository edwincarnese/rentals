<div class="col-lg-4 col-12 mb-sm-50 mb-xs-50">
    <ul class="myaccount-tab-list nav">
        <li>
            <a @if(url()->current() == route('lister.profile')) class="active" @endif href="{{ route('lister.profile') }}">
                <i class="pe-7s-user"></i>Profile
            </a>
        </li>
        <li>
            <a @if(url()->current() == route('client.bookings')) class="active" @endif href="{{ route('client.bookings') }}">
                <i class="pe-7s-note2"></i>Bookings
            </a>
        </li>
        <li>
            <a @if(url()->current() == route('client.show')) class="active" @endif href="{{ route('client.show') }}">
                <i class="pe-7s-photo"></i>Properties
            </a>
        </li>
        {{-- <li>
            <a @if(url()->current() == route('lister.properties.create')) class="active" @endif href="{{ route('lister.properties.create') }}">
                <i class="pe-7s-back fa-flip-horizontal"></i>Add New Property
            </a>
        </li> --}}
        <li>
            <a @if(url()->current() == route('lister.change.password')) class="active" @endif href="{{ route('lister.change.password') }}">
                <i class="pe-7s-lock"></i>Change Password
            </a>
        </li>
        <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="pe-7s-power"></i>Log Out
            </a>
            <form id='logout-form' action="{{ route('logout') }}" method="POST" style="display:none">@csrf</form>
        </li>
    </ul>
</div>