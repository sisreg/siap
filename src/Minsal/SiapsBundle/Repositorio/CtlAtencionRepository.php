<?php

namespace Minsal\SiapsBundle\Repositorio;

use Doctrine\ORM\EntityRepository;

/**
 * CtlAtencionRepository
 *
 */
class CtlAtencionRepository extends EntityRepository {

    public function obtenerAtenciones() {
        return $regiones = $this->getEntityManager()
                ->createQueryBuilder()
                ->select('a')
                ->from('MinsalSiapsBundle:CtlAtencion', 'a')
                ->where('a.idTipoAtencion != 4')
                ->getQuery()
                ->getResult();
    }
    
    public function obtenerEspecialidades() {
        return $regiones = $this->getEntityManager()
                ->createQueryBuilder()
                ->select('a')
                ->from('MinsalSiapsBundle:CtlAtencion', 'a')
                ->where('a.idTipoAtencion = 1')
                ->getQuery()
                ->getResult();
    }

}
