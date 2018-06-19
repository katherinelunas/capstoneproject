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
    
	public function GetAnnouncement() //Conditions to follow
	{
		
		try
        {
			$sql = " SELECT * FROM announcement";
			$stmt = $this->pdo->query($sql);
            
            return $stmt;
        } 
        catch (Exception $ex) 
        {
            echo $ex;
            exit;
        }
	}
	
	public function AddAnnouncement($an_name, $an_type, $an_date, $an_time, $an_details)
	{
		try
		{
			$sql = "INSERT INTO announcement
					SET an_name = ?,
					an_type = ?,
					an_date = ?,
					an_time = ?,
					an_details = ?
					";
			$stmt = $this->pdo->query($sql,array($an_name, $an_type, $an_date, $an_time, $an_details));
			return $stmt;
		}
		catch (Exception $ex)
		{
			echo $ex;
            exit;
		}
	}
	
	

}
?>