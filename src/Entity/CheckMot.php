<?php

namespace App\Entity;


use ApiPlatform\Core\Annotation\ApiResource;
use App\Controller\ApiCheckMasqueAction;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *     collectionOperations={"checkMasque" ={"method"="GET", "path"="/checkMots", "controller"=ApiCheckMasqueAction::class}},
 *     itemOperations={"get"}
 * )
 * @ORM\Entity(repositoryClass="App\Repository\CheckMotRepository")
 */
class CheckMot
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
    private $newMasque;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isMotOk;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isEnded;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getNewMasque(): ?string
    {
        return $this->newMasque;
    }

    public function setNewMasque(string $newMasque): self
    {
        $this->newMasque = $newMasque;

        return $this;
    }

    public function getIsMotOk(): ?bool
    {
        return $this->isMotOk;
    }

    public function setIsMotOk(bool $isMotOk): self
    {
        $this->isMotOk = $isMotOk;

        return $this;
    }

    public function getIsEnded(): ?bool
    {
        return $this->isEnded;
    }

    public function setIsEnded(bool $isEnded): self
    {
        $this->isEnded = $isEnded;

        return $this;
    }
}
