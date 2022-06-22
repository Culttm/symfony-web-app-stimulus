<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

#[Route('/ajax')]
class LazyContentController extends AbstractController
{

    /**
     * @param HttpClientInterface $client
     * @return Response
     * @throws TransportExceptionInterface
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     */
    #[Route('/lazy-carousel', name: 'get_lazy_carousel')]
    public function firstAction(HttpClientInterface $client): Response
    {
        try {
            $response = $client->request(
                'GET',
                'https://jsonplaceholder.typicode.com/photos',
                [
                    'query' => [
                        '_limit' => 10
                    ]
                ]);

            $content = $response->toArray();

            return $this->render('modules/lazy-carousel.module.html.twig', [
                'data' => $content
            ]);

        } catch (Exception) {
            throw new Exception(Exception::class);
        }
    }
}
