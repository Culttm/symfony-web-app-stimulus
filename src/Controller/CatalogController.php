<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/catalog', name: 'get_catalog_page')]
class CatalogController extends AbstractController {

    public function __invoke(): Response
    {
        return $this->render('pages/catalog.page.html.twig');
    }
}
