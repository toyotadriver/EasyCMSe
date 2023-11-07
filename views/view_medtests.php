<link href='styles/tables.css' rel='stylesheet'></style>
<div class='wide-content'>
    <div class='m-col-el'>
        <div id='table-container'>
            <div class='tc-text'>
                <span class='tc-text-span'>
                    Анализы мочи вашей
                </span>
                <?php 
                    if ($data){
                    $rows = '';
                    foreach ($data as $an => $values){
                        $analyte = $values['analyte'];
                        $value = $values['value'];
                        $lower = $values['lower'];
                        $upper = $values['upper'];
                        $rows .= "<tr><td>$analyte</td><td>$value</td><td>Проценты</td><td>$lower - $upper</td></tr>";
                    }
                    $table =  <<<_table
                    <div class='tc-table'>
                        <table id='analyzes-table'>
                            <tr><th>Аналит</th><th>Результат</th><th>Единицы</th><th>Референс</th></tr>
                            <tr><th colspan='4'>Общий анализ</th></tr>
                            $rows
                        </table>
                    _table;
                    echo $table;
                    } else{
                        echo "<span class='span-error-text'>Нет доступных результатов анализов</span>";
                    };
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>