<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_EMAIL', fields: ['email'])]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_DOMAIN', fields: ['domain'])]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
	#[ORM\Id]
	#[ORM\GeneratedValue]
	#[ORM\Column]
	private int $id = 0;

	#[ORM\Column(length: 180)]
	private ?string $email = null;

	/**
	 * @var list<string> The user roles
	 */
	#[ORM\Column]
	private array $roles = [];

	/**
	 * @var string The hashed password
	 */
	#[ORM\Column]
	private ?string $password = null;

	#[ORM\Column(length: 255)]
	private ?string $domain = null;

	#[ORM\Column(length: 255)]
	private ?string $firstName = null;

	#[ORM\Column(length: 255)]
	private ?string $lastName = null;

	#[ORM\Column(length: 255)]
	private ?string $title = null;

	#[ORM\Column(length: 255, nullable: true)]
	private ?string $phone = null;

	#[ORM\Column(length: 255)]
	private ?string $location = null;

	#[ORM\Column(length: 255)]
	private ?string $availability = null;

	#[ORM\Column(type: Types::TEXT)]
	private ?string $portraitPicture = null;

	#[ORM\Column(type: Types::TEXT)]
	private ?string $heroText = null;

	#[ORM\Column(type: Types::TEXT)]
	private ?string $aboutText = null;

	/**
	 * @var Collection<int, Social>
	 */
	#[ORM\OneToMany(targetEntity: Social::class, mappedBy: 'user', orphanRemoval: true)]
	private Collection $socials;

	/**
	 * @var Collection<int, Project>
	 */
	#[ORM\OneToMany(targetEntity: Project::class, mappedBy: 'user', orphanRemoval: true)]
	private Collection $projects;

	/**
	 * @var Collection<int, Experience>
	 */
	#[ORM\OneToMany(targetEntity: Experience::class, mappedBy: 'user', orphanRemoval: true)]
	private Collection $experiences;

	public function __construct()
	{
		$this->socials = new ArrayCollection();
		$this->projects = new ArrayCollection();
		$this->experiences = new ArrayCollection();
	}

	public function getId(): int
	{
		return $this->id;
	}

	public function getEmail(): ?string
	{
		return $this->email;
	}

	public function setEmail(string $email): static
	{
		$this->email = $email;

		return $this;
	}

	/**
	 * A visual identifier that represents this user.
	 *
	 * @see UserInterface
	 */
	public function getUserIdentifier(): string
	{
		return (string) $this->email;
	}

	/**
	 * @see UserInterface
	 */
	public function getRoles(): array
	{
		$roles = $this->roles;
		// guarantee every user at least has ROLE_USER
		$roles[] = 'ROLE_USER';

		return array_unique($roles);
	}

	/**
	 * @param list<string> $roles
	 */
	public function setRoles(array $roles): static
	{
		$this->roles = $roles;

		return $this;
	}

	/**
	 * @see PasswordAuthenticatedUserInterface
	 */
	public function getPassword(): ?string
	{
		return $this->password;
	}

	public function setPassword(string $password): static
	{
		$this->password = $password;

		return $this;
	}

	/**
	 * @see UserInterface
	 */
	public function eraseCredentials(): void {}

	public function getDomain(): ?string
	{
		return $this->domain;
	}

	public function setDomain(string $domain): static
	{
		$this->domain = $domain;

		return $this;
	}

	public function getFirstName(): ?string
	{
		return $this->firstName;
	}

	public function setFirstName(string $firstName): static
	{
		$this->firstName = $firstName;

		return $this;
	}

	public function getLastName(): ?string
	{
		return $this->lastName;
	}

	public function setLastName(string $lastName): static
	{
		$this->lastName = $lastName;

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

	public function getPhone(): ?string
	{
		return $this->phone;
	}

	public function setPhone(string $phone): static
	{
		$this->phone = $phone;

		return $this;
	}

	public function getLocation(): ?string
	{
		return $this->location;
	}

	public function setLocation(string $location): static
	{
		$this->location = $location;

		return $this;
	}

	public function getAvailability(): ?string
	{
		return $this->availability;
	}

	public function setAvailability(string $availability): static
	{
		$this->availability = $availability;

		return $this;
	}

	public function getPortraitPicture(): ?string
	{
		return $this->portraitPicture;
	}

	public function setPortraitPicture(string $portraitPicture): static
	{
		$this->portraitPicture = $portraitPicture;

		return $this;
	}

	public function getHeroText(): ?string
	{
		return $this->heroText;
	}

	public function setHeroText(string $heroText): static
	{
		$this->heroText = $heroText;

		return $this;
	}

	public function getAboutText(): ?string
	{
		return $this->aboutText;
	}

	public function setAboutText(string $aboutText): static
	{
		$this->aboutText = $aboutText;

		return $this;
	}

	/**
	 * @return Collection<int, Social>
	 */
	public function getSocials(): Collection
	{
		return $this->socials;
	}

	public function addSocial(Social $social): static
	{
		if (!$this->socials->contains($social)) {
			$this->socials->add($social);
			$social->setUser($this);
		}

		return $this;
	}

	public function removeSocial(Social $social): static
	{
		if ($this->socials->removeElement($social)) {
			// set the owning side to null (unless already changed)
			if ($social->getUser() === $this) {
				$social->setUser(null);
			}
		}

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
			$project->setUser($this);
		}

		return $this;
	}

	public function removeProject(Project $project): static
	{
		if ($this->projects->removeElement($project)) {
			// set the owning side to null (unless already changed)
			if ($project->getUser() === $this) {
				$project->setUser(null);
			}
		}

		return $this;
	}

	/**
	 * @return Collection<int, Experience>
	 */
	public function getExperiences(): Collection
	{
		return $this->experiences;
	}

	public function addExperience(Experience $experience): static
	{
		if (!$this->experiences->contains($experience)) {
			$this->experiences->add($experience);
			$experience->setUser($this);
		}

		return $this;
	}

	public function removeExperience(Experience $experience): static
	{
		if ($this->experiences->removeElement($experience)) {
			// set the owning side to null (unless already changed)
			if ($experience->getUser() === $this) {
				$experience->setUser(null);
			}
		}

		return $this;
	}
}
