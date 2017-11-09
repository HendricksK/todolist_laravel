<!doctype html>
<html lang="{{ app()->getLocale() }}">
    @include('includes.head')
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    About
                </div>

                <div class="content">
                    Figures I'm the bad guy, because I can't learn to trust...
                </div>
            </div>
        </div>
        @include('includes.footer')
    </body>
</html>
