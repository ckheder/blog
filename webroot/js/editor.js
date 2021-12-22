/**
 * editor.js
 *
 * Insertion de tags défini dans les paraèmtres du bouton à la position du curseur
 *
 */

	function insertAtCaret(areaId,text) {

		var txtarea = document.getElementById(areaId);
		
		var strPos = 0;
		
		strPos = txtarea.selectionStart;
	
		var front = (txtarea.value).substring(0,strPos);  

		var back = (txtarea.value).substring(strPos,txtarea.value.length);

		txtarea.value=front+text+back;

		strPos = strPos + text.length;
	
		txtarea.selectionStart = strPos;

		txtarea.selectionEnd = strPos;

		txtarea.focus();
			
	}

// suppression des <br> lors de l'edition d'un article

		function removebr()
	{
		var txtarea = document.getElementById('corps_message').value;

		txtarea = txtarea.split('<br />').join('');

		document.getElementById('corps_message').textContent = txtarea; 
                                      
	}