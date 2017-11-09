<!doctype html>
<html lang="{{ app()->getLocale() }}">
    @include('includes.head')
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="content">
                    {{ $id }}
                </div>
            </div>
        </div>
        @include('includes.footer')
    </body>
</html>
