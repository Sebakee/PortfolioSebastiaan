<?php
//entities/user.php
namespace Entities;

//use Exceptions\exceptions;
//require_once("exceptions/exceptions.php");
use Exceptions\WachtwoordenKomenNietOvereenException;
use Exceptions\OngeldigEmailadresException;

class User
{
    private $id;
    private $email;
    private $wachtwoord;
    public function __construct($cid = null, $cemail = null,
    $cwachtwoord = null)
    {
    $this->id = $cid;
    $this->email = $cemail;
    $this->wachtwoord = $cwachtwoord;
    }
    public function getId()
    {
    return $this->id;
    }
    public function getEmail()
    {

    return $this->email;
    }

    public function getWachtwoord()
    {
    return $this->wachtwoord;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function setEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new OngeldigEmailadresException();
        }
        $this->email = $email;
    }

    public function setWachtwoord($wachtwoord, $herhaalwachtwoord)
    {
        if ($wachtwoord !== $herhaalwachtwoord) {
            throw new WachtwoordenKomenNietOvereenException();
        }
        $this->wachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);
    } 

  
  
}