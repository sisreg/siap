<?php

namespace Minsal\SiapsBundle\Repositorio;

use Doctrine\ORM\EntityRepository;

/**
 * MntModalidadEstablecimientoRepository
 *
 */
class MntModalidadEstablecimientoRepository extends EntityRepository {

    public function obtenerModalidadUtilizada($establecimiento) {
        $consulta = $this->getEntityManager()
                ->createQuery('
                  SELECT mod.id
                  FROM MinsalSiapsBundle:MntModalidadEstablecimiento m
                  JOIN m.idModalidad mod
                  WHERE m.idEstablecimiento = :establecimiento'
                )
                ->setParameter(':establecimiento', $establecimiento);

         return $consulta->getResult();
    }

}
