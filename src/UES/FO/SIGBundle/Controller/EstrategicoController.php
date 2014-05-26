<?php

namespace UES\FO\SIGBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Ps\PdfBundle\Annotation\Pdf;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @Route("/asistencias", name="asistencias")
     * @Method("GET")
     * @Template()
     */
    public function asistenciaAction()
    {
        $form = $this->createReportForm();
        return array('form'=> $form->createView());
    }
    /**
     * @Route("/asistencias", name="asistencias_post")
     * @Method("POST")
     * @Template("SIGBundle:Estrategico:asistencia.html.twig")
     */
    public function asistenciaPostAction(Request $request)
    {

        $form = $this->createReportForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $data = $form->getData();
            return $this->redirect($this->generateUrl('reporte-asistencias', array('desde' => date_format($data['desde'], 'd-m-y'), 'hasta'=>date_format($data['hasta'], 'd-m-y'), '_format'=>'pdf')));
        }

        return array('form'=> $form->createView());
    }

    /**
     * @Route(
     *     "/{desde}/{hasta}/asistencias.{_format}",
     *     name="reporte-asistencias",
     *     options={"expose"=true}
     * )
     * @Method("GET")
     * @Template()
     * @Pdf()
     */
    public function reporteAsistenciaAction(\Datetime $desde, \Datetime $hasta)
    {
        return array('desde' => $desde, 'hasta'=> $hasta);
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

    private function createReportForm(){
        $constraints = array(
            new Assert\NotBlank(array(
                'message' => 'El campo no puede quedar vacio'
            )));
        $formBuilder = $this->createFormBuilder()
            ->add('desde', 'date', array(
                'label'       => 'Fecha de inicio',
                'widget'=>'single_text',
                'format'=>'d-M-y',
                'attr'        => array('placeholder' => 'Escriba la fecha de inicio de el periodo','class'=>'datepicker'),
                'constraints' => $constraints
                ))
            ->add('hasta', 'date', array(
                'label'       => 'Fecha de fin',
                'widget'=>'single_text',
                'format'=>'d-M-y',
                'attr'        => array('placeholder' => 'Escriba la fecha de fin de el periodo','class'=>'datepicker'),
                'constraints' => $constraints
                ))
            ->add('actions', 'form_actions');
                $formBuilder->get('actions')
                    ->add('Enviar', 'submit')
                    ->add('limpiar', 'reset');
                    $formBuilder
                ->setAction($this->generateUrl('asistencias_post'))
                ->setMethod('POST');

        return $formBuilder->getForm();;
    }
}
