<?php

namespace UES\FO\SIGBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Security\Core\Util\StringUtils;
use UES\FO\SIGBundle\Entity\Usuario;
use UES\FO\SIGBundle\Model\PasswordUpdate;
/**
 * Usuario controller.
 *
 * @Route("/usuario")
 */
class UsuarioController extends Controller
{

    /**
     * Lists all Usuario entities.
     *
     * @Route("/", name="usuario_index")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        if(!$this->get('security.context')->isGranted('ROLE_OPERATIVE')) {
            $this->createAccessDeniedException();
        }
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SIGBundle:Usuario')->findAll();

        return array(
            'title'    => 'Consultar usuarios',
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Usuario entity.
     *
     * @Route("/", name="usuario_create")
     * @Method("POST")
     * @Template("SIGBundle:Usuario:new.html.twig")
     */
    public function createAction(Request $request)
    {
        if(!$this->get('security.context')->isGranted('ROLE_OPERATIVE')) {
            $this->createAccessDeniedException();
        }
        $entity = new Usuario($this->get('security.encoder_factory'));
        $form   = $this->createForm(
            'usuario_new',
            $entity,
            array(
                'action' => $this->generateUrl('usuario_create'),
                'method' => 'POST',
                'attr' => array('col_size' => 'xs')
            ));

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('usuario_show', array('username' => $entity->getUsername())));
        }

        return array(
            'title'  => 'Ingresar usuario',
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Usuario entity.
     *
     * @Route("/new", name="usuario_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        if(!$this->get('security.context')->isGranted('ROLE_OPERATIVE')) {
            $this->createAccessDeniedException();
        }
        $entity = new Usuario();
        $form   = $this->createForm(
            'usuario_new',
            $entity,
            array(
                'action' => $this->generateUrl('usuario_create'),
                'method' => 'POST',
                'attr' => array('col_size' => 'xs')
            ));

        return array(
            'title'  => 'Ingresar usuario',
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Usuario entity.
     *
     * @Route("/{username}", name="usuario_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction(Usuario $entity)
    {
        if(!StringUtils::equals($this->getUser()->getUsername(), $entity->getUsername()) && !$this->get('security.context')->isGranted('ROLE_OPERATIVE')) {
            $this->createAccessDeniedException();
        }
        return array(
            'title'  => 'Mostrar información del usuario',
            'entity' => $entity
        );
    }

    /**
     * Displays a form to edit an existing Usuario entity.
     *
     * @Route("/{username}/edit", name="usuario_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction(Usuario $entity)
    {
        if(!StringUtils::equals($this->getUser()->getUsername(), $entity->getUsername()) && !$this->get('security.context')->isGranted('ROLE_OPERATIVE')) {
            $this->createAccessDeniedException();
        }

        $editForm = $this->createForm(
            $this->get('security.context')->isGranted('ROLE_OPERATIVE') ? 'usuario_edit' : 'usuario_edit_simple',
            $entity,
            array(
                'action' => $this->generateUrl('usuario_update', array('username' => $entity->getUsername())),
                'method' => 'PUT',
                'attr' => array('col_size' => 'xs')
            ));
        if($this->get('security.context')->isGranted('ROLE_OPERATIVE') && !StringUtils::equals($this->getUser()->getUsername(), $entity->getUsername())) {
            $editForm->get('actions')
                ->add('eliminar', 'button', array(
                    'attr' => array(
                        'data-toggle' => 'modal',
                        'data-target' => '#modal-confirm-del'
                )));
        }

        return array(
            'title'     => 'Modificar información del usuario',
            'edit_form' => $editForm->createView()
        );
    }

    /**
     * Edits an existing Usuario entity.
     *
     * @Route("/{username}", name="usuario_update")
     * @Method("PUT")
     * @Template("SIGBundle:Usuario:edit.html.twig")
     */
    public function updateAction(Request $request, Usuario $entity)
    {
        if(!StringUtils::equals($this->getUser()->getUsername(), $entity->getUsername()) && !$this->get('security.context')->isGranted('ROLE_OPERATIVE')) {
            $this->createAccessDeniedException();
        }
        $em = $this->getDoctrine()->getManager();

        $editForm = $this->createForm(
            $this->get('security.context')->isGranted('ROLE_OPERATIVE') ? 'usuario_edit' : 'usuario_edit_simple',
            $entity,
            array(
                'action' => $this->generateUrl('usuario_update', array('username' => $entity->getUsername())),
                'method' => 'PUT',
                'attr' => array('col_size' => 'xs')
            ));
        if($this->get('security.context')->isGranted('ROLE_OPERATIVE') && !StringUtils::equals($this->getUser()->getUsername(), $entity->getUsername())) {
            $editForm->get('actions')
                ->add('eliminar', 'button', array(
                    'attr' => array(
                        'data-toggle' => 'modal',
                        'data-target' => '#modal-confirm-del'
                )));
        }

        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('usuario_show', array('username' => $entity->getUsername())));
        }

        return array(
            'title'     => 'Modificar información del usuario',
            'edit_form' => $editForm->createView()
        );
    }

    /**
     * Deletes a Usuario entity.
     *
     * @Route("/{username}", name="usuario_delete", options={"expose"=true})
     * @Method("DELETE")
     */
    public function deleteAction(Usuario $entity)
    {
        if(!$this->get('security.context')->isGranted('ROLE_OPERATIVE')) {
            $this->createAccessDeniedException();
        }

        if($this->getUser()->getUsername() == $entity->getUsername()) {
            $result['message'] = 'El usuario <i>'.$entity->getUsername().'</i> no puede eliminarse asi mismo';
            return new Response(json_encode($result), 400, array("Content-Type" => "application/json; charset=UTF-8"));
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($entity);
        $em->flush();

        if ($this->getRequest()->isXmlHttpRequest()) {
            $result = array(
                'message' => 'Se elimino exitosamente al usuario <i>'.$entity->getUsername().'</i>',
                'url' => $this->generateUrl('usuario_index')
            );
            return new Response(json_encode($result), 200, array("Content-Type" => "application/json; charset=UTF-8"));
        } else {
            return $this->redirect($this->generateUrl('usuario_index'));
        }
    }

    /**
     * @Route("/{username}/pwd", name="usuario_pwd", options={"expose"=true})
     * @Method("GET")
     * @Template()
     */
    public function pwdAction(Usuario $entity)
    {
        if(!StringUtils::equals($this->getUser()->getUsername(), $entity->getUsername()) && !$this->get('security.context')->isGranted('ROLE_OPERATIVE')) {
            $this->createAccessDeniedException();
        }

        $ajax = $this->getRequest()->isXmlHttpRequest();

        $form = $this->createForm(
            'usuario_pwd',
            new PasswordUpdate(),
            array(
                'action' => $this->generateUrl('usuario_pwd_update', array('username' => $entity->getUsername())),
                'method' => 'PUT',
                'attr' => array('col_size' => 'xs')
        ));
        if(!$ajax)
            $form->add('actions', 'form_actions')
                ->get('actions')
                    ->add('cambiar', 'submit')
                    ->add('limpiar', 'reset');

        if ($this->getRequest()->isXmlHttpRequest()) {
            return $this->render(
                'SIGBundle:Usuario:pwdAjax.html.twig',
                array(
                    'entity'   => $entity,
                    'pwd_form' => $form->createView()
                )
            );
        } else {
            return array(
                'title'    => 'Cambiar contraseña de acceso',
                'entity'   => $entity,
                'pwd_form' => $form->createView()
            );
        }
    }

    /**
     * Actualizar la contraseña del usuario.
     *
     * @Route("/{username}/pwd", name="usuario_pwd_update", options={"expose"=true})
     * @Method("PUT")
     * @Template("SIGBundle:Usuario:pwd.html.twig")
     */
    public function updatePwdAction(Request $request, Usuario $entity)
    {
        if(!StringUtils::equals($this->getUser()->getUsername(), $entity->getUsername()) && !$this->get('security.context')->isGranted('ROLE_OPERATIVE')) {
            $this->createAccessDeniedException();
        }
        $result = array(
            'message' => 'La información enviada tiene errores'
        );
        $flash = $this->get('braincrafted_bootstrap.flash');
        $ajax = $request->isXmlHttpRequest();
        $model = new PasswordUpdate($entity, $this->get('security.encoder_factory'));
        $form = $this->createForm(
            'usuario_pwd',
            $model,
            array(
                'action' => $this->generateUrl('usuario_pwd_update', array('username' => $entity->getUsername())),
                'method' => 'PUT',
                'attr' => array('col_size' => 'xs')
        ));
        if(!$ajax)
            $form->add('actions', 'form_actions')
                ->get('actions')
                    ->add('cambiar', 'submit')
                    ->add('limpiar', 'reset');
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->setPassword($model->getNewPassword());
            $em->flush();
            if ($ajax) {
                $result['message'] = 'Se cambio exitosamente la contraseña del usuario <i>'.$entity->getUsername().'</i>';
                return new Response(json_encode($result), 200, array("Content-Type" => "application/json; charset=UTF-8"));
            } else {
                $flash->success('Se cambio exitosamente la contraseña del usuario: '.$entity->getUsername());
                return $this->redirect($this->generateUrl('usuario_show', array('username' => $entity->getUsername())));
            }
        }

        if ($ajax) {
            $result['view'] = $this->renderView(
                'SIGBundle:Usuario:pwdAjax.html.twig',
                array('pwd_form' => $form->createView())
            );
            return new Response(json_encode($result), 400, array("Content-Type" => "application/json; charset=UTF-8"));
        } else {
            return array(
                'title'    => 'Cambiar contraseña de acceso',
                'entity'   => $entity,
                'pwd_form' => $form->createView()
            );
        }
    }

    /**
     * @Route("/recover", name="usuario_recover")
     * @Template()
     */
    public function recoverAction()
    {
        return array();
    }
}
