<?php

namespace BJ\LinksBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * LinkRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class LinkRepository extends EntityRepository
{
    public function findLatest()
    {
        return $this->latestQuery()
            ->getQuery()
            ->getResult();
    }

    public function findByTag($name)
    {
        return $this->latestQuery()
            ->join('l.tags', 'tmp')
            ->where('tmp.name = :name')
            ->addSelect('t')
                ->setParameter('name', $name)
            ->getQuery()
            ->getResult();
    }

    private function latestQuery()
    {
        return $this->createQueryBuilder('l')
            ->join('l.tags', 't')
            ->select('l, t');
    }
}
