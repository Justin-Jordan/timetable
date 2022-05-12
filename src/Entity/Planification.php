<?php

namespace App\Entity;

use App\Repository\PlanificationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlanificationRepository::class)
 */
class Planification
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Day::class, inversedBy="planifications")
     * @ORM\JoinColumn(nullable=false)
     */
    private $day;

    /**
     * @ORM\ManyToOne(targetEntity=Schedule::class, inversedBy="planifications")
     * @ORM\JoinColumn(nullable=false)
     */
    private $schedule;

    /**
     * @ORM\ManyToOne(targetEntity=Course::class, inversedBy="planifications")
     * @ORM\JoinColumn(nullable=false)
     */
    private $course;

    /**
     * @ORM\ManyToOne(targetEntity=Field::class, inversedBy="planifications")
     * @ORM\JoinColumn(nullable=false)
     */
    private $field;

    /**
     * @ORM\ManyToOne(targetEntity=Room::class, inversedBy="planifications")
     * @ORM\JoinColumn(nullable=false)
     */
    private $room;

    /**
     * @ORM\ManyToOne(targetEntity=Level::class, inversedBy="planifications")
     * @ORM\JoinColumn(nullable=false)
     */
    private $level;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDay(): ?Day
    {
        return $this->day;
    }

    public function setDay(?Day $day): self
    {
        $this->day = $day;

        return $this;
    }

    public function getSchedule(): ?Schedule
    {
        return $this->schedule;
    }

    public function setSchedule(?Schedule $schedule): self
    {
        $this->schedule = $schedule;

        return $this;
    }

    public function getCourse(): ?Course
    {
        return $this->course;
    }

    public function setCourse(?Course $course): self
    {
        $this->course = $course;

        return $this;
    }

    public function getField(): ?Field
    {
        return $this->field;
    }

    public function setField(?Field $field): self
    {
        $this->field = $field;

        return $this;
    }

    public function getRoom(): ?Room
    {
        return $this->room;
    }

    public function setRoom(?Room $room): self
    {
        $this->room = $room;

        return $this;
    }

    public function getLevel(): ?Level
    {
        return $this->level;
    }

    public function setLevel(?Level $level): self
    {
        $this->level = $level;

        return $this;
    }

}
