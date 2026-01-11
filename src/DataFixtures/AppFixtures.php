<?php

namespace App\DataFixtures;

use App\Entity\Experience;
use App\Entity\Project;
use App\Entity\Social;
use App\Entity\Technology;
use App\Entity\User;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
	public function load(ObjectManager $manager): void
	{
		$github = new Social();
		$github
			->setLink("https://github.com/")
			->setLabel("GitHub")
			->setIcon("fa-github")
		;
		$manager->persist($github);

		$linkedin = new Social();
		$linkedin
			->setLink("https://www.linkedin.com/")
			->setLabel("LinkedIn")
			->setIcon("fa-linkedin-in")
		;
		$manager->persist($linkedin);

		$nodeJs = new Technology();
		$nodeJs
			->setLabel("NodeJs")
			->setColor("green")
		;
		$manager->persist($nodeJs);

		$react = new Technology();
		$react
			->setLabel("React")
			->setColor("blue")
		;
		$manager->persist($react);

		$project = new Project();
		$project
			->setTitle("E-Commerce Platform")
			->setPicture("https://i.pinimg.com/736x/8d/33/80/8d3380e3d13f368c156df01ada661766.jpg")
			->setDescription("Lorem1")
			->addTechnology($nodeJs)
			->addTechnology($react)
		;
		$manager->persist($project);

		$experience1 = new Experience();
		$experience1
			->setTitle("Dev1")
			->setCompany("Company1")
			->setDescription("Lorem1")
			->setStartAt(new DateTimeImmutable("2022-01-01"))
			->setEndAt(new DateTimeImmutable("now"))
		;
		$manager->persist($experience1);

		$experience2 = new Experience();
		$experience2
			->setTitle("Dev2")
			->setCompany("Company2")
			->setDescription("Lorem2")
			->setStartAt(new DateTimeImmutable("2020-01-01"))
			->setEndAt(new DateTimeImmutable("2022-01-01"))
		;
		$manager->persist($experience2);

		$user = new User();
		$user
			->setDomain("localhost")
			->setPassword("john.doe@example.com")
			->setEmail("john.doe@example.com")
			->setPhone("000000")
			->setFirstName("John")
			->setLastName("Doe")
			->setTitle("Backend developer")
			->setLocation("Belgium")
			->setAvailability("Not available")
			->setPortraitPicture("https://plus.unsplash.com/premium_photo-1664536392896-cd1743f9c02c?q=80&w=774&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D")
			->setHeroText("Lorem1")
			->setAboutText("Lorem2")
		;
		$user->addSocial($github);
		$user->addSocial($linkedin);
		$user->addProject($project);
		$user->addExperience($experience1);
		$user->addExperience($experience2);
		$manager->persist($user);

		$manager->flush();
	}
}
