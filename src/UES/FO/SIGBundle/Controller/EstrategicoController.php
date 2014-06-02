<?php

namespace UES\FO\SIGBundle\Controller;

use Ps\PdfBundle\Annotation\Pdf;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use UES\FO\SIGBundle\Form\EstrategicoType;
use UES\FO\SIGBundle\Form\Util\FormUtils;
use UES\FO\SIGBundle\Model\ParametrosEstrategico;

/**
 * @Route("/estrategico")
 */
class EstrategicoController extends Controller
{
    /**
     * @Route("/relacion-sagital", name="relacion-sagital")
     * @Template()
     */
    public function relacionSagitalAction()
    {
    }

    /**
     * @Route(
     *     "/relacion-sagital.{_format}",
     *     name="reporte-relacion-sagital",
     *     options={"expose"=true}
     * )
     * @Method("POST")
     * @Template()
     * @Pdf()
     */
    public function reporteRelacionSagitalAction($request)
    {
    }

    /**
     * @Route("/cantidad-citas", name="cantidad-citas")
     * @Template()
     */
    public function citasAction()
    {
    }

    /**
     * @Route(
     *     "/cantidad-citas.{_format}",
     *     name="reporte-cantidad-citas",
     *     options={"expose"=true}
     * )
     * @Method("POST")
     * @Template()
     * @Pdf()
     */
    public function reporteCitasAction($request)
    {
    }

    /**
     * @Route("/plan-tratamiento", name="plan-tratamiento")
     * @Template()
     */
    public function tratamientoAction()
    {
    }

    /**
     * @Route(
     *     "/plan-tratamiento.{_format}",
     *     name="reporte-plan-tratamiento",
     *     options={"expose"=true}
     * )
     * @Method("POST")
     * @Template()
     * @Pdf()
     */
    public function reporteTratamientoAction($request)
    {
    }

    /**
     * Muestra el formulario de parámetros para el reporte de asistencias generales
     *
     * @Route("/asistencias", name="asistencias")
     * @Method("GET")
     * @Template()
     */
    public function asistenciaAction()
    {
        $form = $this->createForm(// crear el formulario a partir de una clase modelo
            new EstrategicoType(), // clase formulario de Symfony
            new ParametrosEstrategico(), // modelo donde se manejaran los parámetros
            array(
                'action' => $this->generateUrl('validar-asistencias'),// a donde va a ser redirigido el formulario
                'method' => 'POST',// por cual método HTTP
                'attr' => array('col_size' => 'xs')// el tamaño mínimo del dispositivo
            ));
        // enviar variables a la vista para ser mostrada
        return array('title' => 'Reporte de asistencias generales', 'form'=> $form->createView());
    }

    /**
     * Validar la información del formulario enviado por método POST
     *
     * @Route(
     *     "/asistencias",
     *     name="validar-asistencias",
     *     options={"expose"=true}
     * )
     * @Method("POST")
     * @Template("SIGBundle:Estrategico:asistencia.html.twig")
     */
    public function validateAsistenciaAction(Request $request)
    {
        $ajax = $request->isXmlHttpRequest();// comprobar si la petición es AJAX
        $data = new ParametrosEstrategico();// instancia de clase donde se manejaran los parámetros
        $form = $this->createForm(// crear el formulario
            new EstrategicoType(),// a partir de una clase modelo
            $data,
            array(
                'action' => $this->generateUrl('validar-asistencias'),// a donde va a ser redirigido el formulario
                'method' => 'POST',// por cual método HTTP
                'attr' => array('col_size' => 'xs')// el tamaño mínimo del dispositivo
            ));

        $form->handleRequest($request);// manejar la petición con el formulario de Symfony

        if ($form->isValid()) {// Symfony verifica que la información enviada cumpla con las reglas
            // generar la URL donde se mostrará el PDF
            $route = $this->generateUrl('pdf_viewer').'?file='.$this->generateUrl('reporte-asistencias', array(
                    'fecha_inicio' => $data->getFechaInicio()->format('d-m-Y'),
                    'fecha_fin'    => $data->getFechaFin()->format('d-m-Y'),
                    'sexo'         => $data->getSexo(),
                    '_format'      =>'pdf'), true);
            if($ajax) {
                return new JsonResponse(json_encode(array('route' => $route)));// sí la petición es AJAX responder con un JSON con la URL
            } else {
                return new RedirectResponse($route);// sí la petición no es AJAX redirigir el navegador al visor
            }
        }
        // en caso de que la información enviada tenga errores
        if ($ajax) {
            return new JsonResponse(json_encode(FormUtils::getFormErrors($form)), 400);// sí la petición es AJAX responder con JSON con los errores
        } else {
            return array('title' => 'Reporte de asistencias generales', 'form'=> $form->createView());// sí no mostrar de nuevo el formulario con los errores
        }
    }

    /**
     * Genera el reporte de asistencias generales
     *
     * @Route(
     *     "/{fecha_inicio}/{fecha_fin}/{sexo}/asistencias.{_format}",
     *     name="reporte-asistencias",
     *     requirements={
     *         "fecha_inicio"="\d{2}-\d{2}-\d{4}",
     *         "fecha_fin"="\d{2}-\d{2}-\d{4}",
     *         "_format"="pdf|html",
     *         "sexo"="0|1|2"
     * })
     * @Method("GET")
     * @Template()
     * @Pdf()
     */
    public function reporteAsistenciaAction(\DateTime $fecha_inicio, \DateTime $fecha_fin, $sexo = 0)
    {
        $parametros = new ParametrosEstrategico();// Crear una instancia del modelo de parámetros
        $parametros->setFechaInicio($fecha_inicio);
        $parametros->setFechaFin($fecha_fin);
        $parametros->setSexo($sexo);

        $errores = $this->get('validator')->validate($parametros);// Validar la instancia sí sus atributos son correctos
        if (count($errores) > 0) {
            throw new BadRequestHttpException((string) $errores);// Si hay un error, no continua con la generación del reporte y muestra el error
        }

        $pdo_fecha_inicio = $fecha_inicio->format('Y-m-d');// Formatear la fecha al estilo de MySQL
        $pdo_fecha_fin = $fecha_fin->format('Y-m-d');
        $conn = $this->getDoctrine()->getManager()->getConnection();// Obtener la conexión a la base de datos
        $stmt = $conn->prepare('CALL pr_reporte_asistencias(:fecha_inicio, :fecha_fin, :sexo, @cant_ninios, @cant_ninias, @cant_total)');// Preparar la llamada al procedimiento almacenado
        $stmt->bindParam(':fecha_inicio', $pdo_fecha_inicio, \PDO::PARAM_STR);// Preparar los parámetros de la consulta
        $stmt->bindParam(':fecha_fin', $pdo_fecha_fin, \PDO::PARAM_STR);
        $stmt->bindParam(':sexo', $sexo, \PDO::PARAM_INT);
        $stmt->execute();// Ejecutar la consulta
        $stmt = $conn->query('SELECT @cant_ninios, @cant_ninias, @cant_total');// Consultar el resultado de la ejecución
        $result = $stmt->fetchAll();// Obtener los valores del resultado

        return array(// Pasar las variables a la vista del reporte
            'titulo'       => 'Reporte de asistencias generales',
            'autor'        => $this->getUser()->getNombreCompleto(),
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin'    => $fecha_fin,
            'cant_ninias'  => $result[0]['@cant_ninias'],
            'cant_ninios'  => $result[0]['@cant_ninios'],
            'cant_total'   => $result[0]['@cant_total']
        );
    }

    /**
     * @Route("/casos-referidos", name="casos-referidos")
     * @Template()
     */
    public function casosAction()
    {
    }

    /**
     * @Route(
     *     "/casos-referidos.{_format}",
     *     name="reporte-casos-referidos",
     *     options={"expose"=true}
     * )
     * @Method("POST")
     * @Template()
     * @Pdf()
     */
    public function reporteCasosAction($request)
    {
    }
}
