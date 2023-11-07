<?php
class Model_Medtests extends Model{
    private $pdo;
    public function get_data(){
        include 'dblogin.php';
        $userid = $_SESSION['userid'];
        $this->pdo = new PDO($db_attr, $db_user, $db_pass, $db_opts);
        $testsstmt = $this->pdo->query("SELECT * FROM tests WHERE client_id=$userid");
        $testsnamesstmt = $this->pdo->query("SELECT * FROM tests_names");
        $t_result = $testsstmt->fetch();
        $tn_result = $testsnamesstmt->fetchAll();
        $t_result = array_slice($t_result, 1);
        $maxi = count($tn_result);
        $data = [];
        foreach ($t_result as $an => $an_value){
            for ($i=0; $i < $maxi; $i++){
                $an_name = $tn_result[$i]['name'];
                if ($an_name == $an){
                    $ix = $i;
                    break;
                };
            }
            $an_tr = $tn_result[$ix]['translation'];
            $an_low = $tn_result[$ix]['lower'];
            $an_up = $tn_result[$ix]['upper'];
            array_push($data, ['analyte' => $an_tr, 'value' => $an_value, 'lower' => $an_low, 'upper' => $an_up]);
        }
        return $data;
    }
}
?>