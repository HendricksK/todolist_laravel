<!doctype html>
<html lang="{{ app()->getLocale() }}">
    @include('includes.head')
    <body>
        <input type="text" name="user_id" hidden value="{{ $username[0]->id }}">
        <div class="container">
            <div class="ten columns">
                <h1>To Do List:
                    @if (sizeof($username) != 0)       
                        {{ $username[0]->username }}
                    @endif
                </h1>
            </div>
            <div class="two columns">
                <a class="button open-modal new-to-do-item">New to do...</a>
            </div>
        </div>
        @if (sizeof($todolist) != 0)
        <div class="container to-do-list" id="to-do-list-items-container">           
            <table class="u-full-width">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Complete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody id="to-do-list-table-body">
                @foreach ($todolist as $toDoObject)
                    <tr>
                        <td>{{ $toDoObject->title }}</td>
                        <td>{{ $toDoObject->description }}</td>
                        <td>
                            @if ($toDoObject->complete === 1)
                                <label class="switch">
                                    <input id="to-do-list-item-{{ $toDoObject->id }}" type="checkbox" data-name="{{ $toDoObject->description }}" onclick="setToDoItemStatus({{ $toDoObject->id }})" checked>
                                    <span class="slider round"></span>
                                </label>
                            @else
                                <label class="switch">
                                    <input id="to-do-list-item-{{ $toDoObject->id }}" type="checkbox" data-name="{{ $toDoObject->description }}" onclick="setToDoItemStatus({{ $toDoObject->id }})">
                                    <span class="slider round"></span>
                                </label>
                            @endif
                        </td>
                        <td>
                            <a class="button" href="#">Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @else
            <div class="container">
                <div>Nothing to see here</div>    
            </div>
        @endif
        
<!--         <div class="container new-to-do-item">
            <form>
                <div class="row">
                    <div class="twelve columns">
                        <label for="to-do-title">Item title</label>
                        <input class="u-full-width" type="text" placeholder="Need to go grocery shopping" id="to-do-title" name="to-do-title">
                    </div>
                </div>
                <label for="to-dp-description">Item description</label>
                <textarea class="u-full-width" placeholder="1. Need to get some string cheese ..." id="to-dp-description" name="to-do-description"></textarea>
                <input class="button-primary" type="submit" value="Submit">
            </form>
        </div> -->
        
        <div class="modal">
            <div class="modal-inner">
                <div class="modal-content">
                    <div class="modal-close-icon">
                        <a href="javascript:void(0)" class="close-modal"><i class="fa fa-times" aria-hidden="true"></i></a>
                    </div>
                    <div class="modal-content-inner">
                          <form>
                            <div class="row">
                                <div class="twelve columns">
                                    <label for="to-do-title">Item title</label>
                                    <input class="u-full-width" type="text" placeholder="Need to go grocery shopping" id="to-do-title" name="to-do-title">
                                </div>
                            </div>
                            <label for="to-dp-description">Item description</label>
                            <textarea class="u-full-width" placeholder="1. Need to get some string cheese ..." id="to-dp-description" name="to-do-description"></textarea>
                            <!-- <input class="button-primary close-modal" type="submit" value="Submit">
                            <button class="button close-modal">Cancel</button> -->
                            <div class="twelve columns">
                                <a href="javascript:void(0)" class="close-modal button">Cancel</a>
                                <input class="close-modal button-primary" type="submit" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    @include('includes.footer')
    </body>
</html>
