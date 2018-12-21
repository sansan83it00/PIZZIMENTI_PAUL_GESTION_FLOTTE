<?php
/**
 * Created by PhpStorm.
 * User: Thomas
 * Date: 21/12/2018
 * Time: 14:24
 */

namespace App\Service;

use Doctrine\ORM\EntityManager;

class ProductService
{
    private $em;

    public function __construct(EntityManager $em){
        $this->em = $em;
    }

    /**
     * Renvoie la liste des conteneurs
     * @return array|object[]
     */
    public function getListProduct(){
        $listProduct= $this->em->getRepository('App:Product')->findAll();
        return $listProduct;
    }

    public function getProductById($id){
        $container = $this->em->getRepository('App:Product')->find($id);
        return $container;
    }
}