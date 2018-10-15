<?php

namespace App\Model;

use JsonSerializable;

class TestTaker implements JsonSerializable
{
    /** @var string */
    private $login;

    /** @var string */
    private $password;

    /** @var string */
    private $title;

    /** @var string */
    private $lastname;

    /** @var string */
    private $firstname;

    /** @var string */
    private $gender;

    /** @var string */
    private $email;

    /** @var string */
    private $picture;

    /** @var string */
    private $address;

    public function __construct(
        string $login,
        string $password,
        string $title,
        string $lastname,
        string $firstname,
        string $gender,
        string $email,
        string $picture,
        string $address
    ) {
        $this->login = $login;
        $this->password = $password;
        $this->title = $title;
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->gender = $gender;
        $this->email = $email;
        $this->picture = $picture;
        $this->address = $address;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPicture(): string
    {
        return $this->picture;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function jsonSerialize(): array
    {
        return [
            'login' => $this->login,
            'password' => $this->password,
            'title' => $this->title,
            'lastname' => $this->lastname,
            'firstname' => $this->firstname,
            'gender' => $this->gender,
            'email' => $this->email,
            'picture' => $this->picture,
            'address' => $this->address,
        ];
    }
}
