
//Select month
function new_date(){
    var select = document.getElementById("select_month");
    location="/my?month=" + select.value + "";
}


/*MOBILE-MENU*/
$(document).ready(function() {
	$('.header-burger').click(function(event) {
	  $('body, .mobile-menu').toggleClass('show-menu');
	});

	$("input[id='modal_button']").click(function(){
		val_subject = $("input[name='subject']").val();
		val_message = $("input[name='message']").val();
		
		if(val_message != '' && val_subject != ''){
			$.post("../sources/php/modal.php", {subject: val_subject, message: val_message}, function (data){
				data = JSON.parse(data);
				$("div[id='button_modal_block']").empty();
				$("div[id='button_modal_block']").append(data);
			});
		}
	});
  });

//MODAL

document.addEventListener('DOMContentLoaded', function () {
	document.addEventListener('click', function (e) {
	  const $target = e.target;
	  if (!($target.closest('[data-toggle="modal"]') || $target.classList.contains('modal'))) {
		return;
	  }
	  e.preventDefault();
	  if ($target.classList.contains('close') || $target.classList.contains('modal')) {
		const $modal = $target.closest('.modal');
		document.body.style.removeProperty('overflow');
		$modal.style.removeProperty('margin-left');
		$modal.classList.remove('show');
		return;
	  }
	  const $modal = document.querySelector($target.closest('[data-toggle="modal"]').dataset.target);
	  const scrollbar = document.body.clientWidth - window.innerWidth + 'px';
	  document.body.style.overflow = 'hidden';
	  $modal.style.marginLeft = scrollbar;
	  $modal.classList.add('show');
	});
  });


  $(document).ready(function() {
	$("select[name='work_place']").click(function(){
		work_place = $("select[name='work_place']").val();
			
			$.post("/reg/place", {place: work_place}, function (data){
				data = JSON.parse(data);
				console.log(data);
				if(data == null){
					var p_block = "<label for='#adress'>Пользователи не добавили адреса данного заведения, поэтому укажите свой адресс</label>";
					var input_block = "<input type='adress' name='adress' id='adress' placeholder='Укажите адрес заведения'></input>"
					$("div[name='adress_block']").empty();
					$("div[name='adress_block']").append(p_block + input_block);
				}
				else{
					$("div[name='adress_block']").empty();
					var select = "<select name='adress'></select>";
					$("div[name='adress_block']").append(select);
					for (var id in data){
						$("select[name='adress']").append("<option value='" + data[id]['work_places_adress'] + "'>" + data[id]['work_places_adress'] + "</option>");
					}
				}
			});
	});


	$("input[name='check_place']").click(function(){
		check = $("input[name='check_place']").val();

		if(check == '0'){
			$("input[name='check_place']").val('1');
			
			if(typeof block == 'undefined'){
				block = $("div[name='places_list']").html();
			}
			
			$("div[name='places_list']").empty();
			$("div[name='places_list']").append("<input type='text' name='work_place' placeholder='Укажите название заведения'></input>");

			$("div[name='adress_block']").empty();
			$("div[name='adress_block']").append("<input type='adress' name='adress' placeholder='Укажите адрес заведения'></input>");
		}
		else{
			$("input[name='check_place']").val('0');
			
			$("div[name='places_list']").empty();
			$("div[name='places_list']").append(block);

			$("div[name='adress_block']").empty();
			$("select[name='work_place']").click(function(){
				work_place = $("select[name='work_place']").val();
				
					$.post("/reg/place", {place: work_place}, function (data){
						data = JSON.parse(data);
						
						if(data == null){
							var p_block = "<label for='#adress'>Пользователи не добавили адреса данного заведения, поэтому укажите свой адресс<label>";
							var input_block = "<input type='adress' name='adress' id='adress' placeholder='Укажите адрес заведения'></input>"
							$("div[name='adress_block']").empty();
							$("div[name='adress_block']").append(p_block + input_block);
						}
						else{
							$("div[name='adress_block']").empty();
							var select = "<select name='adress'></select>";
							$("div[name='adress_block']").append(select);
							for (var id in data){
								$("select[name='adress']").append("<option value='" + data[id]['work_places_adress'] + "'>" + data[id]['work_places_adress'] + "</option>");
							}
						}
					});
			});
		}
	});
  });



