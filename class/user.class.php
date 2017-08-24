<?php

class user {

    private $lastName;
    private $firstName;
    private $mail;
    private $tel;
    private $password;
    private $birthdate;
    private $adresse;
    private $cp;
    private $ville;
    private $country;

    public function __construct(array $donnees) {
        $this->hydrate($donnees);
    }

    public function hydrate(array $donnees) {
        foreach ($donnees as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    function getLastName() {
        return $this->lastName;
    }

    function getFirstName() {
        return $this->firstName;
    }

    function getMail() {
        return $this->mail;
    }

    function getTel() {
        return $this->tel;
    }

    function getPassword() {
        return $this->password;
    }

    function getBirthdate() {
        return $this->birthdate;
    }

    function getAdresse() {
        return $this->adresse;
    }

    function getCp() {
        return $this->cp;
    }

    function getVille() {
        return $this->ville;
    }

    function getCountry() {
        return $this->country;
    }

    function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    function setMail($mail) {
        $this->mail = $mail;
    }

    function setTel($tel) {
        $this->tel = $tel;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setBirthdate($birthdate) {
        $this->birthdate = $birthdate;
    }

    function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    function setCp($cp) {
        $this->cp = $cp;
    }

    function setVille($ville) {
        $this->ville = $ville;
    }

    function setCountry($country) {
        $this->country = $country;
    }

}
