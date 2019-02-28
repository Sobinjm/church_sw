jQuery(function($) {

	// QWERTY Text Input
	// The bottom of this file is where the autocomplete extension is added
	// // ********************
	// $('#text').keyboard({ layout: 'qwerty' });

	// $('.version').html( '(v' + $('#text').getkeyboard().version + ')' );

	// // Contenteditable
	// // ********************
	// $.keyboard.keyaction.undo = function (base) {
	// 	base.execCommand('undo');
	// 	return false;
	// };
	// $.keyboard.keyaction.redo = function (base) {
	// 	base.execCommand('redo');
	// 	return false;
	// };


	// // QWERTY Password
	// // ********************
	// $('.password').keyboard({
	// 	openOn   : null,
	// 	stayOpen : true,
	// 	layout   : 'qwerty'
	// });
	// $('.password-opener').click(function(){

	// 	var kb = $(this).getkeyboard();
	// 	// close the keyboard if the keyboard is visible and the button is clicked a second time
	// 	if ( kb.isOpen ) {
	// 		kb.close();
	// 	} else {
	// 		kb.reveal();
	// 	}
	// });



	

});


	
	$(document).delegate('.password-opener','click',function(){
		var el=$(this);
	//alert(el.val());
el.keyboard({
		openOn   : null,
		stayOpen : true,
		layout   : 'qwerty'
	});

		///alert();
		$('#text').keyboard({ layout: 'qwerty' });

	$('.version').html( '(v' + $('#text').getkeyboard().version + ')' );

			//alert( $(this).val());
			//console.log("Keyboard opener");
		var kb = $(this).getkeyboard();
		// close the keyboard if the keyboard is visible and the button is clicked a second time
		if ( kb.isOpen ) {
			kb.close();
		} else {
			kb.reveal();
		}
		});


