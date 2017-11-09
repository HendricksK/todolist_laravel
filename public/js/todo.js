(function(){

	debug("it's the way you walk, the way you talk")
	debug("all I do is stay up all night, losing sleep over you")
	getAllToDoItems()

})()

function debug(error) {
	console.log(error)
}

//remember forget about the semi colons they are not needed
//
function getAllToDoItems() {
	debug('do you like drugs')
	var xhr = new XMLHttpRequest()
	var id = 1
	// todo/{id}', 'ToDoController@getAllToDoListObjectsForUser
	xhr.open('GET', '/api/todo/1' )

	xhr.onload = function() {
	    if (xhr.status === 200 && xhr.readyState === 4) {
	    	debug(xhr.responseText)
	        // alert('User\'s name is ' + xhr.responseText);
	  //       var toDoList = JSON.parse(xhr.responseText);
	  //       var toDoListDom = '';

			// for(var x = 0; x < toDoList.length; x++) {
			// 	toDoListDom = toDoListDom + 
			// 	'<div><input id="checkbox_"'+ toDoList[x]['id'] +' data-id="' + toDoList[x]['id'] + '" type="checkbox" onclick="markSingleItemAsComplete(this)"><label for="checkbox_' + toDoList[x]['id'] + '">'
			// 	+ toDoList[x]['description'] + ' - ' + toDoList[x]['insert_date'] + '</label></div>';
			// }
			// document.getElementById('to-do-list').innerHTML = toDoListDom;
	       
	    }
	    else {
	        alert('Request failed.  Returned status of ' + xhr.status)
	    }
	}
	xhr.send()
}