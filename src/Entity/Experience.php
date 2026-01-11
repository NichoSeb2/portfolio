<?php

namespace App\Entity;

use App\Repository\ExperienceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExperienceRepository::class)]
class Experience
{
	#[ORM\Id]
	#[ORM\GeneratedValue]
	#[ORM\Column]
	private int $id = 0;

	#[ORM\Column]
	private ?\DateTimeImmutable $startAt = null;

	#[ORM\Column]
	private ?\DateTimeImmutable $endAt = null;

	#[ORM\Column(length: 255)]
	private ?string $title = null;

	#[ORM\Column(length: 255)]
	private ?string $company = null;

	#[ORM\Column(type: Types::TEXT)]
	private ?string $description = null;

	#[ORM\ManyToOne(inversedBy: 'experiences')]
	#[ORM\JoinColumn(nullable: false)]
	private ?User $user = null;

	public function getId(): int
	{
		return $this->id;
	}

	public function getStartAt(): ?\DateTimeImmutable
	{
		return $this->startAt;
	}

	public function setStartAt(\DateTimeImmutable $startAt): static
	{
		$this->startAt = $startAt;

		return $this;
	}

	public function getEndAt(): ?\DateTimeImmutable
	{
		return $this->endAt;
	}

	public function setEndAt(\DateTimeImmutable $endAt): static
	{
		$this->endAt = $endAt;

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

	public function getCompany(): ?string
	{
		return $this->company;
	}

	public function setCompany(string $company): static
	{
		$this->company = $company;

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
}
