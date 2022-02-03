$(document).ready (function() {

    $("input[id='but_email']").click(function (){
        $.get("https://waiter-helper.ru/email/mail", {act: 'success'}, function (data){
            data = JSON.parse(data);
            $("div[id='block_email']").empty();
            $("div[id='block_email']").append("<p>" + data + "</p>")
        });
    });


    $("select[name='work']").click(function(){
		work_place = $("select[name='work']").val();
		
			$.post("/settings/place", {place: work_place}, function (data){
				data = JSON.parse(data);

				if(data == null){
					var p_block = "<label for='#adress'>Пользователи не добавили адреса данного заведения, поэтому укажите свой адресс</label>";
					var input_block = "<input type='adress' name='adress' id='adress' placeholder='Укажите адрес заведения'></input>"
					$("div[name='adress_list']").empty();
					$("div[name='adress_list']").append(p_block + input_block);
				}
				else{
					$("div[name='adress_list']").empty();
					var select = "<select name='adress'></select>";
					$("div[name='adress_list']").append(select);
					for (var id in data){
						$("select[name='adress']").append("<option value='" + data[id]['work_places_adress'] + "'>" + data[id]['work_places_adress'] + "</option>");
					}
				}
			});
	});

	block_place = $("div[name='places_list']").html();
	block_adress = $("div[name='adress_list']").html();

	$("input[name='new_work']").click(function(){
		check = $("input[name='new_work']").val();
		if(check == '0'){
			$("input[name='new_work']").val('1');
			
			$("div[name='places_list']").empty();
			$("div[name='places_list']").append("<input type='text' name='work' placeholder='Укажите название заведения'></input>");

			$("div[name='adress_list']").empty();
			$("div[name='adress_list']").append("<input type='adress' name='adress' placeholder='Укажите адрес заведения'></input>");
		}
		else{
			$("input[name='new_work']").val('0');
			
			$("div[name='places_list']").empty();
			$("div[name='places_list']").append(block_place);

			$("div[name='adress_list']").empty();
			$("div[name='adress_list']").append(block_adress);

			$("select[name='work']").click(function(){
				work_place = $("select[name='work']").val();
				
					$.post("/settings/place", {place: work_place}, function (data){
						data = JSON.parse(data);
						
						if(data == null){
							var p_block = "<label for='#adress'>Пользователи не добавили адреса данного заведения, поэтому укажите свой адресс<label>";
							var input_block = "<input type='adress' name='adress' id='adress' placeholder='Укажите адрес заведения'></input>"
							$("div[name='adress_list']").empty();
							$("div[name='adress_list']").append(p_block + input_block);
						}
						else{
							$("div[name='adress_list']").empty();
							var select = "<select name='adress'></select>";
							$("div[name='adress_list']").append(select);
							for (var id in data){
								$("select[name='adress']").append("<option value='" + data[id]['work_places_adress'] + "'>" + data[id]['work_places_adress'] + "</option>");
							}
						}
					});
			});
		}
	});
});