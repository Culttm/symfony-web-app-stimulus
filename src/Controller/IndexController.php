<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;


#[Route('/', name: 'get_main_page')]
class IndexController extends AbstractController
{
    public function __invoke(HttpClientInterface $client): Response
    {
        $response = $client->request(
            'GET',
            'https://jsonplaceholder.typicode.com/photos',
            [
                'query' => [
                    '_limit' => 10
                ]
            ]);

        $content = $response->toArray();

        return $this->render('pages/main.page.html.twig', [
            'data' => $content
        ]);
    }
}
