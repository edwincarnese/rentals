<div class="col-lg-4 col-12 mb-sm-50 mb-xs-50">
    <ul class="myaccount-tab-list nav">
        <li>
            <a @if(url()->current() == route('pages.admin.index')) class="active" @endif href="{{ route('pages.admin.index') }}">
                <i class="pe-7s-user"></i>Profile
            </a>
        </li>
        <li>
            <a @if(url()->current() == route('admin.approval.list')) class="active" @endif href="{{ route('admin.approval.list') }}">
                <i class="pe-7s-photo"></i>Users For Approval
            </a>
        </li>
        {{-- <li>
            <a @if(url()->current() == route('lister.change.password')) class="active" @endif href="{{ route('lister.change.password') }}">
                <i class="pe-7s-lock"></i>Change Password
            </a>
        </li> --}}
        <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="pe-7s-power"></i>Log Out
            </a>
            <form id='logout-form' action="{{ route('logout') }}" method="POST" style="display:none">@csrf</form>
        </li>
    </ul>
</div>