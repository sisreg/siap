<?php

namespace Minsal\SiapsBundle\Repositorio;

use Doctrine\ORM\EntityRepository;

/**
 * CtlEstablecimientoRepository
 *
 */
class CtlEstablecimientoRepository extends EntityRepository {

    public function obtenerEstablecimientoConfigurado() {

        $establecimiento = $this->getEntityManager()
                ->createQueryBuilder()
                ->select('e')
                ->from('MinsalSiapsBundle:CtlEstablecimiento', 'e')
                ->where('e.id = 2')
                ->getQuery();

        return $establecimiento->getResult();
    }
    public function obtenerEstabConfigurado() {

        return $this->getEntityManager()
                ->createQueryBuilder()
                ->select('e')
                ->from('MinsalSiapsBundle:CtlEstablecimiento', 'e')
                ->where('e.id = 2');
    }

}
