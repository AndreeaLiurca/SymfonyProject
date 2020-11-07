<?php

namespace App\Entity;

use App\Repository\TasksRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TasksRepository::class)
 */
class Tasks
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $Task;

    /**
     * @ORM\Column(type="date")
     */
    private $dueDate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTask(): ?string
    {
        return $this->Task;
    }

    public function setTask(string $Task): self
    {
        $this->Task = $Task;

        return $this;
    }

    public function getDueDate(): ?\DateTimeInterface
    {
        return $this->dueDate;
    }

    public function setDueDate(\DateTimeInterface $dueDate): self
    {
        $this->dueDate = $dueDate;

        return $this;
    }
}
