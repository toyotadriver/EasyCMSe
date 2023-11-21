<?php
class Model_Parseusers extends Model{
    private $pdo;
    function __construct(){
        include 'dblogin.php';
        $this->pdo = new PDO($db_attr, $db_user, $db_pass, $db_opts);
    }
    public function get_data() {
        
        $users = file_get_contents('php://input');
        $data = json_decode($users, true);
        $pdo = &$this->pdo;
        
        $parse_users = function ($userdata) use (&$pdo) {
            $query = "SELECT COLUMN_NAME
            FROM INFORMATION_SCHEMA.COLUMNS
            WHERE TABLE_NAME = 'parsedusers'";
            $stmt = $pdo->query($query);
            $dbdata = $stmt->fetchAll();
            $dbcolumns = array_column($dbdata,"COLUMN_NAME");
            $dbcolumns = array_slice($dbcolumns, 1, -1);
            $dbcolumnsstring = implode(",", $dbcolumns);
            $dbcolumns = array_flip($dbcolumns);
             //deleting 'id' and 'date_of_reg'
            
            

            $query = "SELECT COLUMN_NAME
            FROM INFORMATION_SCHEMA.COLUMNS
            WHERE TABLE_NAME = 'parsedaddress'";
            $stmt = $pdo->query($query);
            $addresscolumns = $stmt->fetchAll();
            $addresscolumns = array_column($addresscolumns, 'COLUMN_NAME');
            $addressstring = implode(',', $addresscolumns);
            $addresscolumns = array_flip($addresscolumns);
            unset($addresscolumns['id']);

            $query = "SELECT COLUMN_NAME
            FROM INFORMATION_SCHEMA.COLUMNS
            WHERE TABLE_NAME = 'parsedgeo'";
            $stmt = $pdo->query($query);
            $geocolumns = $stmt->fetchAll();
            $geocolumns = array_column($geocolumns,"COLUMN_NAME");
            $geostring = implode(",", $geocolumns);
            $geocolumns = array_flip($geocolumns);
            unset($geocolumns["id"]);

            $query = "SELECT COLUMN_NAME
            FROM INFORMATION_SCHEMA.COLUMNS
            WHERE TABLE_NAME = 'parsedcompany'";
            $stmt = $pdo->query($query);
            $companycolumns = $stmt->fetchAll();
            $companycolumns = array_column($companycolumns,"COLUMN_NAME");
            $companystring = implode(",", $companycolumns);
            $companycolumns = array_flip($companycolumns);
            unset($geocolumns["id"]);

            $diffs = [];
            foreach ($userdata as $user) {
                $diff = array_diff_key($user, $dbcolumns);
                array_push($diffs, $diff);
                
                $intersect1 = array_intersect_key($user, $dbcolumns);
                $date_of_adding = date("Y-m-d H:i:s");
                $interstring1 = "'" . implode("','", $intersect1) . "','$date_of_adding'";
                $query = "INSERT INTO parsedusers($dbcolumnsstring, date_of_adding) VALUES($interstring1)";
                //$pdo->query($query);
                $last_insert_id = $pdo->lastInsertId();

                $address = $diff['address'];
                $company = $diff['company'];
                $geo = $address['geo'];

                $intersect = array_intersect_key($address, $addresscolumns);
                $interstring = "'$last_insert_id','" . implode("','", $intersect) . "'";
                $query = "INSERT INTO parsedaddress($addressstring) VALUES($interstring)";
                //$pdo->query($query);

                $intersect = array_intersect_key($geo, $geocolumns);
                $interstring = "'$last_insert_id','" . implode("','", $intersect) . "'";
                $query = "INSERT INTO parsedgeo($geostring) VALUES($interstring)";
                //$pdo->query($query);

                $intersect = array_intersect_key($company, $companycolumns);
                $interstring = "'$last_insert_id','" . implode("','", $intersect) . "'";
                $query = "INSERT INTO parsedcompany($companystring) VALUES($interstring)";
                //$pdo->query($query);  
            }
            $return = $addressstring;
            return $return;
            
            //Если один из элементов - массив, то искать соответствующую таблицу
        };
        return $parse_users($data);
    }
}