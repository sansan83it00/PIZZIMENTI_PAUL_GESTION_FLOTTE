<?php
/**
 * Created by PhpStorm.
 * User: Thomas
 * Date: 21/12/2018
 * Time: 14:27
 */

namespace App\Controller;

use App\Entity\Container;
use App\Entity\ContainerModel;
use App\Entity\Containership;
use App\Service\ContainerService;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContainerController extends AbstractController
{
    /**
     * @Route("/container")
     */
    public function index(ContainerService $containerService){
        $listContainer = $containerService->getListContainer();
        return $this->render('container/listContainer.html.twig', [
            'listContainer' => $listContainer
        ]);
    }

    /**
     * @Route("/container/{id<\d+>}")
     */
    public function getContainerById($id,ContainerService $containerService){
        $container = $containerService->getContainerById($id);
        return $this->render('container/container.html.twig', [
            'container' => $container
        ]);
    }

    /**
     * @Route("/container/new", name="new_container")
     */
    public function new(Request $request){
        $container = new Container();
        $form = $this->createFormBuilder($container)
            ->add('color', TextType::class)
            ->add('containership', EntityType::class, array('class' => Containership::class))
            ->add('containerModel', EntityType::class, array('class' => ContainerModel::class))
            ->add('save', SubmitType::class, array('label' => 'Create Container'))
            ->getForm();

        if ($request->getMethod() === 'POST')
        {
            $entityManager = $this->getDoctrine()->getManager();
            $form->handleRequest($request);

            dump($request);
            $entityManager->persist($container);
            $entityManager->flush();
        }

        return $this->render('container/new.html.twig', array(
            'form' => $form->createView()
        ));
    }
}