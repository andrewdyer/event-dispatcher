<?php

namespace Anddye\EventDispatcher\Tests\Stubs\Models;

/**
 * Class User.
 */
class User
{
    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $forename;
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $surname;

    /**
     * @param int    $id
     * @param string $forename
     * @param string $surname
     * @param string $email
     *
     * @return User
     */
    public static function build(int $id, string $forename, string $surname, string $email): User
    {
        $user = new self();
        $user->setId($id);
        $user->setForename($forename);
        $user->setSurname($surname);
        $user->setEmail($email);

        return $user;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getForename(): string
    {
        return $this->forename;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @param string $email
     *
     * @return $this
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @param string $forename
     *
     * @return $this
     */
    public function setForename(string $forename): self
    {
        $this->forename = $forename;

        return $this;
    }

    /**
     * @param int $id
     *
     * @return $this
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string $surname
     *
     * @return $this
     */
    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }
}
