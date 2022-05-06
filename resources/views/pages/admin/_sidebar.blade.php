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
        <li>
            <a @if(url()->current() == route('pages.admin.listers')) class="active" @endif href="{{ route('pages.admin.listers') }}">
                <i class="pe-7s-user"></i>All Listers
            </a>
        </li>
        <li>
            <a @if(url()->current() == route('pages.admin.clients')) class="active" @endif href="{{ route('pages.admin.clients') }}">
                <i class="pe-7s-user"></i>All Clients
            </a>
        </li>
        <li>
            <a @if(url()->current() == route('admin.properties.index')) class="active" @endif href="{{ route('admin.properties.index') }}">
                <i class="pe-7s-photo"></i>All Properties
            </a>
        </li>
        <li>
            <a @if(url()->current() == route('admin.transaction')) class="active" @endif href="{{ route('admin.transaction') }}">
                <i class="pe-7s-note2"></i>All Transactions
            </a>
        </li>   
        <li>
            <a @if(url()->current() == route('admin.change.password')) class="active" @endif href="{{ route('admin.change.password') }}">
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