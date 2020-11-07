<?php

namespace App\Controller;

use App\Entity\Tasks;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\Type\TaskType;

class TasksController extends AbstractController
{
    /**
     * @Route("/task", name="task")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
//        // creates a task object and initializes some data for this example
        $entityManager = $this->getDoctrine()->getManager();

        $task = new Tasks();

        $task->setTask('Write a blog post');
        $task->setDueDate(new \DateTime('tomorrow'));

        $form = $this->createForm(TaskType::class, $task, [
            'method' => 'GET',
        ]);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $task = $form->getData();
            $entityManager->persist($task);

            // actually executes the queries (i.e. the INSERT query)
            $entityManager->flush();
        }
        return $this->render('tasks/index.html.twig', [
            'form' =>  $form->createView(),
        ]);
    }
}
