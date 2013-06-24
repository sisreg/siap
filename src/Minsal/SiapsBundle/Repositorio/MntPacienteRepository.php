<?php

namespace Minsal\SiapsBundle\Repositorio;

use Doctrine\ORM\EntityRepository;

/**
 * MntPacienteRepository
 *
 */
class MntPacienteRepository extends EntityRepository {

    public function obtenerdatosPaciente($valor) {

     $consulta=  $this->getEntityManager()
                ->createQueryBuilder()
                ->select('p','u','e')
                ->from('MinsalSiapsBundle:MntPaciente', 'p')
                ->leftJoin('p.expedientes','e')
                ->join('p.idUser','u')
                ->where('p.id =:valor and e.habilitado=true')
                ->setParameter(':valor', $valor)
                ->getQuery();
     return $consulta->getResult();
    }
}
?>