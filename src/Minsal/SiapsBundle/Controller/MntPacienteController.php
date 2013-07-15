<?php

namespace Minsal\SiapsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Minsal\Metodos\Funciones;
use Doctrine\DBAL as DBAL;

class MntPacienteController extends Controller {

    /**
     * @Route("/buscar/paciente", name="buscar_paciente", options={"expose"=true})
     */
    public function buscarPacienteAction() {

        return $this->render('MinsalSiapsBundle:MntPacienteAdmin:resultado_busqueda.html.twig', array('tipo_busqueda' => 'l'));
    }

    /**
     * @Route("/buscar/paciente/global", name="buscar_paciente_global", options={"expose"=true})
     */
    public function buscarPacienteGlobalAction() {

        return $this->render('MinsalSiapsBundle:MntPacienteAdmin:resultado_busqueda.html.twig', array('tipo_busqueda' => 'g'));
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
        $tipo_busqueda = $request->get('tipo_busqueda');

        //INICIALIZANDO VARIABLE DOCTRINE
        $em = $this->getDoctrine()->getEntityManager();
        $conn = $em->getConnection();
        //CONSTANTES
        if (strcmp($tipo_busqueda, 'l') == 0)
            $sql = "SELECT A.*,C.nombre 
                FROM mnt_paciente A, mnt_expediente B, ctl_documento_identidad C
                WHERE B.id_paciente=A.id AND B.habilitado= TRUE AND C.id=A.id_doc_ide_paciente
                    AND A.primer_nombre::text ~* '$primerNombre' 
                    AND A.primer_apellido::text ~* '$primerApellido'";
        else
            $sql = "SELECT A.*,C.nombre 
                FROM mnt_paciente A, ctl_documento_identidad C
                WHERE C.id=A.id_doc_ide_paciente
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
            $conocidoPor = " OR A.conocido_por::text ~* '$conocidoPor'";
        if ($fechaNacimiento != '')
            $fechaNacimiento = " AND A.fecha_nacimiento='$fechaNacimiento'";
        if ($nec != '')
            $nec = " AND B.numero='$nec'";
        if ($dui != '')
            $dui = " AND A.numero_doc_ide_paciente::text ~*'$dui'";

        $sql.=$segundoNombre . $tercerNombre . $segundoApellido . $nombreMadre . $conocidoPor . $fechaNacimiento . $nec . $dui . " ORDER BY A.primer_Apellido";
        if (strcmp($tipo_busqueda, 'l') == 0)
            $query = $conn->query($sql);
        else {
            $establecimientoPN = $this->container->get('security.context')->getToken()->getUser()->getIdEstablecimiento();
            $regional=$establecimientoPN->getIdEstablecimientoPadre()->getIdEstablecimientoPadre();
            $conexion = $em->getRepository('MinsalSiapsBundle:MntConexion')->findOneBy(array('idEstablecimiento'=>$regional));
            $conn = $em->getRepository('MinsalSiapsBundle:MntConexion')->getConexionGenerica($conexion);
            $query = $conn->query($sql);
            
        }

        $numfilas = count($query->rowCount());
        $i = 0;
        $rows = array();
        if ($numfilas > 0) {
            foreach ($query->fetchAll() as $aux) {
                if (strcmp($tipo_busqueda, 'l') == 0) {
                    $numero = $aux['numero'];
                    $id = $aux['id'];
                } else {
                    $numero = '';
                    $id = $aux['id'];
                }
                $rows[$i]['id'] = $id;
                $rows[$i]['cell'] = array($id,
                    $numero,
                    $aux['primer_apellido'] . ' ' . $aux['segundo_apellido'] . ' ' . $aux['apellido_casada'],
                    $aux['primer_nombre'] . ' ' . $aux['segundo_nombre'] . ' ' . $aux['tercer_nombre'],
                    date('d-m-Y', strtotime($aux['fecha_nacimiento'])),
                    substr($aux['nombre'], 0, 4) . ":" . $aux['numero_doc_ide_paciente'],
                    $aux['nombre_madre'],
                    $aux['conocido_por']
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
        $fecha_actual = $fecha_actual['mday'] . '-' . $fecha_actual['mon'] . '-' . $fecha_actual['year'];
        $em = $this->getDoctrine()->getEntityManager();
        $conn = $em->getConnection();
        $calcular = new Funciones();
        $datos['edad'] = $calcular->calcularEdad($conn, $fecha_nacimiento);

        return new Response(json_encode($datos));
    }

}