<?php

namespace App\Repository;

use App\Entity\ClassementCNRS;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\DBAL\DBALException;

/**
 * @method ClassementCNRS|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClassementCNRS|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClassementCNRS[]    findAll()
 * @method ClassementCNRS[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClassementCNRSRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ClassementCNRS::class);
    }

    /**
     * @return mixed
     */
    public function afficheClassementCNRS(): array
    {
        $query = $this->getEntityManager()->getConnection();

    $sql = 'SELECT * FROM classement_cnrs order by classement_revue';
        try {
            $stmt = $query->prepare($sql);
        } catch (DBALException $e) {
            echo $e->getMessage();
        }
        $stmt->execute();

    // returns an array of arrays (i.e. a raw data set)
    return $stmt->fetchAll();
    }

    /*
    public function findOneBySomeField($value): ?ClassementCNRS
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
