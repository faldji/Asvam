<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use App\Controller\ApiGenMotAction;

/**
 * @ApiResource(
 *     collectionOperations={"genMasque" ={"method"="GET", "path"="/genMots", "controller"=ApiGenMotAction::class}},
 *     itemOperations={"get"}
 * )
 * @ORM\Entity(repositoryClass="App\Repository\GenMotRepository")
 */
class GenMot
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
    private $display;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getDisplay()
    {
        return $this->display;
    }

    /**
     * @param mixed $display
     */
    public function setDisplay($display): void
    {
        $this->display = $display;
    }



}
