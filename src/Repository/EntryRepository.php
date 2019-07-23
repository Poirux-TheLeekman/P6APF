<?php

namespace App\Repository;

use App\Entity\Entry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Entry|null find($id, $lockMode = null, $lockVersion = null)
 * @method Entry|null findOneBy(array $criteria, array $orderBy = null)
 * @method Entry[]    findAll()
 * @method Entry[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EntryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Entry::class);
    }
    
    /**
     * Returns a bookmark collection, based on tag name
     */
    public function findByCat($id)
    {
        //Retrieve bookmarks
        $q = $this->createQueryBuilder('b')
        ->select('b')
        ->innerJoin('b.Categories', 't')
        ->where('t.id = :category_id')
        ->setParameter('category_id', $id)
        ->andWhere('b.publish = :val')
        ->setParameter('val', 1)
        ->getQuery()
        ->getResult();
        
        return $q;
    }
    // /**
    //  * @return Entry[] Returns an array of Entry objects
    //  */
    

    /*
    public function findOneBySomeField($value): ?Entry
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
