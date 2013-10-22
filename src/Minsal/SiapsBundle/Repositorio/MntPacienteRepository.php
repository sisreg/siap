<?php

namespace Minsal\SiapsBundle\Repositorio;

use Doctrine\ORM\EntityRepository;
use Minsal\SiapsBundle\Entity\MntPaciente;
/**
 * MntPacienteRepository
 *
 */
class MntPacienteRepository extends EntityRepository {

    public function obtenerdatosPaciente($valor) {

        $consulta = $this->getEntityManager()
                ->createQueryBuilder()
                ->select('p', 'u', 'e')
                ->from('MinsalSiapsBundle:MntPaciente', 'p')
                ->leftJoin('p.expedientes', 'e')
                ->leftjoin('p.idUser', 'u')
                ->where('p.id =:valor and e.habilitado=true')
                ->setParameter(':valor', $valor)
                ->getQuery();
        try {
            return $consulta->getSingleResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return new MntPaciente();
        }
    }

}

?>