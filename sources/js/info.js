$(document).ready (function() {

    $("input[name='percent']").change(function (){
        $.get("../sources/php/percent.php", function(data){
            data = JSON.parse(data);
            var percent = data[0];
            var Wage =  $("input[name=percent]").val();
            var kassa = Wage * 100/percent;
            $("input[name=kassa]").val(kassa);
        })
    });

    $("input[name='kassa']").change(function (){
        $.get("../sources/php/percent.php", function(data){
            data = JSON.parse(data);
            var percent = data[0];
            var kassa =  $("input[name=kassa]").val();
            var Wage = kassa * percent/100;
            $("input[name=percent]").val(Wage);
        })
    });

    $("input[id='date']").change(function (){
        var work_date = $("input[id=date]").val();
        
        $.get("../sources/php/date.php", {date: work_date}, function (data){
                data = JSON.parse(data);
                if( data != false){
                    var percent = data[2];
                    var kassa = data[3];
                    var tips = data[4];
                    var taxi = data[5];
                    var rub = data[6];
                    var other = data[7];

                    $("input[name=act]").val('update');
                    if ($("input[name='delete']").length == false){
                        $("div[id='button_block']").append("<input class='info-enter' type='submit' name='delete' value='Удалить данные' />");
                    }
                    $("input[name=percent]").val(percent);
                    $("input[name=kassa]").val(kassa);
                    $("input[name=tips]").val(tips);
                    $("input[name=taxi]").val(taxi);
                    $("input[name=rub]").val(rub);
                    $("input[name=other]").val(other);
                    $("input[name=sub]").val("Изменить данные");
                }
                else {
                    $("input[name=act]").val('insert');
                    $("input[name=delete]").remove();
                    $("input[name=percent]").val('');
                    $("input[name=kassa]").val('');
                    $("input[name=tips]").val('');
                    $("input[name=taxi]").val('');
                    $("input[name=rub]").val('');
                    $("input[name=other]").val('');
                    $("input[name=sub]").val("Добавить данные");
                }
        });
    });
});
    
