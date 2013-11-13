<?php

namespace Minsal\SiapsBundle\Repositorio;

use Doctrine\ORM\EntityRepository;

/**
 * MntExpedienteRepository
 *
 */
class MntExpedienteRepository extends EntityRepository {
    /*
     * Devuelve el ultimo valor de un expediente en un determinado establecimiento
     */

    public function obtenerExpedienteSugerido() {
        $formato = $this->getEntityManager()
                ->createQuery(
                        'SELECT e.tipoExpediente
                         FROM MinsalSiapsBundle:CtlEstablecimiento e
                         WHERE e.configurado=true'
                )->getSingleResult();
        
        if($formato['tipoExpediente']=='G'){
            $anio=date("y");
            $numero = $this->getEntityManager()
                ->createQuery(
                        "SELECT MAX(e.numero) numero
                         FROM MinsalSiapsBundle:MntExpediente e
                         WHERE e.numero LIKE '%-$anio'"
                )->getSingleResult();
            list($numero,$anio)=  explode('-', $numero['numero']);
            $numero++;
            $nuevo=$numero.'-'.$anio;
            return $nuevo;
        }else{
            $numero = $this->getEntityManager()
                ->createQuery(
                        "SELECT MAX(e.numero) numero
                         FROM MinsalSiapsBundle:MntExpediente e
                         "
                )->getSingleResult();
            return $numero['numero']++;
        }
    }

}

?>
