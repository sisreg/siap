<?php

namespace Minsal\SiapsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class MntPacienteController extends Controller {

    /**
     * @Route("/buscar/paciente", name="buscar_paciente", options={"expose"=true})
     */
    public function buscarPacienteAction() {

        return $this->render('MinsalSiapsBundle:MntPacienteAdmin:resultado_busqueda.html.twig', array());
    }

    /**
     * @Route("/cargar/paciente", name="cargar_paciente", options={"expose"=true})
     */
    public function cargarBusquedaJSON() {
        //OBTENIENDO PARÁMETROS DE BUSQUEDA
        $request = $this->getRequest();
        $primerNombre = $request->get('primer_nombre');
        $segundoNombre = $request->get('segundo_nombre');
        $tercerNombre = $request->get('tercer_nombre');
        $primerApellido = $request->get('primer_apellido');
        $segundoApellido = $request->get('segundo_apellido');
        $nombreMadre = $request->get('nombre_madre');
        $fechaNacimiento = $request->get('fecha_nacimiento');
        $conocidoPor = $request->get('conocido_por');
        $nec = $request->get('nec');
        $dui = $request->get('dui');

        //INICIALIZANDO VARIABLE DOCTRINE
        $em = $this->getDoctrine()->getEntityManager();
        $conn = $em->getConnection();
        //CONSTANTES
        $sql = "SELECT * 
                FROM mnt_paciente A, mnt_expediente B
                WHERE B.id_paciente=A.id AND B.habilitado= TRUE
                    AND A.primer_nombre::text ~* '$primerNombre' 
                    AND A.primer_apellido::text ~* '$primerApellido'";
        //VARIABLES
        if ($segundoNombre != '')
            $segundoNombre = " AND A.segundo_nombre::text ~* '$segundoNombre'";
        if ($tercerNombre != '')
            $tercerNombre = " AND A.tercer_nombre::text ~* '$tercerNombre'";
        if ($segundoApellido != '')
            $segundoApellido = " AND A.segundo_apellido::text ~* '$segundoApellido'";
        if ($nombreMadre != '')
            $nombreMadre = " AND A.nombre_madre::text ~* '$nombreMadre'";
        if ($conocidoPor != '')
            $conocidoPor = " AND A.conocido_por::text ~* '$conocidoPor'";
        if ($fechaNacimiento != '')
            $fechaNacimiento = " AND A.fecha_nacimiento='$fechaNacimiento'";
        if ($nec != '')
            $nec = " AND B.numero='$nec'";
        if ($dui != '')
            $dui = " AND A.numero_doc_ide_paciente::text ~*'$dui'";

        $sql.=$segundoNombre . $tercerNombre . $segundoApellido . $nombreMadre . $conocidoPor . $fechaNacimiento .$nec.$dui. " ORDER BY A.primer_Apellido";
        
        $query = $conn->query($sql);
        $numfilas = count($query->rowCount());
        $i = 0;
        $rows = array();
        if ($numfilas > 0) {
            foreach ($query->fetchAll() as $aux) {
                $rows[$i]['id'] = $aux['id'];
            $rows[$i]['cell'] = array($aux['id'],
                $aux['numero'],
                $aux['primer_apellido'] . ' ' . $aux['segundo_apellido']  . ' ' . $aux['apellido_casada'] ,
                $aux['primer_nombre'] . ' ' . $aux['segundo_nombre'] . ' ' . $aux['tercer_nombre'],
                date('d-m-Y', strtotime($aux['fecha_nacimiento'])), //->format('d-m-Y'),//$aux->getFechaNacimiento()->format('d-m-Y'),
                $aux['numero_doc_ide_paciente'],//$aux->getNumeroDocIdePaciente(),
                $aux['nombre_madre'],//$aux->getNombreMadre(),
                $aux['conocido_por']//$aux->getConocidoPor()
            );
            $i++;
            }   
        }
        
        $datos = json_encode($rows);
        $pages = floor($numfilas / 10) + 1;

        $jsonresponse = '{
               "page":"1",
               "total":"' . $pages . '",
               "records":"' . $numfilas . '", 
               "rows":' . $datos . '}';

        return new Response($jsonresponse);
    }

    /**
     * @Route("/departamentos/get", name="get_departamentos", options={"expose"=true})
     * @Method("GET")
     */
    public function getDepartamentosAction() {

        $request = $this->getRequest();
        $idPais = $request->get('idPais');
        $em = $this->getDoctrine()->getEntityManager();
        $dql = "SELECT d FROM MinsalSiapsBundle:CtlDepartamento d
                    WHERE d.idPais = :idPais ";
        $departamentos['deptos'] = $em->createQuery($dql)
                ->setParameter('idPais', $idPais)
                ->getArrayResult();

        return new Response(json_encode($departamentos));
    }

    /**
     * @Route("/municipios/get", name="get_municipios", options={"expose"=true})
     * @Method("GET")
     */
    public function getMunicipiosAction() {

        $request = $this->getRequest();
        $idDepartamento = $request->get('idDepartamento');
        $em = $this->getDoctrine()->getEntityManager();
        $dql = "SELECT m FROM MinsalSiapsBundle:CtlMunicipio m
                    WHERE m.idDepartamento = :idDepartamento ";
        $municipios['municipios'] = $em->createQuery($dql)
                ->setParameter('idDepartamento', $idDepartamento)
                ->getArrayResult();

        return new Response(json_encode($municipios));
    }

    /**
     * @Route("/cantones/get", name="get_cantones", options={"expose"=true})
     * @Method("GET")
     */
    public function getCantonesAction() {

        $request = $this->getRequest();
        $idMunicipio = $request->get('idMunicipio');
        $em = $this->getDoctrine()->getEntityManager();
        $dql = "SELECT c FROM MinsalSiapsBundle:CtlCanton c
                    WHERE c.idMunicipio = :idMunicipio ";
        $cantones['cantones'] = $em->createQuery($dql)
                ->setParameter('idMunicipio', $idMunicipio)
                ->getArrayResult();

        return new Response(json_encode($cantones));
    }

    /**
     * @Route("/paciente/edad}", name="edad_paciente", options={"expose"=true})
     * @Method("GET")
     */
    public function edad_paciente() {

        $request = $this->getRequest();
        $fecha_nacimiento = $request->get('fecha_nacimiento');
        $fecha_actual = getdate();
        $fecha_actual = $fecha_actual['mday'].'-'. $fecha_actual['mon'].'-'.$fecha_actual['year'];
        $em = $this->getDoctrine()->getEntityManager();
        $conn = $em->getConnection();
        $sql = "SELECT age('$fecha_actual','$fecha_nacimiento')";
        $query = $conn->query($sql);
        if ($query->rowCount() > 0) {
            $edad = $query->fetch();
            $edad = $edad['age'];
            $edad = ereg_replace('years', 'años,', $edad);
            $edad = ereg_replace('year', 'año,', $edad);
            $edad = ereg_replace('mons', 'meses,', $edad);
            $edad = ereg_replace('mon', 'mes,', $edad);
            $edad = ereg_replace('days', 'días,', $edad);
            $edad = ereg_replace('day', 'día,', $edad);
            $edad = ereg_replace('[,]$', '', $edad);
            $datos['edad'] = $edad;
        }

        return new Response(json_encode($datos));
    }

}
