<?php

namespace UES\FO\SIGBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
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
            throw $this->createAccessDeniedException();
        }
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SIGBundle:Usuario')->findAll();

        $this->get('bitacora')->actividad('Acceso a la consulta de usuarios');

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
            throw $this->createAccessDeniedException();
        }
        $entity = new Usuario($this->get('security.encoder_factory'));
        $form   = $this->createCreateForm($entity);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('usuario_show', array('username' => $entity->getUsername())));
        }
        $this->get('bitacora')->actividad('Se ingreso un nuevo usuario «'.$entity->getUsername().'»');
        return array(
            'title'  => 'Ingresar usuario',
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
            throw $this->createAccessDeniedException();
        }

        $form = $this->createCreateForm(new Usuario());

        return array(
            'title'  => 'Ingresar usuario',
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
        if($this->getUser()->getUsername() != $entity->getUsername() && !$this->get('security.context')->isGranted('ROLE_OPERATIVE')) {
            throw $this->createAccessDeniedException();
        }
        $this->get('bitacora')->actividad('Consulto la información del usuario «'.$entity->getUsername().'»');
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
        if($this->getUser()->getUsername() != $entity->getUsername() && !$this->get('security.context')->isGranted('ROLE_OPERATIVE')) {
            throw $this->createAccessDeniedException();
        }

        $editForm = $this->createEditForm($entity);

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
        if($this->getUser()->getUsername() != $entity->getUsername() && !$this->get('security.context')->isGranted('ROLE_OPERATIVE')) {
            throw $this->createAccessDeniedException();
        }

        $editForm = $this->createEditForm($entity);

        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->get('bitacora')->actividad('Modifico la información del usuario «'.$entity->getUsername().'»');
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
            throw $this->createAccessDeniedException();
        }

        if($this->getUser()->getUsername() == $entity->getUsername()) {
            $result['message'] = 'El usuario <i>'.$entity->getUsername().'</i> no puede eliminarse asi mismo';
            return new Response(json_encode($result), 400, array("Content-Type" => "application/json; charset=UTF-8"));
        }

        $this->get('bitacora')->actividad('Se elimino el usuario «'.$entity->getUsername().'»');
        $em = $this->getDoctrine()->getManager();
        $em->remove($entity);
        $em->flush();

        if ($this->getRequest()->isXmlHttpRequest()) {
            $result = array(
                'message' => 'Se elimino exitosamente al usuario <i>'.$entity->getUsername().'</i>',
                'url'     => $this->generateUrl('usuario_index')
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
        if($this->getUser()->getUsername() != $entity->getUsername() && !$this->get('security.context')->isGranted('ROLE_OPERATIVE')) {
            throw $this->createAccessDeniedException();
        }

        $form = $this->createPwdForm(new PasswordUpdate(), $entity->getUsername());

        if ($this->getRequest()->isXmlHttpRequest()) {
            return $this->render(
                'SIGBundle:Usuario:pwdAjax.html.twig',
                array(
                    'entity'   => $entity,
                    'pwd_form' => $form->createView()
            ));
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
        if($this->getUser()->getUsername() != $entity->getUsername() && !$this->get('security.context')->isGranted('ROLE_OPERATIVE')) {
            throw $this->createAccessDeniedException();
        }

        $ajax  = $request->isXmlHttpRequest();
        $model = new PasswordUpdate($entity, $this->get('security.encoder_factory'));
        $form  = $this->createPwdForm($model, $entity->getUsername());

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->setPassword($model->getNewPassword(), $this->get('security.encoder_factory'));
            $em->flush();

            $this->get('bitacora')->actividad('Se cambio la contraseña del usuario «'.$entity->getUsername().'»');
            if ($ajax) {
                $result['message'] = 'Se cambio exitosamente la contraseña del usuario <i>'.$entity->getUsername().'</i>';
                return new Response(json_encode($result), 200, array("Content-Type" => "application/json; charset=UTF-8"));
            } else {
                $flash = $this->get('braincrafted_bootstrap.flash');
                $flash->success('Se cambio exitosamente la contraseña del usuario: '.$entity->getUsername());
                return $this->redirect($this->generateUrl('usuario_show', array('username' => $entity->getUsername())));
            }
        }

        if ($ajax) {
            $result = array(
                'message' => 'La información enviada tiene errores',
                'view'    => $this->renderView(
                    'SIGBundle:Usuario:pwdAjax.html.twig',
                    array('pwd_form' => $form->createView()
                ))
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
     * @Route("/{username}/pwd/recover", name="usuario_recover_pwd", options={"expose"=true})
     * @Method("GET")
     * @Template()
     */
    public function recoverPwdAction(Usuario $entity)
    {
        //die(var_dump(!$entity->isRecover() && !$this->get('security.context')->isGranted('ROLE_OPERATIVE')));
        if (!$entity->isRecover()) {
            throw $this->createNotFoundException();
        }
        if(!$this->get('security.context')->isGranted('ROLE_OPERATIVE')) {
            throw $this->createAccessDeniedException();
        }
        $form  = $this->createRecoverForm($entity);
        $param = array(
            'title'    => 'Restablecer contraseña',
            'username' => $entity->getUsername(),
            'form'     => $form->createView()
        );
        if($this->getRequest()->isXmlHttpRequest())
            return $this->render('SIGBundle:Usuario:recoverPwdAjax.html.twig', $param);
        else
            return $param;
    }

    /**
     * @Route("/{username}/pwd/restore", name="usuario_restore_pwd", options={"expose"=true})
     * @Method("POST")
     * @Template("SIGBundle:Usuario:recoverPwd.html.twig")
     */
    public function restorePwdAction(Request $request, Usuario $entity)
    {
        if (!$entity->isRecover()) {
            throw $this->createNotFoundException();
        }
        if(!$this->get('security.context')->isGranted('ROLE_OPERATIVE')) {
            throw $this->createAccessDeniedException();
        }

        $form = $this->createRecoverForm($entity);
        $ajax = $request->isXmlHttpRequest();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $data = $form->getData();
            $entity->setPassword($data['password'], $this->get('security.encoder_factory'));
            $entity->setRecover(false);
            $this->getDoctrine()->getManager()->flush();
            $this->get('bitacora')->actividad('Se forzo el cambio de contraseña del usuario «'.$entity->getUsername().'»');
            if ($ajax) {
                $result['message'] = 'Se establecio exitosamente la contraseña del usuario <i>'.$entity->getUsername().'</i>';
                return new Response(json_encode($result), 200, array("Content-Type" => "application/json; charset=UTF-8"));
            } else {
                $flash = $this->get('braincrafted_bootstrap.flash');
                $flash->success('Se establecio exitosamente la contraseña del usuario: '.$entity->getUsername());
                return $this->redirect($this->generateUrl('usuario_index'));
            }
        }

        if ($ajax) {
            $result = array(
                'message' => 'La información enviada tiene errores',
                'view'    => $this->renderView(
                    'SIGBundle:Usuario:recoverPwdAjax.html.twig',
                    array(
                    'title'    => 'Restablecer contraseña',
                    'username' => $entity->getUsername(),
                    'form'     => $form->createView()
                ))
            );
            return new Response(json_encode($result), 400, array("Content-Type" => "application/json; charset=UTF-8"));
        }
        return array(
            'title'    => 'Restablecer contraseña',
            'username' => $entity->getUsername(),
            'form'     => $form->createView()
        );
    }

    private function createCreateForm(Usuario $entity)
    {
        return $this->createForm(
            'usuario_new',
            $entity,
            array(
                'action' => $this->generateUrl('usuario_create'),
                'method' => 'POST'
            ));
    }

    private function createEditForm(Usuario $entity)
    {
        $granted = $this->get('security.context')->isGranted('ROLE_OPERATIVE');

        $form = $this->createForm(
            $granted ? 'usuario_edit' : 'usuario_edit_simple',
            $entity,
            array(
                'action' => $this->generateUrl('usuario_update', array('username' => $entity->getUsername())),
                'method' => 'PUT'
            ));
        if($granted && $this->getUser()->getUsername() != $entity->getUsername())
            $form->get('actions')
                ->add('eliminar', 'button', array(
                    'attr' => array(
                        'data-toggle' => 'modal',
                        'data-target' => '#modal-confirm-del'
                )));
        return $form;
    }

    private function createPwdForm(PasswordUpdate $model, $username)
    {
        $ajax = $this->getRequest()->isXmlHttpRequest();

        $form = $this->createForm(
            'usuario_pwd',
            $model,
            array(
                'action' => $this->generateUrl('usuario_pwd_update', array('username' => $username)),
                'method' => 'PUT'
        ));

        if(!$ajax)
            $form->add('actions', 'form_actions')
                ->get('actions')
                    ->add('cambiar', 'submit')
                    ->add('limpiar', 'reset');
        return $form;
    }

    private function createRecoverForm(Usuario $entity = null)
    {
        $form = $this->createFormBuilder()
            ->add('password', 'repeated', array(
                'type'            => 'password',
                'max_length'      => 16,
                'required'        => true,
                'invalid_message' => 'Debe repetir la nueva contraseña para confirmar',
                'first_options'   => array(
                    'label' => 'Contraseña',
                    'attr'  => array(
                        'placeholder' => 'Escriba la nueva contraseña',
                        'help_text'   => 'Utilice mayúsculas, minúsculas, números y otros caracteres intercalados'
                )),
                'second_options'  => array(
                    'label' => 'Confirmar contraseña',
                    'attr'  => array(
                        'placeholder' => 'Repita la nueva contraseña',
                        'help_text'   => 'Utilice mayúsculas, minúsculas, números y otros caracteres intercalados. Debe ser igual que la primera'
                )),
                'constraints'     => array(
                    new \Symfony\Component\Validator\Constraints\Length(array(
                        'min'        => "8",
                        'max'        => "16",
                        'minMessage' => "La contraseña por lo menos debe tener {{ limit }} caracteres de largo",
                        'maxMessage' => "La contraseña no puede tener más de {{ limit }} caracteres de largo"
                )))
            ))
            ->add('captcha', 'captcha', array(
                'width'           => 250,
                'height'          => 70,
                'length'          => 6,
                'invalid_message' => 'Texto incorrecto',
                'attr'            => array(
                    'help_text' => 'Escriba el texto que aparece en la imagen'
                )
            ));
        if (!$this->getRequest()->isXmlHttpRequest()) {
            $form->add('actions', 'form_actions')
                ->get('actions')
                    ->add('cambiar', 'submit');
        }
        $form
            ->setAction($this->generateUrl('usuario_restore_pwd', array('username' => $entity->getUsername())))
            ->setMethod('POST');
        return $form->getForm();
    }
}
