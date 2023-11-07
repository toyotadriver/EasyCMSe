<?php
class Model_Login extends Model
{
    private $email;
    private $password;
    function __construct($e, $p)
    {
        $this->email = $e;
        $this->password = $p;
    }
    public function get_data()
    {
        include 'dblogin.php';
        $lipdo = new PDO($db_attr, $db_user, $db_pass, $db_opts);
        $query = "SELECT * FROM users WHERE email='" . $this->email . "'";
        $r = $lipdo->query($query);
        $result = $r->fetch();
        if (!empty($result)) {
            $pwhash = $result['password'];
            if (password_verify($this->password, $pwhash)) {
                return [
                    'first_name' => $result['first_name'],
                    'id' => $result['id']
                ];
            } else {
                return FALSE;
            }
        }
    }
}
?>