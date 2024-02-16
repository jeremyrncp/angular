<?php

namespace App\Repository;

use App\Entity\CourantMusical;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CourantMusical>
 *
 * @method CourantMusical|null find($id, $lockMode = null, $lockVersion = null)
 * @method CourantMusical|null findOneBy(array $criteria, array $orderBy = null)
 * @method CourantMusical[]    findAll()
 * @method CourantMusical[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CourantMusicalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CourantMusical::class);
    }

//    /**
//     * @return CourantMusical[] Returns an array of CourantMusical objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CourantMusical
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
