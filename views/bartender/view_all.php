<main class="my-main">
    <div class="my-block">
        <div class="my-block__content">
            <h3 class="my-block__header">Общая статистика по заведению</h3>
            <div class="my-table">
                <?php if(!empty($array_work) && count($array_work) > 0): ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Дата</th>
                            <th>Средний размер ЗП</th>
                            <th>Средняя касса</th>
                            <th>Средние чаевые</th>
                            <th>Кол-во работников</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($i=0; $i<count($array_work); $i++): ?>
                            <?php if ($array_work[$i]['AmountOfWorkers'] != 1): ?>
                                <tr>
                                    <td> <?php echo $array_work[$i]['Date']; ?> </td>
                                    <td> <?php echo $array_work[$i]['AvgWage']; ?> </td>
                                    <td> <?php echo $array_work[$i]['AvgKassa']; ?> </td>
                                    <td> <?php echo $array_work[$i]['AvgTips']; ?> </td>
                                    <td> <?php echo $array_work[$i]['AmountOfWorkers']; ?> </td>
                                </tr>
                            <?php else:?>
                                <tr>
                                    <td><?php echo $array_work[$i]['Date']; ?></td>
                                    <td colspan="4">Так как данные собраны только по одному пользователю, они были скрыты сайтом для конфиденциальности</td>
                                </tr>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </tbody>
                    <tfoot>
                    <?php if ($work_month[0]['col_users'] == 1): ?>
                        <tr>
                            <td>За месяц</td>
                            <td colspan="4">Так как данные собраны только по одному пользователю, они были скрыты сайтом для конфиденциальности</td>
                        </tr>
                    <?php else:?>
                        <tr>
                            <th>Среднее за день</th>
                            <td> <?php echo $AVG_day_work[0]['percent']; ?> </td>
                            <td> <?php echo $AVG_day_work[0]['kassa']; ?> </td>
                            <td> <?php echo $AVG_day_work[0]['tips']; ?> </td>
                            <td> <?php echo $work_month[0]['col_users']; ?></td>
                        </tr>
                        <tr>
                            <th>За месяц</th>
                            <td> <?php echo round($work_month[0]['percent']/$work_month[0]['col_users'], 0); ?> </td>
                            <td> <?php echo round($work_month[0]['kassa']/$work_month[0]['col_users'], 0); ?> </td>
                            <td> <?php echo round($work_month[0]['tips']/$work_month[0]['col_users'], 0); ?> </td>
                            <td> <?php echo $work_month[0]['col_users']; ?> </td>
                        </tr>
                    <?php endif; ?>
                    </tfoot>
                </table>
                <?php else: ?>
                    <p>За этот месяц данных пока что нет</p>
                <?php endif; ?>
            </div>
        </div>
        <div class="my-block__content">
            <h3 class="my-block__header">Общая статистика по всем официантам</h3>
            <div class="my-table">
                <?php if(!empty($array_work_all) && count($array_work_all) > 0): ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Дата</th>
                            <th>Средний размер ЗП</th>
                            <th>Средняя касса</th>
                            <th>Средние чаевые</th>
                            <th>Кол-во работников</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($i=0; $i<count($array_work_all); $i++): ?>
                        <tr>
                            <td> <?php echo $array_work_all[$i]['Date']; ?> </td>
                            <td> <?php echo $array_work_all[$i]['AvgWage']; ?> </td>
                            <td> <?php echo $array_work_all[$i]['AvgKassa']; ?> </td>
                            <td> <?php echo $array_work_all[$i]['AvgTips']; ?> </td>
                            <td> <?php echo $array_work_all[$i]['AmountOfWorkers']; ?> </td>
                        </tr>
                        <?php endfor; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Среднее за день</th>
                            <td> <?php echo $AVG_month_work[0]['percent']; ?> </td>
                            <td> <?php echo $AVG_month_work[0]['kassa']; ?> </td>
                            <td> <?php echo $AVG_month_work[0]['tips']; ?> </td>
                            <td> <?php echo $work_month_all[0]['col_users']; ?></td>
                        </tr>
                        <tr>
                            <th>За месяц</th>
                            <td> <?php echo round($work_month_all[0]['percent']/$work_month_all[0]['col_users'], 0); ?> </td>
                            <td> <?php echo round($work_month_all[0]['kassa']/$work_month_all[0]['col_users'], 0); ?> </td>
                            <td> <?php echo round($work_month_all[0]['tips']/$work_month_all[0]['col_users'], 0); ?> </td>
                            <td> <?php echo $work_month_all[0]['col_users']; ?> </td>
                        </tr>
                    </tfoot>
                </table>
                <?php else: ?>
                    <p>За этот месяц данных пока что нет</p>
                <?php endif; ?>
            </div>
        </div>
    </div>


</main>