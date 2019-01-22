<?php
/**
 * Created by PhpStorm.
 * User: Thomas
 * Date: 21/12/2018
 * Time: 14:24
 */

namespace App\Service;

use Doctrine\ORM\EntityManager;

class ContainerService
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * Renvoie la liste des conteneurs
     * @return array|object[]
     */
    public function getListContainer(): array
    {
        $listContainer = $this->em->getRepository('App:Container')->findAll();
        return $listContainer;
    }

    public function getContainerById($id)
    {
        $container = $this->em->getRepository('App:Container')->find($id);
        return $container;
    }
}