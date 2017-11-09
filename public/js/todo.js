(function(){

	debug("it's the way you walk, the way you talk")
	debug("all I do is stay up all night, losing sleep over you")
	// document.getElementById('to-do-list-item').addEventListener('click', setToDoItemStatus);

})()

function debug(error) {
	console.log(error)
}

//remember forget about the semi colons they are not needed
//
function getAllToDoItems() {
	var xhr = new XMLHttpRequest()
	var id = 1
	// todo/{id}', 'ToDoController@getAllToDoListObjectsForUser
	xhr.open('GET', '/api/todo/1' )

	xhr.onload = function() {
	    if (xhr.status === 200 && xhr.readyState === 4) {
	    	var toDoList = JSON.parse(xhr.responseText)
	    	var toDoListDom = '';
	    	
	    	for(var x = 0; x < toDoList.length; x++) {
	    		if(toDoList[x].complete === 1) {
	    			toDoListDom = toDoListDom + '<tr><td>' + toDoList[x].description + '</td><td><label class="switch"><input id="to-do-list-item-' + toDoList[x].id + '" type="checkbox" onclick="setToDoItemStatus(' + toDoList[x].id + ')" checked><span class="slider round"></span></label></td>';	
	    		} else {
	    			toDoListDom = toDoListDom + '<tr><td>' + toDoList[x].description + '</td><td><label class="switch"><input id="to-do-list-item-' + toDoList[x].id + '" type="checkbox" onclick="setToDoItemStatus(' + toDoList[x].id + ')"><span class="slider round"></span></label></td>';
	    		}
				
			}

			document.getElementById('to-do-list-table-body').innerHTML = toDoListDom

	    } else {
	        alert('Request failed.  Returned status of ' + xhr.status)
	    }
	}
	xhr.send()
}

function setToDoItemStatus(id) {
	debug(event.target)
	debug(event.target.checked)
	debug(id)

	var status = 0

	if (event.target.checked) {
		status = 1
	}

	var xhr = new XMLHttpRequest()
	var postParams = 'id=' + id + '&status=' + status
	// todo/{id}', 'ToDoController@getAllToDoListObjectsForUser
	xhr.open('POST', '/api/set-to-do-status/' + id +',' + status )

	xhr.onload = function() {
	    if (xhr.status != 200 ) {
	    	debug(xhr.status)
	    } else {
	    	getAllToDoItems()
	    }
	}
	xhr.send()

}

// var description = document.getElementById('new-todo-item').value;
// var id = 1;
// var postParams = 'id=' +  id + '&description=' + description;

// xhr = new XMLHttpRequest();
// xhr.open('POST', getBaseUrl() + 'new-to-do-item');
// xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

// xhr.onreadystatechange = function() {
// if(xhr.status != 200) {
//     	alert('An error has occured, please try again');
// 	}
// 	reloadToDoList();
// } 

// xhr.send(postParams);