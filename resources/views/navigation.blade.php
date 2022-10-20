<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-white border-bottom shadow-sm mb-3" style="justify-content: space-between">
    <h5 class="my-0 mr-md-auto font-weight-normal">Laravel App</h5>
    <nav class="navbar navbar-expand-md navbar-light bg-white">
        @if (!\Illuminate\Support\Facades\Auth::guest())
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li><a href="{{route('home')}}" class="p-2 text-dark">Home</a></li>
                <li><a href="{{route('home.contact')}}" class="p-2 text-dark">Contact</a></li>
                <li><a href="{{route('posts.index')}}" class="p-2 text-dark">Blog Posts</a></li>
                <li><a href="{{route('posts.create')}}" class="p-2 text-dark">Add Blog Post</a></li>
            </ul>
        @endif
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ms-auto">
            <!-- Authentication Links -->
            @guest
                    <li class="nav-item"><a href="{{route('home')}}" class="p-2 text-dark nav-link">Home</a></li>
                    <li class="nav-item"><a href="{{route('home.contact')}}" class="p-2 text-dark nav-link">Contact</a></li>
                    <li class="nav-item"><a href="{{route('posts.index')}}" class="p-2 text-dark nav-link">Blog Posts</a></li>
                    <li class="nav-item"><a href="{{route('posts.create')}}" class="p-2 text-dark nav-link">Add Blog Post</a></li>

                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </nav>
</div>
