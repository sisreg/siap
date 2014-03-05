<?php

namespace Minsal\SiapsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\DBAL as DBAL;

class GeneralesController extends Controller {
    /*
     * DESCRIPCIÓN: Función para que el FosUserBundle pueda imprimir el mensaje
     * de cambiar contraseña con éxito.
     * ANALISTA PROGRAMADOR: Karen Peñate
     */

    /**
     * @Route("/profile/show", name="fos_user_profile_show")
     */
    public function raiz() {
        $this->get('session')->getFlashBag()->add(
                'notice', 'change_password.flash.success'
        );

        return $this->redirect($this->generateUrl('_inicio'));
    }

    /*
     * DESCRIPCIÓN: Método que devuelve un JSON con los departamentos de acuerdo
     * al idPais que se envia.
     * ANALISTA PROGRAMADOR: Victoria López
     */

    /**
     * @Route("/departamentos/get", name="get_departamentos", options={"expose"=true})
     * @Method("GET")
     */
    public function getDepartamentosAction() {

        $request = $this->getRequest();
        $idPais = $request->get('idPais');
        $em = $this->getDoctrine()->getManager();
        $dql = "SELECT d FROM MinsalSiapsBundle:CtlDepartamento d
                    WHERE d.idPais = :idPais ";
        $departamentos['deptos'] = $em->createQuery($dql)
                ->setParameter('idPais', $idPais)
                ->getArrayResult();

        return new Response(json_encode($departamentos));
    }

    /*
     * DESCRIPCIÓN: Método que devuelve un JSON con los municipios de acuerdo
     * al idDepartamento que se envia.
     * ANALISTA PROGRAMADOR: Victoria López
     */

    /**
     * @Route("/municipios/get", name="get_municipios", options={"expose"=true})
     * @Method("GET")
     */
    public function getMunicipiosAction() {

        $request = $this->getRequest();
        $idDepartamento = $request->get('idDepartamento');
        $em = $this->getDoctrine()->getManager();
        $dql = "SELECT m FROM MinsalSiapsBundle:CtlMunicipio m
                    WHERE m.idDepartamento = :idDepartamento ";
        $municipios['municipios'] = $em->createQuery($dql)
                ->setParameter('idDepartamento', $idDepartamento)
                ->getArrayResult();

        return new Response(json_encode($municipios));
    }

    /*
     * DESCRIPCIÓN: Método que devuelve un JSON con los cantones de acuerdo
     * al idMunicipio que se envia.
     * ANALISTA PROGRAMADOR: Victoria López
     */

    /**
     * @Route("/cantones/get", name="get_cantones", options={"expose"=true})
     * @Method("GET")
     */
    public function getCantonesAction() {

        $request = $this->getRequest();
        $idMunicipio = $request->get('idMunicipio');
        $em = $this->getDoctrine()->getManager();
        $dql = "SELECT c FROM MinsalSiapsBundle:CtlCanton c
                    WHERE c.idMunicipio = :idMunicipio ";
        $cantones['cantones'] = $em->createQuery($dql)
                ->setParameter('idMunicipio', $idMunicipio)
                ->getArrayResult();

        return new Response(json_encode($cantones));
    }

    /*
     * DESCRIPCIÓN: Método que devuelve un JSON de los paises
     * habilitados.
     * ANALISTA PROGRAMADOR: Karen Peñate
     */

    /**
     * @Route("/paises/get", name="get_paises", options={"expose"=true})
     */
    public function getPaisesHabilitadosAction() {
        $em = $this->getDoctrine()->getManager();
        $dql = "SELECT p 
                FROM MinsalSiapsBundle:CtlPais p
                WHERE p.activo = TRUE
                ORDER BY p.nombre";
        $paises['paises'] = $em->createQuery($dql)
                ->getArrayResult();

        return new Response(json_encode($paises));
    }

    /*
     * DESCRIPCIÓN: Método que devuelve un JSON de los paises
     * habilitados.
     * ANALISTA PROGRAMADOR: Karen Peñate
     */

    /**
     * @Route("/pais/depto/get", name="get_pais_depto", options={"expose"=true})
     */
    public function obtenerPaisPorDeptoAction() {
        $em = $this->getDoctrine()->getManager();
        $request = $this->getRequest();
        $dql = "SELECT p.id
                FROM MinsalSiapsBundle:CtlDepartamento d
                JOIN d.idPais p
                WHERE d.id= :departamento";
        $aux = $em->createQuery($dql)
                ->setParameter('departamento', $request->get('idDepartamento'))
                ->getArrayResult();
        $pais['pais'] = $aux[0]['id'];
        return new Response(json_encode($pais));
    }

}
