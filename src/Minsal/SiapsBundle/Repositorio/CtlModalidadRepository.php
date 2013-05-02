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
                ->obtenerEstablecimientoConfigurado();

        $modalidades = $this->getEntityManager()
                ->getRepository('MinsalSiapsBundle:MntModalidadEstablecimiento')
                ->obtenerIdModalidadUtilizada($establecimiento);

        return $this->getEntityManager()
                        ->createQueryBuilder()
                        ->select('m')
                        ->from('MinsalSiapsBundle:CtlModalidad', 'm')
                        ->where('m.id NOT IN (:id)')
                        ->setParameter(':id', $modalidades ? : '0' );
    }

}
