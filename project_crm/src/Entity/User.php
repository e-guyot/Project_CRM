<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $phoneNumber;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tag;

    public function __construct($firstname, $lastname, $email, $phoneNumber = NULL, $tag) {
		$this->firstname = $firstname;
		$this->lastname = $lastname;
		$this->email = $email;
        $this->phoneNumber = $phoneNumber;
        $this->tag = $tag;
	}

    public function isValid() {
		return $this->checkName() && $this->checkEmail() && $this->checkphoneNumber() && $this->checkTag();
	}

	private function checkName() {
		return !empty($this->firstname) && is_string($this->firstname) && !empty($this->lastname) && is_string($this->lastname);
	}

	private function checkEmail() {
		return !empty($this->email) && filter_var($this->email, FILTER_VALIDATE_EMAIL);
	}

	public function checkPhoneNumber() {
		if (!empty($this->phoneNumber) && filter_var($this->phoneNumber, FILTER_SANITIZE_NUMBER_INT)){
            return TRUE; // si c'est un num de tel
        } else if (!empty($this->phoneNumber) && $this->phoneNumber === NULL){
            return TRUE; //si c'est vide
        }
        return FALSE;
    }
    
    public function checkTag()
    {
        return !empty($this->tag) && is_string($this->tag);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhoneNumber(): ?int
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(?int $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getTag(): ?string
    {
        return $this->tag;
    }

    public function setTag(string $tag): self
    {
        $this->tag = $tag;

        return $this;
    }
}
