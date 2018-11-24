<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(fields={"Email"}, message="Cette adresse email est déjà utilisée.")
 * @UniqueEntity(fields={"Username"}, message="Ce pseudo est déjà utilisé.")
 * @UniqueEntity(fields={"Tel"}, message="Numéro de tel déjà utilisé.")
 *
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min="6",
     *     max="25",
     *     minMessage="Le pseudo doit contenir au minimum 6 caractères",
     *     maxMessage="Le pseudo ne doit pas dépasser 25 caractères"
     * )
     */
    private $Username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $Password;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank()
     * @Assert\IdenticalTo(propertyPath="Password",message="Values not identical")
     */
    private $Re_password;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank()
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank()
     */
    private $Prenom;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     *
     *
     */
    private $Tel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Image(
     *     mimeTypes="image/png",
     *     mimeTypesMessage="Format de l'image non valide"
     * )
     */
    private $Photo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Email()
     */
    private $Email;


    /**
     * @ORM\Column(type="datetime")
     */
    private $CreatedAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $LastLoged;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $Age;

    /**
     * @ORM\Column(type="json")
     */
    private $Roles = [];


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->Username;
    }

    public function setUsername(?string $Username): self
    {
        $this->Username = $Username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->Password;
    }

    public function setPassword(string $Password): self
    {
        $this->Password = $Password;

        return $this;
    }

    public function getRePassword(): ?string
    {
        return $this->Re_password;
    }

    public function setRePassword(?string $Re_password): self
    {
        $this->Re_password = $Re_password;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(?string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(?string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->Tel;
    }

    public function setTel(?string $Tel): self
    {
        $this->Tel = $Tel;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->Photo;
    }

    public function setPhoto(?string $Photo): self
    {
        $this->Photo = $Photo;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(?string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->CreatedAt;
    }

    public function setCreatedAt(\DateTimeInterface $CreatedAt): self
    {
        $this->CreatedAt = $CreatedAt;

        return $this;
    }

    public function getLastLoged(): ?\DateTimeInterface
    {
        return $this->LastLoged;
    }

    public function setLastLoged(?\DateTimeInterface $LastLoged): self
    {
        $this->LastLoged = $LastLoged;

        return $this;
    }

    public function getAge(): ?\DateTimeInterface
    {
        return $this->Age;
    }

    public function setAge(?\DateTimeInterface $Age): self
    {
        $this->Age = $Age;

        return $this;
    }


    public function getRoles(): array
    {
        $Roles = $this->Roles;
        // guarantee every user at least has ROLE_USER
        $Roles[] = 'ROLE_USER';

        return array_unique($Roles);
    }

    public function setRoles(?string $role)
    {
        $this->Roles = array($role);
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        // TODO: Implement getSalt() method.

    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}
