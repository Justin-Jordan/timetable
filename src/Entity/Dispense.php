<?php

namespace App\Entity;

use App\Repository\DispenseRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DispenseRepository::class)
 */
class Dispense
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
    private $startTime;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $endTime;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $day;

    /**
     * @ORM\OneToOne(targetEntity=Teacher::class, inversedBy="dispense", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $teacher;

    /**
     * @ORM\OneToOne(targetEntity=Course::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $course;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartTime(): ?string
    {
        return $this->startTime;
    }

    public function setStartTime(string $startTime): self
    {
        $this->startTime = $startTime;

        return $this;
    }

    public function getEndTime(): ?string
    {
        return $this->endTime;
    }

    public function setEndTime(string $endTime): self
    {
        $this->endTime = $endTime;

        return $this;
    }

    public function getDay(): ?string
    {
        return $this->day;
    }

    public function setDay(string $day): self
    {
        $this->day = $day;

        return $this;
    }

    public function getTeacher(): ?Teacher
    {
        return $this->teacher;
    }

    public function setTeacher(Teacher $teacher): self
    {
        $this->teacher = $teacher;

        return $this;
    }

    public function getCourse(): ?Course
    {
        return $this->course;
    }

    public function setCourse(Course $course): self
    {
        $this->course = $course;

        return $this;
    }
}
