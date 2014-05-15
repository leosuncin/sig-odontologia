<?php

namespace UES\FO\SIGBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/admin")
 */
class AdminController extends Controller
{
    /**
     * @Route("/actividad", name="actividad-sistema")
     * @Template()
     */
    public function actividadAction()
    {
        return array();
    }

    /**
     * @Route("/respaldar-bd", name="respaldar-bd")
     * @Template()
     */
    public function respaldarBDAction()
    {
        return array();
    }

    /**
     * @Route("/restaurar-bd", name="restaurar-bd")
     * @Template()
     */
    public function restaurarBDAction()
    {
        return array();
    }

}
