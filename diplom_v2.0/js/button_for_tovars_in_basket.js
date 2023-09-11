// гг было бесполезно, надо через php делать(


function button_in_basket(button_in){

	var but_for_basket = button_in.but_for_basket;
	// блок в которой находиться кнопка "Удалить из корзины" и поле в котором написано "уже в корзине"
	var block_with_but_from_the_basket = document.getElementById('but_from_the_basket');
	// блок в которой находиться кнопка "В корзину"
	var block_with_button_in_basket = document.getElementById('but_in_basket');


	if (but_for_basket != "") {

		block_with_but_from_the_basket.style.width = '250px';
		block_with_but_from_the_basket.style.height = 'auto';
		block_with_but_from_the_basket.style.visibility = '1';
		block_with_but_from_the_basket.style.opacity = '1';
		block_with_but_from_the_basket.style.overflow = 'visible';
		block_with_but_from_the_basket.style.transition = 'all .9s ease';

		block_with_button_in_basket.style.width = '0px';
		block_with_button_in_basket.style.height = '0px';
		block_with_button_in_basket.style.visibility = '0';
		block_with_button_in_basket.style.opacity = '0';
		block_with_button_in_basket.style.overflow = 'hidden';
		block_with_button_in_basket.style.transition = 'all .9s ease';


		return false;

	}
	else {

		return true;

	}
	
}

// function button_from_the_basket(from_the_basket){

// 	var from_the_basket = from_the_basket.from_the_basket;
// 	var block_with_but_from_the_basket = document.getElementById('but_from_the_basket');
// 	var block_with_button_in_basket = document.getElementById('button_in_basket');

// 	block_with_but_from_the_basket.style.width = '0px';
// 	block_with_but_from_the_basket.style.height = '0px';
// 	block_with_but_from_the_basket.style.visibility = '0';
// 	block_with_but_from_the_basket.style.opacity = '0';
// 	block_with_but_from_the_basket.style.overflow = 'hidden';
// 	block_with_but_from_the_basket.style.transition = 'all .9s ease';
// }