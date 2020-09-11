<?php
	function db(){
		try{
			return new PDO("mysql:host=localhost;dbname=vehiquo", "root","");
		}catch(PDOException $e){ echo $e->getMessage();}
	}

	function registerUser($lname, $fname, $cont, $email, $username, $password){
		$db = db();
		$sql = "INSERT INTO user(lname,fname,contact,email,uname,password) VALUES (?,?,?,?,?,?)";
		$stmt = $db->prepare($sql);
		$result = $stmt->execute(array($lname, $fname, $cont, $email, $username, $password));
		$db = null;
		if ($result) {
        	return true;
    	}else{
        	return false;
    	}
	}

	function userExist($username){
    	$db = db();
    	$sql = "SELECT * FROM user WHERE uname = ?";
    	$stmt = $db->prepare($sql);
    	$result = $stmt->execute(array($username));
    	$user = $stmt->fetch();
    	$db = null;
    	return $user;
	}

	function login($uname,$password){
		$db = db();
		$sql = "SELECT * FROM user WHERE uname = ? AND password = ?";
		$s = $db->prepare($sql);
		$s->execute(array($username, $password));
		$user = $s->fetch();
		$db = null;
		return $user;
	}


	function retrieveUser()
	{
		$db = db();
		$sql = "SELECT * FROM user";
		$s = $db->query($sql);
		$user = $s->fetchAll();
		$db = null;
		return $user;
	}
	function updateUser($fname, $lname,$email,$cont,$uname,$password)
	{
		$db = db();
		$sql = "UPDATE user SET fname = ?, lname = ?, email = ?, contact = ?, password = ?, street = ?, barangay = ?, city = ?, zipcode = ?, bday = ? WHERE uname = ?";		
		$s = $db->prepare($sql);
		$s->execute(array($fname,$lname,$email,$cont,$password,$street,$barangay,$city,$zipcode,$bday));
		$db = null;
	}


	
?>