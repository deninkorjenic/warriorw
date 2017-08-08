@include('layouts.main.navbar.dropdowns.big-screen')
@include('layouts.main.navbar.dropdowns.small-screen')
<nav class="nav">
    <div class="nav-wrapper">
        <a class="brand-logo" href="{{ url('/home') }}">
            <img alt="" src="{{asset('images/logo-dark.png')}}"/>
        </a>
        <a class="button-collapse" data-activates="mobile-nav" href="#">
            <i aria-hidden="true" class="fa fa-bars">
            </i>
        </a>
        <ul class="right hide-on-med-and-down" id="nav-mobile">
            <li>
                <a class="dropdown-button" data-activates="program-dropdown" href="#!">
                    Programs
                    <i class="material-icons right">
                        arrow_drop_down
                    </i>
                </a>
            </li>
            <li>
                <a class="dropdown-button" data-activates="admin-dropdown" href="#!">
                    Admin Stuff
                    <i class="material-icons right">
                        arrow_drop_down
                    </i>
                </a>
            </li>
        </ul>
        <ul class="side-nav" id="mobile-nav">
            <li>
                <a class="dropdown-button" data-activates="program-dropdown-small" href="#!">
                    Programs
                    <i class="material-icons right">
                        arrow_drop_down
                    </i>
                </a>
            </li>
            <li>
                <a class="dropdown-button" data-activates="admin-dropdown-small" href="#!">
                    Admin Stuff
                    <i class="material-icons right">
                        arrow_drop_down
                    </i>
                </a>
            </li>
        </ul>
    </div>
</nav>