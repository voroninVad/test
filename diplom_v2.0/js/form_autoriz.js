 function open_form_autoriz(data_form) {
	var but_autoriz = data_form.autoriz;
	var block_with_but_autoriz = document.getElementById('form_for_but');
	var position_block_with_form = document.getElementById('form_autoriz');
	var block_with_form = document.getElementById('form');
	
		if (but_autoriz!="") {

			// манипуляция над блоком в которой находится форма
			position_block_with_form.style.position = 'fixed';
			position_block_with_form.style.left = '50%';
			position_block_with_form.style.transform = 'translateX(-50%)';

			// манипуляция над формой при нажатии кнопки
			block_with_form.style.width = '250px';
			block_with_form.style.height = 'auto';
			block_with_form.style.visibility = '1';
			block_with_form.style.opacity = '1';
			block_with_form.style.overflow = 'visible';
			block_with_form.style.backgroundColor = 'rgba(0,218,218,0.5)';
			block_with_form.style.border = '2px solid black';
			block_with_form.style.transition = 'all .9s ease';

			// манипуляция над самой кнопкой после ее нажатия
			block_with_but_autoriz.style.visibility = '0';
			block_with_but_autoriz.style.opacity = '0';
			block_with_but_autoriz.style.transition = 'all .9s ease';

			return false;
		}
		else{
			return true;
		}
	
}

function close_form_autoriz(close_but) {
	var but_close = close_but.close;
	var block_with_but_autoriz = document.getElementById('form_for_but');
	var block_with_form = document.getElementById('form');

	if (but_close != "") {
			// манипуляция над формой при нажатии кнопки
			block_with_form.style.width = '0px';
			block_with_form.style.height = '0px';
			block_with_form.style.visibility = '0';
			block_with_form.style.opacity = '0';
			block_with_form.style.overflow = 'hidden';
			block_with_form.style.transition = 'all .9s ease';

			// манипуляция над самой кнопкой после ее нажатия
			block_with_but_autoriz.style.visibility = '1';
			block_with_but_autoriz.style.opacity = '1';
			block_with_but_autoriz.style.transition = 'all .9s ease';

			return false;
	}
	else{
		return true;
	}
}