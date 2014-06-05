<?php

namespace UES\FO\SIGBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
//Agregados para mmientras
use UES\FO\SIGBundle\Form\Tactico4Type; //este es mi vista del 
use UES\FO\SIGBundle\Form\Tactico5Type; //este es mi vista del 
use UES\FO\SIGBundle\Form\Tactico6Type; //este es mi vista del 
use Ps\PdfBundle\Annotation\Pdf;
use UES\FO\SIGBundle\Form\Util\FormUtils;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/tactico")
 */
class TacticoController extends Controller
{
    /**
     * @Route("/enfermedades-padecidas", name="enfermedades-padecidas")
     * @Template()
     */
    public function enfermedadesPadecidasAction()
    {
        return array();
    }

    /**
     * @Route(
     *     "/enfermedades-padecidas.{_format}",
     *     name="reporte-enfermedades-padecidas",
     *     options={"expose"=true}
     * )
     * @Method("POST")
     * @Template()
     * @Pdf()
     */
    public function reporteEnfermedadesPadecidasAction($request)
    {
    }

    /**
     * @Route("/tipo-perfil", name="tipo-perfil")
     * @Template()
     */
    public function tipoPerfilAction()
    {
    }

    /**
     * @Route(
     *     "/tipo-perfil.{_format}",
     *     name="reporte-tipo-perfil",
     *     options={"expose"=true}
     * )
     * @Method("POST")
     * @Template()
     * @Pdf()
     */
    public function reporteTipoPerfilAction($request)
    {
    }

    /**
     * @Route("/lineas-medias", name="lineas-medias")
     * @Template()
     */
    public function lineasMediasAction()
    {
    }

    /**
     * @Route(
     *     "/lineas-medias.{_format}",
     *     name="reporte-lineas-medias",
     *     options={"expose"=true}
     * )
     * @Method("POST")
     * @Template()
     * @Pdf()
     */
    public function reporteLineasMediasAction($request)
    {
    }

    /**
     * @Route("/sobre-mordidas", name="sobre-mordidas")
     * @Method("GET")
     * @Template()
     */
    public function sobreMordidaAction()
    {
        //return array();
        $form = $this->createForm(// crear el formulario a partir de una clase modelo
            new Tactico4Type(), // clase formulario de Symfony
            //new ParametrosTactico(), // modelo donde se manejaran los parámetros
            array(
                'action' => $this->generateUrl('validar-sobremordida'),// a donde va a ser redirigido el formulario
                'method' => 'POST',// por cual método HTTP
                'attr' => array('col_size' => 'xs')// el tamaño mínimo del dispositivo
            ));
        // enviar variables a la vista para ser mostrada
        return array('title' => 'Reporte de Sobre Mordida', 'form'=> $form->createView());
    }

    /**
     * Validar la información de los parametros enviados por método POST
     *
     * @Route(
     *     "/sobremordida",
     *     name="validar-sobremordida",
     *     options={"expose"=true}
     * )
     * @Method("POST")
     * @Template("SIGBundle:Tactico:sobreMordida.html.twig")
     * @Pdf()
     */
    public function validateSobreMordidaAction(Request $request)
    {
        $ajax = $request->isXmlHttpRequest();
        //$data = new ParametrosEstrategico();
        $form = $this->createForm(
            new Tactico4Type(),
            $data,
            array(
                'action' => $this->generateUrl('validar-sobremordida'),
                'method' => 'POST',
                'attr' => array('col_size' => 'xs')
            ));

        $form->handleRequest($request);

        if ($form->isValid()) {
            $route = $this->generateUrl('pdf_viewer').'?file='.$this->generateUrl('reporte-sobre-mordidas', array(
                    'fecha_inicio' => $data->getFechaInicio()->format('d-m-Y'),
                    'fecha_fin'    => $data->getFechaFin()->format('d-m-Y'),
                    'sexo'         => $data->getSexo(),
                    '_format'      =>'pdf'), true);
            if($ajax) {
                return new JsonResponse(json_encode(array('route' => $route)));
            } else {
                return new RedirectResponse($route);
            }
        }

        if ($ajax) {
            return new JsonResponse(json_encode(FormUtils::getFormErrors($form)), 400);
        } else {
            return array('title' => 'Reporte de sobreMordida', 'form'=> $form->createView());
        }
    }

   /**
     * Genera el reporte de plan de tratamiento
     *
     * @Route(
     *     "/{fecha_inicio}/{fecha_fin}/{sexo}/plan-tratamiento.{_format}",
     *     name="reporte-plan-tratamiento",
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
    public function reporteSobreMordidaAction($request)
    {

    }

    /**
     * @Route("/mordidas-cruzadas", name="mordidas-cruzadas")
     * @Method("GET")
     * @Template()
     */
    public function mordidasCruzadasAction()
    {
       //return array();
        $form = $this->createForm(// crear el formulario a partir de una clase modelo
            new Tactico5Type(), // clase formulario de Symfony
            //new ParametrosTactico(), // modelo donde se manejaran los parámetros
            array(
                'action' => $this->generateUrl('validar-mordidas-cruzadas'),// a donde va a ser redirigido el formulario
                'method' => 'POST',// por cual método HTTP
                'attr' => array('col_size' => 'xs')// el tamaño mínimo del dispositivo
            ));
        // enviar variables a la vista para ser mostrada
        return array('title' => 'Reporte de Mordidas Cruzadas', 'form'=> $form->createView());
    }

    /**
     * Validar la información de los parametros enviados por método POST
     *
     * @Route(
     *     "/mordidasCruzadas",
     *     name="validar-mordidas-cruzadas",
     *     options={"expose"=true}
     * )
     * @Method("POST")
     * @Template("SIGBundle:Tactico:mordidasCruzadas.html.twig")
     * @Pdf()
     */
    public function validateMordidasCruzadasAction(Request $request)
    {
        $ajax = $request->isXmlHttpRequest();
        //$data = new ParametrosEstrategico();
        $form = $this->createForm(
            new Tactico5Type(),
            $data,
            array(
                'action' => $this->generateUrl('validar-mordidas-cruzadas'),
                'method' => 'POST',
                'attr' => array('col_size' => 'xs')
            ));

        $form->handleRequest($request);

        if ($form->isValid()) {
            $route = $this->generateUrl('pdf_viewer').'?file='.$this->generateUrl('reporte-mordidas-cruzadas', array(
                    'fecha_inicio' => $data->getFechaInicio()->format('d-m-Y'),
                    'fecha_fin'    => $data->getFechaFin()->format('d-m-Y'),
                    'sexo'         => $data->getSexo(),
                    '_format'      =>'pdf'), true);
            if($ajax) {
                return new JsonResponse(json_encode(array('route' => $route)));
            } else {
                return new RedirectResponse($route);
            }
        }

        if ($ajax) {
            return new JsonResponse(json_encode(FormUtils::getFormErrors($form)), 400);
        } else {
            return array('title' => 'Reporte de Mordidas Cruzadas', 'form'=> $form->createView());
        }
    }
    /**
     * @Route(
     *     "/mordidas-cruzadas.{_format}",
     *     name="reporte-mordidas-cruzadas",
     *     options={"expose"=true}
     * )
     * @Method("POST")
     * @Template()
     * @Pdf()
     */
    public function reporteMordidasCruzadasAction($request)
    {
    }

    /**
     * @Route("/estadios-nolla", name="estadios-nolla")
     * @Method("GET")
     * @Template()
     */
    public function estadiosNollaAction()
    {
        //return array();
        $form = $this->createForm(// crear el formulario a partir de una clase modelo
            new Tactico6Type(), // clase formulario de Symfony
            //new ParametrosTactico(), // modelo donde se manejaran los parámetros
            array(
                'action' => $this->generateUrl('validar-estadios-nolla'),// a donde va a ser redirigido el formulario
                'method' => 'POST',// por cual método HTTP
                'attr' => array('col_size' => 'xs')// el tamaño mínimo del dispositivo
            ));
        // enviar variables a la vista para ser mostrada
        return array('title' => 'Reporte de Estadios de Nolla', 'form'=> $form->createView());
    }

    /**
     * Validar la información de los parametros enviados por método POST
     *
     * @Route(
     *     "/estadiosNolla",
     *     name="validar-estadios-nolla",
     *     options={"expose"=true}
     * )
     * @Method("POST")
     * @Template("SIGBundle:Tactico:estadiosNolla.html.twig")
     * @Pdf()
     */
    public function validateEstadiosDeNolla(Request $request)
    {
        $ajax = $request->isXmlHttpRequest();
        //$data = new ParametrosEstrategico();
        $form = $this->createForm(
            new Tactico5Type(),
            $data,
            array(
                'action' => $this->generateUrl('validar-estadios-nolla'),
                'method' => 'POST',
                'attr' => array('col_size' => 'xs')
            ));

        $form->handleRequest($request);

        if ($form->isValid()) {
            $route = $this->generateUrl('pdf_viewer').'?file='.$this->generateUrl('reporte-estadios-nolla', array(
                    'fecha_inicio' => $data->getFechaInicio()->format('d-m-Y'),
                    'fecha_fin'    => $data->getFechaFin()->format('d-m-Y'),
                    'sexo'         => $data->getSexo(),
                    '_format'      =>'pdf'), true);
            if($ajax) {
                return new JsonResponse(json_encode(array('route' => $route)));
            } else {
                return new RedirectResponse($route);
            }
        }

        if ($ajax) {
            return new JsonResponse(json_encode(FormUtils::getFormErrors($form)), 400);
        } else {
            return array('title' => 'Reporte de Estadios de Nolla', 'form'=> $form->createView());
        }
    }
    /**
     * @Route(
     *     "/estadios-nolla.{_format}",
     *     name="reporte-estadios-nolla",
     *     options={"expose"=true}
     * )
     * @Method("POST")
     * @Template()
     * @Pdf()
     */
    public function reporteEstadiosNollaAction($request)
    {
    }

}
