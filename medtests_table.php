<?php
include_once 'dblogin.php';
include_once 'styles/tables.css';


$table_container = <<<_tc
<div id='table-container'>
    <div class='tc-text'>
        <span class='tc-text-span'>
        </span>
        <div class='tc-table'>
            <table>
            <tr><th>Аналит</th><th>Результат</th><th>Единицы</th><th>Референс</th></tr>
            <tr><th>Общий анализ</th></tr>
            <tr><td>Моча</td><td>0.5</td><td>Процентов</td><td>0.1-0.9</td></tr>
            </table>
        </div>
    </div>
</div>
_tc;
?>