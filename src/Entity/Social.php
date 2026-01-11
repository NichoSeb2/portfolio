<?php

namespace App\Entity;

use App\Repository\SocialRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SocialRepository::class)]
class Social
{
	#[ORM\Id]
	#[ORM\GeneratedValue]
	#[ORM\Column]
	private int $id = 0;

	#[ORM\Column(length: 255)]
	private ?string $link = null;

	#[ORM\Column(length: 255)]
	private ?string $label = null;

	#[ORM\Column(length: 255)]
	private ?string $icon = null;

	#[ORM\ManyToOne(inversedBy: 'socials')]
	#[ORM\JoinColumn(nullable: false)]
	private ?User $user = null;

	public function getId(): int
	{
		return $this->id;
	}

	public function getLink(): ?string
	{
		return $this->link;
	}

	public function setLink(string $link): static
	{
		$this->link = $link;

		return $this;
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

	public function getIcon(): ?string
	{
		return $this->icon;
	}

	public function setIcon(string $icon): static
	{
		$this->icon = $icon;

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
