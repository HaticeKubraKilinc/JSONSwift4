<?php
class DbOperation
{
    private $conn;
 
    //Constructor
    function __construct()
    {

        //require_once dirname(__FILE__) . '/serviceX.php';
        require_once dirname(__FILE__) . '/Constants.php';
        require_once dirname(__FILE__) . '/DbConnect.php';
        // opening db connection
        $db = new DbConnect();
        $this->conn = $db->connect();
    }
 
    //Function to create a new user
    /* mysqli_bind_param sql sorgularınızı parametre olarak girmenizi sağlamaktadır.
Avantajlar
Kullanıldığında hiç bir şekilde sql injection yani dışardan sql verisi elde edilemez. Tamamen güvenlik amaçlıdır.
Bir diğer avantajı ise sql sorgularınızı daha pratik hale getirmeniz. Büyük bir script yazmaya kalktığınızda ölüm gibi gelen o sorgularınızı daha da pratik hale getirebilirsiniz.*/
    public function createUser($username, $password, $email, $fullname)
    {
        if (!$this->isUserExist($username, $email, $fullname)) {
            $password = md5($password);
            $stmt = $this->conn->prepare("INSERT INTO user (username, password, email, fullname) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $username, $password, $email, $fullname);
            if ($stmt->execute()) {
                return USER_CREATED;
            } else {
                return USER_NOT_CREATED;
            }
        } 

        else {
            return USER_ALREADY_EXIST;
        }
    }
 
 
    private function isUserExist($username, $email, $fullname)
    {
        $stmt = $this->conn->prepare("SELECT id FROM user WHERE username = ? OR email = ? OR fullname = ?");
        $stmt->bind_param("sss", $username, $email, $fullname);
        $stmt->execute();
        $stmt->store_result();
        return $stmt->num_rows > 0;
    }
}
?>