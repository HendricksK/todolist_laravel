<!doctype html>
<html lang="{{ app()->getLocale() }}">
    @include('includes.head')
    <body>
        <input type="text" name="user_id" hidden value="{{ $username[0]->id }}">
        <div class="container">
            <h1>To Do List:
                @if (sizeof($username) != 0)       
                    {{ $username[0]->username }}
                @endif
            </h1>
        </div>
        <div class="container" id="to-do-list-items-container">           
            <table class="u-full-width">
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Complete</th>
                    </tr>
                </thead>
                <tbody id="to-do-list-table-body">
                @foreach ($todolist as $toDoObject)
                    <tr>
                        <td>{{ $toDoObject->description }}</td>
                        <td>
                        @if ($toDoObject->complete === 1)
                            <label class="switch">
                                <input id="to-do-list-item-{{ $toDoObject->id }}" type="checkbox" onclick="setToDoItemStatus({{ $toDoObject->id }})" checked>
                                <span class="slider round"></span>
                            </label>
                        @else
                            <label class="switch">
                                <input id="to-do-list-item-{{ $toDoObject->id }}" type="checkbox" onclick="setToDoItemStatus({{ $toDoObject->id }})">
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
