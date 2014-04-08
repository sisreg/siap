<?php

namespace Minsal\SiapsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\DBAL as DBAL;
use FOS\UserBundle\Model\User;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

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

    /*
     * DESCRIPCIÓN:
     *      Método que verifica si el empleado posee servicios a brindar
     *      dentro del establecimiento
     * ANALISTA PROGRAMADOR: Caleb Rodríguez
     */

    /**
     * @Route("/siaps/verify/medicservice", name="verify_medic_service", options={"expose"=true})
     *
     * @return Response
     */
    public function verifyMedicServiceAction() {
        $user     = $this->container->get('security.context')->getToken()->getUser();
        $session  = $this->container->get('session');
        $em       = $this->getDoctrine()->getManager();
        $response = new RedirectResponse($this->generateUrl('sonata_admin_dashboard'));
        $codigoEmpleado = $user->getIdEmpleado()->getIdTipoEmpleado()->getCodigo();

        if($session->get('_moduleSelection') !== null && $session->get('_moduleSelection') == '3' && $codigoEmpleado == 'MED') {
            if( (null === $session->get('_idEmpEspecialidadEstab')) || (null === $session->get('_idEmpEspecialidadEstab')) ) {
                $idEmpleado = $user->getIdEmpleado();
                $dql = "SELECT t01.id as idAtenAreaModEstab, t02.nombre as mombreAtenAreaModEstab
                        FROM MinsalSiapsBundle:MntEmpleadoEspecialidadEstab t00
                        INNER JOIN MinsalSiapsBundle:MntAtenAreaModEstab t01 WITH (t01.id = t00.idAtenAreaModEstab)
                        INNER JOIN MinsalSiapsBundle:CtlAtencion         t02 WITH (t02.id = t01.idAtencion)
                        INNER JOIN MinsalSiapsBundle:MntAreaModEstab     t03 WITH (t03.id = t01.idAreaModEstab)
                        INNER JOIN MinsalSiapsBundle:CtlAreaAtencion     t04 WITH (t04.id = t03.idAreaAtencion)
                        INNER JOIN MinsalSiapsBundle:MntEmpleado         t05 WITH (t05.id = t00.idEmpleado)
                        INNER JOIN MinsalSiapsBundle:MntTipoEmpleado     t06 WITH (t06.id = t05.idTipoEmpleado)
                        WHERE t03.id = 1 AND t00.idEmpleado = :idEmpleado AND t06.codigo = :codigoEmpleado";

                $query = $em->createQuery($dql);
                $query->setParameters(array(':idEmpleado' => $idEmpleado, ':codigoEmpleado' => 'MED'));
                $empEspecialidades = $query->getResult();

                if($empEspecialidades) {
                    if(count($empEspecialidades) > 1) {
                        $response =  $this->render(
                                                    'MinsalSiapsBundle::ServicioMedicoEstablecimiento.html.twig', array(
                                                        'user'              => $user,
                                                        'empEspecialidades' => $empEspecialidades
                                            ));
                    } else {
                        $session->set('_idEmpEspecialidadEstab', $empEspecialidades[0]['idAtenAreaModEstab']);
                        $session->set('_nombreEmpEspecialidadEstab', $empEspecialidades[0]['mombreAtenAreaModEstab']);
                    }
                }   
            }
        }

        return $response;
    }

    /*
     * DESCRIPCIÓN:
     *      Método que setea la especialidad seleccionada por el empleado
     *      y redirecciona a la página principal
     * ANALISTA PROGRAMADOR: Caleb Rodríguez
     */

    /**
     * @Route("/siaps/set/empespecialidad/estab", name="set_emp_especialidad_estab", options={"expose"=true})
     * @Method("POST")
     *
     * @throws \Symfony\Component\Security\Core\Exception\AccessDeniedException
     * @return Response
     */
    public function setEmpEspecialidadEstabAction() {
        $user     = $this->container->get('security.context')->getToken()->getUser();
        $request  = $this->container->get('request');
        $session  = $this->container->get('session');
        $response = new RedirectResponse($this->generateUrl('sonata_admin_dashboard'));
        $codigoEmpleado = $user->getIdEmpleado()->getIdTipoEmpleado()->getCodigo();

        if($request->isMethod('POST') && $session->get('_moduleSelection') !== null && $session->get('_moduleSelection') == '3' && $codigoEmpleado == 'MED') {
            if( (null === $session->get('_idEmpEspecialidadEstab')) || (null === $session->get('_idEmpEspecialidadEstab')) ) {
                $session->set('_idEmpEspecialidadEstab', $request->get('_id-especialidad'));
                $session->set('_nombreEmpEspecialidadEstab', $request->get('_nombre-especialidad'));
            }
            return $response;
        } else {
            throw new AccessDeniedException();
        }
    }
}
