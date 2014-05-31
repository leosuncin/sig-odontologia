<?php

namespace UES\FO\SIGBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Ps\PdfBundle\Annotation\Pdf;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use UES\FO\SIGBundle\Model\ParametrosEstrategico;
use UES\FO\SIGBundle\Form\EstrategicoType;

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
        return array('form'=> $form->createView());
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
                    'fecha_inicio' => date_format($data->getFechaInicio(), 'd-m-Y'),
                    'fecha_fin'    => date_format($data->getFechaFin(), 'd-m-Y'),
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
            return new JsonResponse(json_encode($this->getFormErrors($form)), 400);// sí la petición es AJAX responder con JSON con los errores
        } else {
            return array('form'=> $form->createView());// sí no mostrar de nuevo el formulario con los errores
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
        /*$em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder()
            ->select('c')
            ->from('SIGBundle:Citas', 'c')
            ->where('c.fechacita BETWEEN :inicio AND :fin')
            ->setParameter(':inicio', $fecha_inicio)
            ->setParameter(':fin', $fecha_fin);
            if($sexo != 0){
                $qb->andWhere('c.codexpediente IN (SELECT exp.codexpediente FROM SIGBundle:Datosgenerales exp WHERE exp.genero = :sexo)')
                    ->setParameter(':sexo', $sexo);
            }
        $cant_ninias = $qb->getQuery()->getArrayResult();*/
        $cant_ninias = 10;

        return array(
            'titulo'       => 'Reporte de asistencias generales',
            'autor'        => $this->getUser()->getNombreCompleto(),
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin'    => $fecha_fin,
            'cant_ninias'  => $cant_ninias,
            'cant_ninios'  => $sexo
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

    private function getFormErrors(\Symfony\Component\Form\Form $form) {        
        $result = [];

        // Looking for own errors.
        $errors = $form->getErrors();
        if (count($errors)) {
            $result['errors'] = [];
            foreach ($errors as $error) {
                $result['errors'][] = $error->getMessage();
            }
        }

        // Looking for invalid children and collecting errors recursively.
        if ($form->count()) {
            $childErrors = [];
            foreach ($form->all() as $child) {
                if (!$child->isValid()) {
                    $childErrors[$child->getName()] = $this->getFormErrors($child);
                }
            }
            if (count($childErrors)) {
                $result['childrens'] = $childErrors;
            }
        }

        return $result;
    }
}
