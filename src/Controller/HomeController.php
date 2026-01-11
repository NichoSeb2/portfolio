<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
	#[Route('/', name: 'app_home', methods: ['GET'])]
	public function index(Request $request, UserRepository $userRepository): Response
	{
		$user = $userRepository->findOneBy([
			'domain' => $request->getHost(),
		]);

		return $this->render('home/index.html.twig', ['user' => $user]);
	}
}
