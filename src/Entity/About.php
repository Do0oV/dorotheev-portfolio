<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AboutRepository")
 */
class About
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Text;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $resume;

    public function getId()
    {
        return $this->id;
    }

    public function getText(): ?string
    {
        return $this->Text;
    }

    public function setText(?string $Text): self
    {
        $this->Text = $Text;

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage( $image): self
    {
        if($image !== null) {
            $this->image = $image;
        }  
        return $this;       
    }

    public function getResume()
    {
        return $this->resume;
    }

    public function setResume( $resume): self
    {
        if($resume !== null) {
            $this->resume = $resume;
        }  
        return $this;       
    }
}
