<?php

namespace Minsal\SiapsBundle\Repositorio;

use Doctrine\ORM\EntityRepository;

/**
 * CtlModalidadRepository
 *
 */
class CtlModalidadRepository extends EntityRepository {

    public function obtenerModalidades() {

        $establecimiento = $this->getEntityManager()
                ->getRepository('MinsalSiapsBundle:CtlEstablecimiento')
                ->find(1);

        $modalidades = $this->getEntityManager()
                ->getRepository('MinsalSiapsBundle:MntModalidadEstablecimiento')
                ->obtenerModalidadUtilizada($establecimiento);

        return $this->getEntityManager()
                        ->createQueryBuilder()
                        ->select('m')
                        ->from('MinsalSiapsBundle:CtlModalidad', 'm')
                        ->where('m.id NOT IN (:id)')
                        ->setParameter(':id', $modalidades ? : '0' );
    }

}