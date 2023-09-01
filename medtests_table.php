<?php
include_once 'dblogin.php';
include_once 'styles/tables.css';
$cid = $_SESSION['userid'];

$mpdo = new PDO($db_attr, $db_user, $db_pass, $db_opts);

$query = "SELECT * from tests WHERE client_id=$cid";
$mstmt = $mpdo->query($query);
$result = $mstmt->fetch();
$resultwoid = array_slice($result, 1);

$gen_results = '';
$a_dict = [
    'leukocytes' => ['Лейкоциты' , [3.89, 9.23]],
    'erythrocytes' => ['Эритроциты' , [4.3, 5.57]],
    'hemoglobin' => ['Гемоглобин' , [13.9, 16.7]],
    'jija' => ['Жижа' , [0.1, 1.5]],
    'tykvo' => ['Тыкво' , [12, 17.8]],
    'ligma' => ['Лигма' , [150, 159.9]]
];
foreach ($resultwoid as $item => $value){
    $a_name = $a_dict[$item][0];
    $a_norm = $a_dict[$item][1];
    $a_nleft = $a_norm[0];
    $a_nright = $a_norm[1];
    if ($value < $a_nleft || $value > $a_nright){
        $final_value = '<b>' . $value . '</b>';
    } else{
        $final_value = $value;
    }
    $gen_results .= "<tr><td>$a_name</td><td>$final_value</td><td>Процентов</td><td>$a_nleft - $a_nright</td></tr>";
}

$table_container = <<<_tc
<div class='wide-content'>
    <div class='m-col-el'>
        <div id='table-container'>
            <div class='tc-text'>
                <span class='tc-text-span'>
                    Анализы вашей мочи
                </span>
                <div class='tc-table'>
                    <table id='analyzes-table'>
                        <tr><th>Аналит</th><th>Результат</th><th>Единицы</th><th>Референс</th></tr>
                        <tr><th>Общий анализ</th></tr>
                        $gen_results
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
_tc;
echo $table_container;
?>