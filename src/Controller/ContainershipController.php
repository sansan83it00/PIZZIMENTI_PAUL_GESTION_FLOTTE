<?php
/**
 * Created by PhpStorm.
 * User: Thomas
 * Date: 21/12/2018
 * Time: 14:27
 */

namespace App\Controller;

use App\Entity\Containership;
use App\Service\ContainershipService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContainershipController extends AbstractController
{

    /**
     * @Route("/containership")
     */
    public function index(ContainershipService $containershipService){
        $listContainership = $containershipService->getListContainership();
        return $this->render('containership/listContainership.html.twig', [
            'listContainership' => $listContainership
        ]);
    }

    /**
     * @Route("/containership/{id<\d+>}")
     */
    public function getContainershipById($id, ContainershipService $containershipService){
        $containership = $containershipService->getContainershipById($id);
        return $this->render('containership/containership.html.twig', [
            'containership' => $containership
        ]);
    }

    /**
     * @Route("/containership/new")
     */
    public function new(Request $request){
        $containership = new Containership();
        $form = $this->createFormBuilder($containership)
            ->add('name', TextType::class)
            ->add('captainName', TextType::class)
            ->add('containerLimit', NumberType::class)
            ->add('save', SubmitType::class, array('label' => 'Create Containership'))
            ->getForm();

        if ($request->getMethod() === 'POST')
        {
            $entityManager = $this->getDoctrine()->getManager();
            $form->handleRequest($request);
            $entityManager->persist($containership);
            $entityManager->flush();
        }

        return $this->render('containership/new.html.twig', array(
            'form' => $form->createView()
        ));
    }
}