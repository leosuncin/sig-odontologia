<?php

namespace UES\FO\SIGBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Ps\PdfBundle\Annotation\Pdf;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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
        $form = $this->createReportForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $data = $form->getData();
            $fecha_inicio = $data['fecha_inicio'];
            $fecha_fin = $data['fecha_fin'];
            if($fecha_inicio > $fecha_fin){
                $form->get('fecha_fin')->addError(new \Symfony\Component\Form\FormError('La fecha de finalización debe ser mayor que la de inicio'));
                return new Response(json_encode($this->getFormErrors($form)), 400, array("Content-Type" => "application/json; charset=UTF-8"));
            } else {
                $data = $form->getData();
                return $this->redirect(
                    $this->generateUrl('pdf_viewer')."?file=".$this->generateUrl('reporte-asistencias', array('fecha_inicio' => date_format($data['fecha_inicio'], 'd-m-Y'), 'fecha_fin'=>date_format($data['fecha_fin'], 'd-m-Y'), '_format'=>'pdf'), true)
                );
            }
        } else {
            return new Response(json_encode($this->getFormErrors($form)), 400, array("Content-Type" => "application/json; charset=UTF-8"));
        }

        return array('form'=> $form->createView());
    }

    /**
     * @Route("/{fecha_inicio}/{fecha_fin}/asistencias.{_format}", name="reporte-asistencias")
     * @Template()
     * @Pdf()
     */
    public function reporteAsistenciaAction(\DateTime $fecha_inicio, \DateTime $fecha_fin)
    {
        return array(
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin' => $fecha_fin
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

    private function createReportForm()
    {
        $constraints = array(
        	new Assert\NotBlank(array(
                'message' => 'El campo no puede quedar vacio'
            )),
            new Assert\Date(array(
                'message' => 'Ingrese una fecha valida'
            ))
        );

        $formBuilder = $this->createFormBuilder()
        	->add('fecha_inicio', 'date', array(
                'label'           => 'Fecha de inicio',
                'widget'          => 'single_text',
                'format'          => 'dd/MM/yyyy',
                'invalid_message' => 'La fecha debe tener el formato dd/mm/yyyy',
                'attr'            => array(
                    'placeholder'      => 'Por ejemplo: 17/01/2007',
                    'class'            => 'datepicker',
                    'data-provide'     => 'datepicker',
					'data-date-format' => 'dd/mm/yyyy',
					'data-language'    => 'es'
                ),
                'constraints'     => $constraints
                ))
            ->add('fecha_fin', 'date', array(
                'label'           => 'Fecha de fin',
                'widget'          => 'single_text',
                'format'          => 'dd/MM/yyyy',
                'invalid_message' => 'La fecha debe tener el formato dd/mm/yyyy',
                'attr'            => array(
                    'placeholder'      => 'Por ejemplo: 17/10/2009',
                    'class'            => 'datepicker',
                    'data-provide'     => 'datepicker',
                    'data-date-format' => 'dd/mm/yyyy',
                    'data-language'    => 'es'
                ),
                'constraints'     => $constraints
                ))
            ->add('sexo', 'choice',
                array(
                    'label'   => 'Sexo',
                    'choices' => array(
                        0 => 'Ambos',
                        1 => 'Masculino',
                        2 => 'Femenino'
                )));

        $formBuilder->add('actions', 'form_actions');
            $formBuilder->get('actions')
                ->add('generar', 'submit')
                ->add('limpiar', 'reset');

        $formBuilder
                ->setAction($this->generateUrl('validar-asistencias'))
                ->setMethod('POST');

        return $formBuilder->getForm();
    }
}
