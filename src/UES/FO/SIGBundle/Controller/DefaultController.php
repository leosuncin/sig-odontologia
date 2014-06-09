<?php

namespace UES\FO\SIGBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\SecurityContextInterface;

class DefaultController extends Controller
{
    /**
     * @Route("", name="index")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }

    /**
     * @Route("/login", name="login")
     * @Template()
     */
    public function loginAction()
    {
        $request = $this->getRequest();
        $session = $request->getSession();
 
		// obtiene el error de inicio de sesión si lo hay
		if ($request->attributes->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContextInterface::AUTHENTICATION_ERROR);
        } else {
            $error = $session->get(SecurityContextInterface::AUTHENTICATION_ERROR);
            $session->remove(SecurityContextInterface::AUTHENTICATION_ERROR);
        }

		return array(
			// último nombre de usuario ingresado
			'last_username' => $session->get(SecurityContext::LAST_USERNAME),
			'error'			=> $error,
			'title'			=> "Acceso al sistema"
		);
    }

    /**
     * @Route("/login_check", name="login_check")
     * @Method("POST")
     */
    public function loginCheckAction()
    {
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction()
    {
    }

    /**
     * @Route("/viewer", name="pdf_viewer")
     * @Template()
     */
    public function viewerAction()
    {
        return array();
    }
    
    /**
     * @Route("/periodo", name="periodo", options={"expose"=true})
     */
    public function periodoAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('SIGBundle:Datosgenerales');
		$periodo = $repo->periodoRegistro();
		return new \Symfony\Component\HttpFoundation\Response(json_encode($periodo[0]), 200, array("Content-Type" => "application/json; charset=UTF-8"));
	}
}
