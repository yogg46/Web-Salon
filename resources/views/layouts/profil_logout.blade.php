<div id="profile-menu" class="dropdown {{ $para }} ">

    @if ($para == 'is-right is-spaced dropdown-trigger user-dropdown')
        <div class="is-trigger" aria-haspopup="true">
            <div class="profile-avatar">
                <span class="h-icon is-info is-rounded text-black fw-bolder h-100">
                    @if (!is_null(Auth::user()->name))
                        <div class="is-4  title text-capitalize is-narrow is-thin  ">
                            {{ Str::substr(Auth::user()->name, 0, 2) }}
                        </div>
                    @endif

                </span>
            </div>
        </div>
    @else
        <span class="h-icon is-info is-rounded text-black  fw-bolder">
            @if (!is_null(Auth::user()->name))
                <div class="is-4  title text-capitalize is-narrow is-thin  ">
                    {{ Str::substr(Auth::user()->name, 0, 2) }}
                </div>
            @endif

        </span>
        {{-- <img src="https://via.placeholder.com/150x150" data-demo-src="/assets/img/avatars/photos/8.jpg"
            alt="" /> --}}
        <span class="status-indicator"></span>
    @endif




    <div class="dropdown-menu" role="menu">
        <div class="dropdown-content">
            <div class="dropdown-head">
                <div class="h-avatar is-large">
                    <span class="h-icon is-info is-rounded text-black fw-bolder h-100">
                        @if (!is_null(Auth::user()->name))
                            <div class="is-4  title text-capitalize is-narrow is-thin  ">
                                {{ Str::substr(Auth::user()->name, 0, 2) }}
                            </div>
                        @endif

                    </span>
                </div>
                <div class="meta">
                    <span>{{ Auth::user()->name }}</span>
                    <span>{{ Auth::user()->role }}</span>
                </div>
            </div>
            <a href="/profil" class="dropdown-item is-media">
                <div class="icon">
                    <i class="lnil lnil-user-alt"></i>
                </div>
                <div class="meta">
                    <span>Profile</span>
                    <span>View your profile</span>
                </div>
            </a>
            <hr class="dropdown-divider" />
            {{-- <a href="#" class="dropdown-item is-media">
                <div class="icon">
                    <i class="lnil lnil-cog"></i>
                </div>
                <div class="meta">
                    <span>Settings</span>
                    <span>Account settings</span>
                </div>
            </a> --}}
            <hr class="dropdown-divider" />
            <div class="dropdown-item is-button">
                <a class="button h-button  is-primary is-raised is-fullwidth logout-button "
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <span class="icon is-small">
                        <i data-feather="log-out"></i>
                    </span>
                    <span>Logout</span>
                </a>
            </div>
        </div>
    </div>
</div>
