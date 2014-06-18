<?php

namespace UES\FO\SIGBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
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
            'error'         => $error,
            'title'         => "Acceso al sistema"
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

    /**
     * @Route("/recover", name="recover")
     * @Method("GET")
     * @Template()
     */
    public function recoverAction()
    {
        $form = $this->createRecoverForm();
        return array(
            'title'        => 'Recuperar contraseña',
            'form_recover' => $form->createView()
        );
    }

    /**
     * @Route("/recover", name="recover_check")
     * @Method("POST")
     * @Template("SIGBundle:Default:recover.html.twig")
     */
    public function recoverCheckAction(Request $request)
    {
        $form  = $this->createRecoverForm();
        $flash = $this->get('braincrafted_bootstrap.flash');

        $form->handleRequest($request);
        if($form->isValid()) {
            $data    = $form->getData();
            $em      = $this->getDoctrine()->getManager();
            $repo    = $em->getRepository('SIGBundle:Usuario');
            $usuario = $repo->findOneByUsername($data['username']);
            $usuario->setRecover(true);
            $em->flush();
            $flash->success('Se notificará al administrador del sistema, espere a que él cambie la contraseña');
        } else {
            $flash->error('La información enviada es incorrecta');
        }

        return array(
            'title'        => 'Recuperar contraseña',
            'form_recover' => $form->createView()
        );
    }

    private function createRecoverForm()
    {
        $form = $this->createForm(
            'recover_type',
            null,
            array(
                'action' => $this->generateUrl('recover_check'),
                'method' => 'POST'
        ));
        return $form;
    }
}
