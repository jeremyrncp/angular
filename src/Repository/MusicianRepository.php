<?php

namespace App\Repository;

use App\Entity\Musician;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Musician>
 *
 * @method Musician|null find($id, $lockMode = null, $lockVersion = null)
 * @method Musician|null findOneBy(array $criteria, array $orderBy = null)
 * @method Musician[]    findAll()
 * @method Musician[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MusicianRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Musician::class);
    }

//    /**
//     * @return Musician[] Returns an array of Musician objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Musician
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
