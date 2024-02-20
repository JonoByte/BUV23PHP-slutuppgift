<?php

class User
{
    private int $id;
    private string $password;
    private string $email;

    public function getId(): int
    {
        return $this->id;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getEmail(): int
    {
        return $this->email;
    }

    public function setEmil(int $email): void
    {
        $this->email = $email;
    }
}

?>