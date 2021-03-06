<?php
/**
 * Created by PhpStorm.
 * User: Thomas
 * Date: 21/12/2018
 * Time: 14:27
 */

namespace App\Controller;

use App\Entity\Product;
use App\Service\ProductService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{

    /**
     * @Route("/product")
     */
    public function index(ProductService $productService){
        $listProduct = $productService->getListProduct();
        return $this->render('product/listProduct.html.twig', [
            'listProduct' => $listProduct
        ]);
    }

    /**
     * @Route("/product/{id<\d+>}")
     */
    public function getProductById($id, ProductService $productService){
        $product = $productService->getProductById($id);
        return $this->render('product/product.html.twig', [
            'product' => $product
        ]);
    }

    /**
     * @Route("/product/new", name="new_product")
     */
    public function new(Request $request){
        $product = new Product();
        $form = $this->createFormBuilder($product)
            ->add('name', TextType::class)
            ->add('length', NumberType::class)
            ->add('width', NumberType::class)
            ->add('height', NumberType::class)
            ->add('save', SubmitType::class, array('label' => 'Create Product'))
            ->getForm();

        if ($request->getMethod() === 'POST')
        {
            $entityManager = $this->getDoctrine()->getManager();
            $form->handleRequest($request);
            $entityManager->persist($product);
            $entityManager->flush();
        }

        return $this->render('product/new.html.twig', array(
            'form' => $form->createView()
        ));
    }
}