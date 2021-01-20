<?php 
    class Account{
        public $accountID;
        public $firstName;
        public $middleName;
        public $lastName;
        public $courseID;
        public $yearID;
        public $birthday;
        public $password;
        function __construct($accountID,$firstName,$middleName,$lastName,$courseID,$yearID,$birthday,$password)
        {
            $this->yearID = $yearID;
            $this->accountID = $accountID;
            $this->firstName = $firstName;
            $this->middleName = $middleName;
            $this->lastName = $lastName;
            $this->courseID = $courseID;
            $this->birthday = $birthday;
            $this->password = $password;
        }
        function Get_ACCOUNTID(){
            return $this->accountID;
        }
        function Get_FIRSTNAME(){
            return $this->firstName;
        }
        function Get_MIDDLENAME(){
            return $this->middleName;
        }
        function Get_LASTNAME(){
            return $this->lastName;
        }
        function Get_COURSEID(){
            return $this->courseID;
        }
        function Get_BIRTHDAY(){
            return $this->birthday;
        }
        function Get_PASSWORD(){
            return $this->password;
        }
    }

?>