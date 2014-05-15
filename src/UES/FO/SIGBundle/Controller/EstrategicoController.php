<?php

namespace UES\FO\SIGBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Ps\PdfBundle\Annotation\Pdf;

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
     * @Template()
     */
    public function asistenciaAction()
    {
    }

    /**
     * @Route(
     *     "/asistencias.{_format}",
     *     name="reporte-asistencias",
     *     options={"expose"=true}
     * )
     * @Method("POST")
     * @Template()
     * @Pdf()
     */
    public function reporteAsistenciaAction($request)
    {
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
