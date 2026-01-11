<?php

namespace App\Entity;

use App\Repository\TechnologyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TechnologyRepository::class)]
class Technology
{
	#[ORM\Id]
	#[ORM\GeneratedValue]
	#[ORM\Column]
	private int $id = 0;

	#[ORM\Column(length: 255)]
	private ?string $label = null;

	#[ORM\Column(length: 255)]
	private ?string $color = null;

	/**
	 * @var Collection<int, Project>
	 */
	#[ORM\ManyToMany(targetEntity: Project::class, inversedBy: 'technologies')]
	private Collection $projects;

	public function __construct()
	{
		$this->projects = new ArrayCollection();
	}

	public function getId(): int
	{
		return $this->id;
	}

	public function getLabel(): ?string
	{
		return $this->label;
	}

	public function setLabel(string $label): static
	{
		$this->label = $label;

		return $this;
	}

	public function getColor(): ?string
	{
		return $this->color;
	}

	public function setColor(string $color): static
	{
		$this->color = $color;

		return $this;
	}

	/**
	 * @return Collection<int, Project>
	 */
	public function getProjects(): Collection
	{
		return $this->projects;
	}

	public function addProject(Project $project): static
	{
		if (!$this->projects->contains($project)) {
			$this->projects->add($project);
		}

		return $this;
	}

	public function removeProject(Project $project): static
	{
		$this->projects->removeElement($project);

		return $this;
	}
}
