<?php 
namespace App\Controller;

use App\GreetingGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
 use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Psr\Log\LoggerInterface;


class DefaultController extends AbstractController
{
/**
      * @Route("/hello/{name}")
      */
     public function index($name, LoggerInterface $logger, GreetingGenerator $generator)
    {
    	  $greeting = $generator->getRandomGreeting();

   $info = "Saying $greeting to $name!";

        return $this->render('default/index.html.twig', ['name' => $name, 'greeting' => $info,]);
    }

/**
 * @Route("/api/hello/{name}")
 */
public function apiExample($name)
{
    return $this->json([
        'name' => $name,
        'symfony' => 'rocks',
    ]);
}
}