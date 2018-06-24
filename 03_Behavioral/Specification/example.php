<?php

class User
{
    public $email = 'email@email.com';
}

class UserRepository
{
    // protected $user;

    // public function __construct(User $user)
    // {
    //     $this->user = $user;
    // }

    public function getUserByEmail($email)
    {
        // return $this->user->where('email', $email);
        return null;
    }
}

class EmailIsAvailable
{
    protected $users;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    public function isSatisfiedBy($email)
    {
        if ($this->users->getUserByEmail($email)) {
            return false;
        }
        return true;
    }
}

$users = new UserRepository;
$spec = new EmailIsAvailable($users);

var_dump($spec->isSatisfiedBy('email@email.com'));
