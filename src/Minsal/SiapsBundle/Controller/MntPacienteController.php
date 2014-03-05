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
    /*
     * DESCRIPCIÓN: Método que devuelve la vista para la busqueda local 
     * del paciente
     * ANALISTA PROGRAMADOR: Karen Peñate
     */

    /**
     * @Route("/buscar/paciente", name="buscar_paciente", options={"expose"=true})
     */
    public function buscarPacienteAction() {

        return $this->render('MinsalSiapsBundle:MntPacienteAdmin:resultado_busqueda.html.twig', array('tipo_busqueda' => 'l'));
    }

    /*
     * DESCRIPCIÓN: Método que devuelve la vista para la busqueda global 
     * del paciente
     * ANALISTA PROGRAMADOR: Karen Peñate
     */

    /**
     * @Route("/buscar/paciente/global", name="buscar_paciente_global", options={"expose"=true})
     */
    public function buscarPacienteGlobalAction() {

        return $this->render('MinsalSiapsBundle:MntPacienteAdmin:resultado_busqueda.html.twig', array('tipo_busqueda' => 'g'));
    }

    /*
     * DESCRIPCIÓN: Método que devuelve un JSON de la busqueda de los pacientes
     * según los parámetros enviados. Dicha consulta se realiza con el gestor
     * POSTGRESQL por el tipo de consulta que se realiza
     * ANALISTA PROGRAMADOR: Karen Peñate - Victoria López
     */

    /**
     * @Route("/cargar/paciente", name="cargar_paciente", options={"expose"=true})
     */
    public function cargarBusquedaJSON() {
        //OBTENIENDO PARÁMETROS DE BUSQUEDA
        $request = $this->getRequest();
        $primerNombre = chop(ltrim($request->get('primer_nombre')));
        $segundoNombre = chop(ltrim($request->get('segundo_nombre')));
        $tercerNombre = chop(ltrim($request->get('tercer_nombre')));
        $primerApellido = chop(ltrim($request->get('primer_apellido')));
        $segundoApellido = chop(ltrim($request->get('segundo_apellido')));
        $nombreMadre = chop(ltrim($request->get('nombre_madre')));
        $fechaNacimiento = $request->get('fecha_nacimiento');
        $conocidoPor = chop(ltrim($request->get('conocido_por')));
        $nec = chop(ltrim($request->get('nec')));
        $dui = $request->get('dui');
        $tipo_busqueda = $request->get('tipo_busqueda');

        //INICIALIZANDO VARIABLE DOCTRINE
        $em = $this->getDoctrine()->getManager();
        $conn = $em->getConnection();
        //CONSTANTES
        if (strcmp($tipo_busqueda, 'l') == 0)
            $sql = "SELECT A.*,C.nombre,B.numero 
                FROM mnt_paciente A LEFT JOIN ctl_documento_identidad C ON C.id=A.id_doc_ide_paciente, mnt_expediente B
                WHERE B.id_paciente=A.id AND B.habilitado= TRUE";
        else
            $sql = "SELECT A.*,C.nombre 
               FROM mnt_paciente A LEFT JOIN ctl_documento_identidad C ON C.id=A.id_doc_ide_paciente
                WHERE ";


        if ($primerNombre != '')
            if (strcmp($tipo_busqueda, 'l') == 0)
                $primerNombre = "  AND A.primer_nombre::text ~* '$primerNombre'";
            else
                $primerNombre = "A.primer_nombre::text ~* '$primerNombre'";
        if ($primerApellido != '')
            $primerApellido = " AND A.primer_apellido::text ~* '$primerApellido'";
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
        if ($nec != '') {
            $numero = explode('-', $nec);
            $entero = (int) $numero[0];
            $nec = (string) $entero;
            if (count($numero) == 2)
                $nec.='-' . $numero[1];
            $nec = " AND B.numero='$nec'";
        }
        if ($dui != '')
            $dui = " AND A.numero_doc_ide_paciente::text ~*'$dui'";

        $sql.=$primerNombre . $primerApellido . $segundoNombre . $tercerNombre . $segundoApellido . $nombreMadre . $conocidoPor . $fechaNacimiento . $nec . $dui . " ORDER BY A.primer_Apellido";
        if (strcmp($tipo_busqueda, 'l') == 0)
            $query = $conn->query($sql);
        else {
            $establecimientoPN = $this->container->get('security.context')->getToken()->getUser()->getIdEstablecimiento();
            $regional = $establecimientoPN->getIdEstablecimientoPadre()->getIdEstablecimientoPadre();
            $conexion = $em->getRepository('MinsalSiapsBundle:MntConexion')->findOneBy(array('idEstablecimiento' => $regional));
            $conn = $em->getRepository('MinsalSiapsBundle:MntConexion')->getConexionGenerica($conexion);
            $query = $conn->query($sql);
        }

        $numfilas = count($query->rowCount());
        $espacio = "";
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
                    $espacio, $numero,
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

    /*
     * DESCRIPCIÓN: Método que se devuelve en un JSON la edad de un determinado
     * paciente.
     * ANALISTA PROGRAMADOR: Karen Peñate
     */

    /**
     * @Route("/paciente/edad}", name="edad_paciente", options={"expose"=true})
     * @Method("GET")
     */
    public function edad_paciente() {
        $request = $this->getRequest();
        $fecha_nacimiento = $request->get('fecha_nacimiento');
        $fecha_actual = getdate();
        $fecha_actual = $fecha_actual['mday'] . '-' . $fecha_actual['mon'] . '-' . $fecha_actual['year'];
        $em = $this->getDoctrine()->getManager();
        $conn = $em->getConnection();
        $calcular = new Funciones();
        $datos['edad'] = $calcular->calcularEdad($conn, $fecha_nacimiento);

        return new Response(json_encode($datos));
    }

}
