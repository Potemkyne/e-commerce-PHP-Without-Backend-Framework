<?php

class UsersManager {

    private $db;

    public function __construct($db) {
        $this->setDb($db);
    }

    public function addUser(User $user) {
        $stmt = $this->db->prepare("INSERT INTO user (firstName,lastName,adresse,cp,ville,country,birthdate ,date_inscription,mail,password,tel) VALUES 
                                    (:firstName, :lastName,:adresse, :cp,:ville ,:country ,:birthdate,NOW(), :mail, :password,:tel)
                                    ");
        $stmt->bindValue(':firstName', $user->getFirstName());
        $stmt->bindValue(':lastName', $user->getLastName());
        $stmt->bindValue(':mail', $user->getMail());
        $stmt->bindValue(':tel', $user->getTel());
        $stmt->bindValue(':password', $user->getPassword());
        $stmt->bindValue(':birthdate', $user->getBirthdate());
        $stmt->bindValue(':adresse', $user->getAdresse());
        $stmt->bindValue(':cp', $user->getCp());
        $stmt->bindValue(':ville', $user->getVille());
        $stmt->bindValue(':country', $user->getCountry());
        $stmt->execute();
    }

    public function verifUser($mail, $password) {
        $stmt = $this->db->prepare("SELECT firstName, lastName FROM user WHERE (mail=:mail)");
        $stmt->bindParam(':mail', $mail);
        $stmt->execute();
        $res = $stmt->fetchall(PDO::FETCH_OBJ);
        if (empty($res)) {
            return null;
        } else {
            $stmt = $this->db->prepare("SELECT firstName, lastName FROM user WHERE (mail=:mail AND password=:password)");
            $stmt->bindParam(':mail', $mail);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            $res = $stmt->fetchall(PDO::FETCH_OBJ);
            return $res;
        }
    }

    public function setDb(PDO $db) {
        $this->db = $db;
    }

}
