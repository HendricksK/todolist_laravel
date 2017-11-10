(function(){

	debug("it's the way you walk, the way you talk")
	debug("all I do is stay up all night, losing sleep over you")

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
	    		
	    		if(toDoList[x].title === null) {
	    			toDoList[x].title = '';
	    		}

	    		if(toDoList[x].complete === 1) {
	    			toDoListDom = toDoListDom + '<tr><td>' + toDoList[x].title + '</td><td>' 
	    				+ toDoList[x].description + '</td><td><label class="switch"><input id="to-do-list-item-' + toDoList[x].id 
	    				+ '" type="checkbox" data-name="' + toDoList[x].description + '" onclick="setToDoItemStatus(' + toDoList[x].id + ')" checked><span class="slider round"></span></label></td><td><a class="button" href="#">Edit</a></td>';	
	    		} else {
	    			toDoListDom = toDoListDom + '<tr><td>' + toDoList[x].title + '</td><td>' 
	    			+ toDoList[x].description + '</td><td><label class="switch"><input id="to-do-list-item-' + toDoList[x].id 
	    			+ '" type="checkbox" data-name="' + toDoList[x].description + '" onclick="setToDoItemStatus(' + toDoList[x].id + ')"><span class="slider round"></span></label></td><td><a class="button" href="#">Edit</a></td>';
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
	var itemTitle = event.target.getAttribute('data-name')

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
	    	debug(xhr.responseText)
	    } else {
	    	if(status === 0) {
	    		alert(itemTitle + ' has been marked as incomplete')
	    	} else {
	    		alert(itemTitle + ' has been marked as complete')	
	    	}
	    	
	    	getAllToDoItems()
	    }
	}
	xhr.send(postParams)

}

function markAllItoDoItemsToComplete(id) {
	var itemTitle = event.target.getAttribute('data-name')

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
	    	debug(xhr.responseText)
	    } else {
	    	if(status === 0) {
	    		alert(itemTitle + ' has been marked as incomplete')
	    	} else {
	    		alert(itemTitle + ' has been marked as complete')	
	    	}
	    	
	    	getAllToDoItems()
	    }
	}
	xhr.send(postParams)

}

function createNewTodDoItem(userId) {

	var formData = document.getElementById('new-to-do-item-form')

    var title = formData.elements['to-do-title'].value
    var description = formData.elements['to-do-description'].value

    var xhr = new XMLHttpRequest()
	var postParams = 'user_id=' + userId + '&title=' + title + '&description=' + description

	xhr.open('POST', '/api/new-to-do-item/' + userId +',' + title + ',' + description)

	xhr.onload = function() {
	    if (xhr.status != 200 ) {
	    	debug(xhr.status)
	    	debug(xhr.responseText)
	    } else {
	    	alert(title + ' has been saved') 
	    	getAllToDoItems()
	    }
	}
	xhr.send(postParams)
}