<?php

namespace App\Repository;

use App\Entity\ExternalIndividualContact;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ExternalIndividualContact|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExternalIndividualContact|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExternalIndividualContact[]    findAll()
 * @method ExternalIndividualContact[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExternalIndividualContactRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExternalIndividualContact::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ExternalIndividualContact $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(ExternalIndividualContact $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return ExternalIndividualContact[] Returns an array of ExternalIndividualContact objects
    //  */
    
    public function findByExampleField($value)
    {
        $query = $this->createQueryBuilder('e');

        dd($query->getQuery());
    }
    







    // /**
    //  * @return ExternalIndividualContact[] Returns an array of ExternalIndividualContact objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ExternalIndividualContact
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
