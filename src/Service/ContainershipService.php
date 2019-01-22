<?php
/**
 * Created by PhpStorm.
 * User: Thomas
 * Date: 21/12/2018
 * Time: 14:24
 */

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;

class ContainershipService
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * Renvoie la liste des bateaux
     * @return array|object[]
     */
    public function getListContainership(): array
    {
        $listContainership = $this->em->getRepository('App:Containership')->findAll();
        return $listContainership;
    }

    public function getContainershipById($id)
    {
        $containership = $this->em->getRepository('App:Containership')->find($id);
        return $containership;
    }
}