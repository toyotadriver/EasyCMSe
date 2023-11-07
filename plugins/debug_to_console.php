<?php
/**
 * Outputs needed message to the console
 * @param int|string|array|bool|float|object $data
 * @param bool $type Output the type or not
 */
function debtoc($data, $type = 0)
{
    
    switch (gettype($data))
        {
            case 'NULL':
                $out = 'NULL';
                break;
            case 'integer':
                $out = $data;
                break;
            case 'boolean':
                $out = ($data);
                break;
            case 'string':
                $out = $data;
                break;
            case 'array':
                $out = implode(',', $data);
                break;
            case 'double':
                $out = (string) $data;
                break;
            case 'object':
                $out = 'Object, I cant handle objects :(';
                break;
            default:
                $out = 'Non-standart object';
                break;
        }
    $type == 1? $datatype = ' Type: ' . gettype($data) : '';
    echo <<<_oc
    <script>console.log("Debug: $out $datatype")</script>
    _oc;
}
?>