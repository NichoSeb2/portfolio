<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjectRepository::class)]
class Project
{
	#[ORM\Id]
	#[ORM\GeneratedValue]
	#[ORM\Column]
	private int $id = 0;

	#[ORM\Column(type: Types::TEXT)]
	private ?string $picture = null;

	#[ORM\Column(length: 255)]
	private ?string $title = null;

	#[ORM\Column(type: Types::TEXT)]
	private ?string $description = null;

	#[ORM\ManyToOne(inversedBy: 'projects')]
	#[ORM\JoinColumn(nullable: false)]
	private ?User $user = null;

	/**
	 * @var Collection<int, Technology>
	 */
	#[ORM\ManyToMany(targetEntity: Technology::class, mappedBy: 'projects')]
	private Collection $technologies;

	public function __construct()
	{
		$this->technologies = new ArrayCollection();
	}

	public function getId(): int
	{
		return $this->id;
	}

	public function getPicture(): ?string
	{
		return $this->picture;
	}

	public function setPicture(string $picture): static
	{
		$this->picture = $picture;

		return $this;
	}

	public function getTitle(): ?string
	{
		return $this->title;
	}

	public function setTitle(string $title): static
	{
		$this->title = $title;

		return $this;
	}

	public function getDescription(): ?string
	{
		return $this->description;
	}

	public function setDescription(string $description): static
	{
		$this->description = $description;

		return $this;
	}

	public function getUser(): ?User
	{
		return $this->user;
	}

	public function setUser(?User $user): static
	{
		$this->user = $user;

		return $this;
	}

	/**
	 * @return Collection<int, Technology>
	 */
	public function getTechnologies(): Collection
	{
		return $this->technologies;
	}

	public function addTechnology(Technology $technology): static
	{
		if (!$this->technologies->contains($technology)) {
			$this->technologies->add($technology);
			$technology->addProject($this);
		}

		return $this;
	}

	public function removeTechnology(Technology $technology): static
	{
		if ($this->technologies->removeElement($technology)) {
			$technology->removeProject($this);
		}

		return $this;
	}
}
