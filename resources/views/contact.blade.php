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
                    Contact
                </div>

                <div class="content">
                    Tell me boy, how in the fuck would you feel, if you could not get me back? 
                </div>
            </div>
        </div>
        @include('includes.footer')
    </body>
</html>
