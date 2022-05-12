<?php

namespace App\Entity;

use App\Repository\ScheduleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ScheduleRepository::class)
 */
class Schedule
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="time")
     */
    private $BeginAt;

    /**
     * @ORM\Column(type="time")
     */
    private $EndAt;

    /**
     * @ORM\OneToMany(targetEntity=Planification::class, mappedBy="schedule")
     */
    private $planifications;

    public function __construct()
    {
        $this->planifications = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBeginAt(): ?\DateTimeInterface
    {
        return $this->BeginAt;
    }

    public function setBeginAt(\DateTimeInterface $BeginAt): self
    {
        $this->BeginAt = $BeginAt;

        return $this;
    }

    public function getEndAt(): ?\DateTimeInterface
    {
        return $this->EndAt;
    }

    public function setEndAt(\DateTimeInterface $EndAt): self
    {
        $this->EndAt = $EndAt;

        return $this;
    }

    /**
     * @return Collection<int, Planification>
     */
    public function getPlanifications(): Collection
    {
        return $this->planifications;
    }

    public function addPlanification(Planification $planification): self
    {
        if (!$this->planifications->contains($planification)) {
            $this->planifications[] = $planification;
            $planification->setSchedule($this);
        }

        return $this;
    }

    public function removePlanification(Planification $planification): self
    {
        if ($this->planifications->removeElement($planification)) {
            // set the owning side to null (unless already changed)
            if ($planification->getSchedule() === $this) {
                $planification->setSchedule(null);
            }
        }

        return $this;
    }
    
    public function getHour() {
        return $this->BeginAt->format('H:m') . " - " . $this->EndAt->format('H:m');
    }
}
