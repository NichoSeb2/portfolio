<?php

namespace App\Controller\Admin;

use App\Entity\Experience;
use App\Entity\Project;
use App\Entity\Social;
use App\Entity\Technology;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Option\ColorScheme;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;

#[AdminDashboard(routePath: '/admin', routeName: 'admin')]
class DashboardController extends AbstractDashboardController
{
	public function index(): Response
	{
		return $this->redirectToRoute('admin_user_index');
	}

	public function configureDashboard(): Dashboard
	{
		return Dashboard::new()
			->setTitle('Portfolio dashboard')
			->disableDarkMode()
			->setDefaultColorScheme(ColorScheme::LIGHT);
	}

	public function configureAssets(): Assets
	{
		return Assets::new()->addAssetMapperEntry("admin");
	}

	public function configureMenuItems(): iterable
	{
		yield MenuItem::section('Content');
		yield MenuItem::linkToCrud('Users', 'fa fa-user', User::class);
		yield MenuItem::linkToCrud('Experiences', 'fa fa-briefcase', Experience::class);
		yield MenuItem::linkToCrud('Projects', 'fa fa-folder-tree', Project::class);
		yield MenuItem::linkToCrud('Technologies', 'fa fa-microchip', Technology::class);
		yield MenuItem::linkToCrud('Socials', 'fa fa-hashtag', Social::class);
	}
}
