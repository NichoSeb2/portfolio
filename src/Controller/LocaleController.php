<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

final class LocaleController extends AbstractController
{
	#[Route('/change-locale/{_locale}', name: 'app_change_locale')]
	public function changeLocale(Request $request, string $_locale): RedirectResponse
	{
		// Save the locale to the session
		$request->getSession()->set('_locale', $_locale);

		// Redirect back to the referring page
		$referer = $request->headers->get('referer');
		return new RedirectResponse($referer ?: $this->generateUrl('app_home'));
	}
}
