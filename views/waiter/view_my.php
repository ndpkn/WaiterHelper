<main class="my-main">
    <div class="my-block">
        <div class="my-block__content">
            <h3 class="my-block__header">Моя статистика</h3>
            <?php if(count($list_month) != 0): ?>
            <select id="select_month" onChange="new_date()">
                <?php for($i=0; $i<count($list_month); $i++): ?>
                    <?php $month_number = $list_month[$i]; ?>
                    <option value = "<?php echo $list_month[$i]; ?>" <?php if($month_number == $month) echo 'selected'; ?> > <?php echo $this->array_month[$month_number]; ?></option>
                    <?php endfor ?>
            </select> 
            <?php endif; ?>
            <div class="my-table">
                <?php if(!empty($result) && (count($result) > 0) && $result[0] != ''): ?>
    <table class="table">
        <thead>
            <tr>
                <th>Дата</th>
                <th>Зарплата</th>
                <th>Касса</th>
                <?php if($settings[0]['settings_tips'] == 'on'): ?>
                <th>Чаевые</th>
                <?php endif; ?>
                <?php if($settings[0]['settings_taxi'] == 'on'): ?>
                <th>Такси</th>
                <?php endif; ?>
                <?php if($settings[0]['settings_rub'] == 'on'): ?>
                <th>Натирка</th>
                <?php endif; ?>
                <?php if($settings[0]['settings_other'] == 'on'): ?>
                <th>Прочие расходы</th>
                <?php endif; ?>
                <th>Чистая прибыль</th>
            </tr>
        </thead>
        <tbody>
        <?php for($i=0; $i < count($result); $i++): ?>
            <tr>
                <td> <?php echo $result[$i]['information_date']; ?></td>
                <td> <?php echo $result[$i]['information_percent']; ?> </td>
                <td> <?php echo $result[$i]['information_kassa']; ?> </td>
                <?php if($settings[0]['settings_tips'] == 'on'): ?>
                <td> <?php echo $result[$i]['information_tips']; ?> </td>
                <?php endif; ?>
                <?php if($settings[0]['settings_taxi'] == 'on'): ?>
                <td> <?php echo $result[$i]['information_taxi']; ?> </td>
                <?php endif; ?>
                <?php if($settings[0]['settings_rub'] == 'on'): ?>
                <td> <?php echo $result[$i]['information_rub']; ?> </td>
                <?php endif; ?>
                <?php if($settings[0]['settings_other'] == 'on'): ?>
                <td> <?php echo $result[$i]['information_other']; ?></td>
                <?php endif; ?>
                <td> <?php $res = $result[$i]['information_percent'] + $result[$i]['information_tips'] - $result[$i]['information_taxi'] - $result[$i]['information_rub'] - $result[$i]['information_other']; echo $res; ?> </td>
            </tr> 
        <?php endfor; ?>   
        </tbody>
        <tfoot>
        <tr>
            <th>Среднее в день</th>
            <td><?php echo round($AVG_day[0]['percent']); ?></td>
            <td><?php echo round($AVG_day[0]['kassa']); ?></td>
            <?php if($settings[0]['settings_tips'] == 'on'): ?>
            <td><?php echo round($AVG_day[0]['tips']); ?></td>
            <?php endif; ?>
            <?php if($settings[0]['settings_taxi'] == 'on'): ?>
            <td><?php echo round($AVG_day[0]['taxi']); ?></td>
            <?php endif; ?>
            <?php if($settings[0]['settings_rub'] == 'on'): ?>
            <td><?php echo round($AVG_day[0]['rub']); ?></td>
            <?php endif; ?>
            <?php if($settings[0]['settings_other'] == 'on'): ?>
            <td><?php echo round($AVG_day[0]['other']); ?></td>
            <?php endif; ?>
            <td><?php $res = $AVG_day[0]['percent'] + $AVG_day[0]['tips'] - $AVG_day[0]['taxi'] - $AVG_day[0]['rub'] - $AVG_day[0]['other']; echo $res; ?></td>
        </tr>
        <tr>
            <th>Итог</th>
            <td><?php echo $result_outcome[0]['percent']; ?></td>
            <td><?php echo $result_outcome[0]['kassa']; ?></td>
            <?php if($settings[0]['settings_tips'] == 'on'): ?>
            <td><?php echo $result_outcome[0]['tips']; ?></td>
            <?php endif; ?>
            <?php if($settings[0]['settings_taxi'] == 'on'): ?>
            <td><?php echo $result_outcome[0]['taxi']; ?></td>
            <?php endif; ?>
            <?php if($settings[0]['settings_rub'] == 'on'): ?>
            <td><?php echo $result_outcome[0]['rub']; ?></td>
            <?php endif; ?>
            <?php if($settings[0]['settings_other'] == 'on'): ?>
            <td><?php echo $result_outcome[0]['other']; ?></td>
            <?php endif; ?>
            <td><?php $res = $result_outcome[0]['percent'] + $result_outcome[0]['tips'] - $result_outcome[0]['taxi'] - $result_outcome[0]['rub'] - $result_outcome[0]['other']; echo $res; ?></td>
        </tr>
        </tfoot>
    </table>
    <?php else:?>
        <p>За этот месяц данных пока что нет</p>
    <?php endif;?>
    </div>
            <div class="charts">
            <h3 class="my-block__header">График за 15 смен</h3>
                <div class="charts-1">
                    <div class="chartss" id="chartdiv"></div>
                </div>
            </div>


            </div>
            </div>
        </div>
</div>
</div>
</div>

</main>