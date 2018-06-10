<?php
Class AdminModel extends CI_Model 
{

    Public function __construct() 
    {
        parent::__construct();
        $this->pdo = $this->load->database('pdo', true);
    }

    public function LogIn($username,$password)
    {
        try
        {
            $sql = "SELECT log_id FROM log_in WHERE username = ? AND password = ?";
            $stmt = $this->pdo->query($sql,array($username,$password));
            $result = $stmt->result();
            return (array) $result[0];
        } 
        catch (Exception $ex) 
        {
            echo $ex;
            exit;
        }
    }
    
	
	
	

}
?>