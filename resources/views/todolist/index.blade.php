<!doctype html>
<html lang="{{ app()->getLocale() }}">
    @include('includes.head')
    <body>
        <div class="container">
            <h1>To Do List:
                @if (sizeof($username) != 0)       
                    {{ $username[0]->username }}
                @endif
            </h1>
        </div>
        <div class="container">           
            <table class="u-full-width">
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Complete</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($todolist as $toDoObject)
                    <tr>
                        <td>{{ $toDoObject->description }}</td>
                        <td>
                        @if ($toDoObject->complete === 1)
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider round"></span>
                            </label>
                        @else
                            <label class="switch">
                                <input type="checkbox">
                                <span class="slider round"></span>
                            </label>
                        @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    @include('includes.footer')
    </body>
</html>
