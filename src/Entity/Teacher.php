<?php

namespace App\Entity;

use App\Repository\TeacherRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TeacherRepository::class)
 */
class Teacher
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $speciality;

    /**
     * @ORM\OneToOne(targetEntity=Dispense::class, mappedBy="teacher", cascade={"persist", "remove"})
     */
    private $dispense;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSpeciality(): ?string
    {
        return $this->speciality;
    }

    public function setSpeciality(?string $speciality): self
    {
        $this->speciality = $speciality;

        return $this;
    }

    public function getDispense(): ?Dispense
    {
        return $this->dispense;
    }

    public function setDispense(Dispense $dispense): self
    {
        // set the owning side of the relation if necessary
        if ($dispense->getTeacher() !== $this) {
            $dispense->setTeacher($this);
        }

        $this->dispense = $dispense;

        return $this;
    }
}
