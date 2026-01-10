<?php

namespace App\Controller;

use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
	#[Route('/', name: 'app_home', methods: ['GET'])]
	public function index(): Response
	{
		return $this->render('home/index.html.twig', [
			'firstName' => 'Jane',
			'lastName' => 'Doe2',
			'title' => 'DevX',
			'email' => 'dev@example.com',
			'phone' => '000',
			'location' => 'XA',
			'availability' => 'XB',
			'portraitPicture' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=500&h=600',
			'heroText' => 'Lorem 1',
			'aboutText' => 'Lorem 2',
			'socials' => [
				'github' => [
					'link' => "https://github.com/XC",
					'label' => "GitHub",
					'icon' => "fa-github",
				],
				'linked-in' => [
					'link' => "https://www.linkedin.com/in/XD",
					'label' => "LinkedIn",
					'icon' => "fa-linkedin-in",
				],
			],
			'projects' => [
				[
					'picture' => "https://i.pinimg.com/736x/8d/33/80/8d3380e3d13f368c156df01ada661766.jpg",
					'title' => "E-Commerce Platform X",
					'description' => "X A full-featured e-commerce solution with user authentication, product management, and payment processing.",
					'techsUsed' => [
						[
							'label' => "React",
							'color' => "blue",
						], [
							'label' => "Node.js",
							'color' => "green",
						], [
							'label' => "Node.js",
							'color' => "red",
						], [
							'label' => "Node.js",
							'color' => "orange",
						], [
							'label' => "Node.js",
							'color' => "yellow",
						],
					],
				],
			],
			'experiences' => [
				[
					'startAt' => new DateTime("2022-01-01"),
					'endAt' => new DateTime("now"),
					'title' => "Dev1",
					'company' => "Company1",
					'description' => "Description1",
				], [
					'startAt' => new DateTime("2020-01-01"),
					'endAt' => new DateTime("2022-01-01"),
					'title' => "Dev2",
					'company' => "Company2",
					'description' => "Description2",
				],
			],
		]);
	}
}
