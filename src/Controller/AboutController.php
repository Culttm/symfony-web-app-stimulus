<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/about', name: 'get_about_page')]
class AboutController extends AbstractController {

    public function __invoke(): Response
    {
        return $this->render('pages/about.page.html.twig');
    }
}
