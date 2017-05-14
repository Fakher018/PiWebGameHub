<?php
namespace project\GameHubBundle\Repository;
use Doctrine\ORM\EntityRepository;
/**
 * Created by PhpStorm.
 * User: Fakher_XoX
 * Date: 10/04/2017
 * Time: 21:49
 */
class PublicationRepository extends EntityRepository
{
    public function findnewestDQL()
    {
        $query=$this->getEntityManager()->createQuery("Select m from projectGameHubBundle:Videos m ORDER BY m.updatedAt DESC ");
        return $query->getResult();

    }
    public function findoldestDQL()
    {
        $query=$this->getEntityManager()->createQuery("Select m from projectGameHubBundle:Videos m ORDER BY m.updatedAt");
        return $query->getResult();

    }
    public function findbytitreDQL($titre)
    {
        $query=$this->getEntityManager()->createQuery("Select m from projectGameHubBundle:Videos m WHERE m.titre LIKE :titre")->setParameter('titre','%'.$titre.'%');
        return $query->getResult();

    }
    public function findbytypeDQL($type)
    {
        $query=$this->getEntityManager()->createQuery("Select m from projectGameHubBundle:Videos m WHERE m.type LIKE :type")->setParameter('type','%'.$type.'%');
        return $query->getResult();

    }

}