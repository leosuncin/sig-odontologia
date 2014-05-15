<?php

namespace UES\FO\SIGBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Ps\PdfBundle\Annotation\Pdf;

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
     * @Template()
     */
    public function sobreMordidaAction()
    {
    }

    /**
     * @Route(
     *     "/sobre-mordidas.{_format}",
     *     name="reporte-sobre-mordidas",
     *     options={"expose"=true}
     * )
     * @Method("POST")
     * @Template()
     * @Pdf()
     */
    public function reporteSobreMordidaAction($request)
    {
    }

    /**
     * @Route("/mordidas-cruzadas", name="mordidas-cruzadas")
     * @Template()
     */
    public function mordidasCruzadasAction()
    {
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
     * @Template()
     */
    public function estadiosNollaAction()
    {
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
