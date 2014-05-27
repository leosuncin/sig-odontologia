<?php

namespace UES\FO\SIGBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\Util\StringUtils;
use Symfony\Component\Validator\Constraints as Assert;
use UES\FO\SIGBundle\Entity\Usuario;
use UES\FO\SIGBundle\Form\UsuarioType;
use UES\FO\SIGBundle\Form\UsuarioEditType;
use UES\FO\SIGBundle\Form\UsuarioEdit2Type;

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
            throw new AccessDeniedException();
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
            throw new AccessDeniedException();
        }
        $entity = new Usuario();
        $form   = $this->createForm(
            new UsuarioType(),
            $entity,
            array(
                'action' => $this->generateUrl('usuario_create'),
                'method' => 'POST',
                'attr' => array('col_size' => 'xs')
            ));

        $form->handleRequest($request);

        if ($form->isValid()) {
            $factory  = $this->get('security.encoder_factory');
            $encoder  = $factory->getEncoder($entity);
            $password = $encoder->encodePassword($entity->getPassword(), $entity->getSalt());
            $entity->setPassword($password);
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
            throw new AccessDeniedException();
        }
        $entity = new Usuario();
        $form   = $this->createForm(
            new UsuarioType(),
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
            throw new AccessDeniedException();
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
            throw new AccessDeniedException();
        }
        
        if($this->get('security.context')->isGranted('ROLE_OPERATIVE')) {
            $editForm = $this->createForm(
                new UsuarioEditType(),
                $entity,
                array(
                    'action' => $this->generateUrl('usuario_update', array('username' => $entity->getUsername())),
                    'method' => 'PUT',
                    'attr' => array('col_size' => 'xs')
                ));
        } else {
            $editForm = $this->createForm(
                new UsuarioEdit2Type(),
                $entity,
                array(
                    'action' => $this->generateUrl('usuario_update', array('username' => $entity->getUsername())),
                    'method' => 'PUT',
                    'attr' => array('col_size' => 'xs')
                ));
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
            throw new AccessDeniedException();
        }
        $em = $this->getDoctrine()->getManager();

        if($this->get('security.context')->isGranted('ROLE_OPERATIVE')) {
            $editForm = $this->createForm(
                new UsuarioEditType(),
                $entity,
                array(
                    'action' => $this->generateUrl('usuario_update', array('username' => $entity->getUsername())),
                    'method' => 'PUT',
                    'attr' => array('col_size' => 'xs')
                ));
            if(!StringUtils::equals($this->getUser()->getUsername(), $entity->getUsername())) {
                $editForm->get('actions')
                    ->add('eliminar', 'button', array(
                        'attr' => array(
                            'data-toggle' => 'modal',
                            'data-target' => '#modal-confirm-del'
                    )));
            }
        } else {
            $editForm = $this->createForm(
                new UsuarioEdit2Type(),
                $entity,
                array(
                    'action' => $this->generateUrl('usuario_update', array('username' => $entity->getUsername())),
                    'method' => 'PUT',
                    'attr' => array('col_size' => 'xs')
                ));
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
            throw new AccessDeniedException();
        }

        $result = array(
            'status' => 'success', // posibles valores: success, warning
            'message' => 'Se elimino exitosamente al usuario <i>'.$entity->getUsername().'</i>'
        );

        if($this->getUser()->getUsername() == $entity->getUsername()) {
            $result['status'] = 'warning';
            $result['message'] = 'El usuario <i>'.$entity->getUsername().'</i> no puede eliminarse asi mismo';
            return new Response(json_encode($result), 400, array("Content-Type" => "application/json; charset=UTF-8"));
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($entity);
        $em->flush();

        if ($this->getRequest()->isXmlHttpRequest()) {
            $result['url'] = $this->generateUrl('usuario_index');
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
            throw new AccessDeniedException();
        }

        $form = $this->createPwdForm($entity->getUsername(), $this->getRequest()->isXmlHttpRequest());

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
            throw new AccessDeniedException();
        }
        $result = array(
            'status' => 'danger', // posibles valores: success, warning
            'message' => 'La información enviada tiene errores'
        );
        $flash = $this->get('braincrafted_bootstrap.flash');
        $ajax = $request->isXmlHttpRequest();
        $form = $this->createPwdForm($entity->getUsername(), $ajax);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $data = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $factory  = $this->get('security.encoder_factory');
            $encoder  = $factory->getEncoder($entity);
            $pwd_enc = $encoder->encodePassword($data['old_password'], $entity->getSalt());
            if(StringUtils::equals($entity->getPassword(), $pwd_enc)) {
                $pwd_new_enc = $encoder->encodePassword($data['new_password'], $entity->getSalt());
                if(StringUtils::equals($entity->getPassword(), $pwd_new_enc)) {
                    if ($ajax) {
                        $result['status'] = 'warning';
                        $result['message'] = 'La nueva contraseña debe ser diferente de la anterior';
                    } else {
                        $flash->alert('La nueva contraseña debe ser diferente de la anterior');
                    }
                } else {
                    $entity->setPassword($pwd_new_enc);
                    $em->flush();
                    if ($ajax) {
                        $result['status'] = 'success';
                        $result['message'] = 'Se cambio exitosamente la contraseña del usuario <i>'.$entity->getUsername().'</i>';
                        return new Response(json_encode($result), 200, array("Content-Type" => "application/json; charset=UTF-8"));
                    } else {
                        $flash->success('Se cambio exitosamente la contraseña del usuario: '.$entity->getUsername());
                        return $this->redirect($this->generateUrl('usuario_show', array('username' => $entity->getUsername())));
                    }
                }
            } else if($ajax) {
                $result['status'] = 'warning';
                $result['message'] = 'La contraseña actual no es correcta';
            } else {
                $flash->alert('La contraseña actual no es correcta');
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
     * Crear un formulario para cambiar la contraseña del usuario
     *
     * @param boolean $ajax Si el formulario sera enviado por XHR
     */
    private function createPwdForm($username, $ajax = false)
    {
        $constraints = array(
            new Assert\NotBlank(array(
                'message' => 'El campo no puede quedar vacio'
            )),
            new Assert\Length(array(
                'min' => 8,
                'max' => 16,
                'minMessage' => 'La contraseña del usuario por lo menos debe tener {{ limit }} caracteres de largo',
                'maxMessage' => 'La contraseña del usuario no puede tener más de {{ limit }} caracteres de largo'
            )),
            new Assert\Regex(array('pattern' => '/(^(?=.*[a-z])(?=.*[A-Z])(?=.*\d){8,16}.+$)/',
                'message' => 'La contraseña debe contener por lo menos una letra en mayúscula, una letra en minúscula y un numero cualquiera para ser segura'
            )));

        $formBuilder = $this->createFormBuilder()
            ->add('old_password', 'password', array(
                'label'       => 'Contraseña actual',
                'max_length'  => 16,
                'attr'        => array('placeholder' => 'Escriba su contraseña actual'),
                'constraints' => $constraints
                ))
            ->add('new_password', 'repeated', array(
                'type'            => 'password',
                'invalid_message' => 'Debe repetir la nueva contraseña para confirmar',
                'max_length'      => 16,
                'required'        => true,
                'first_options'   => array(
                    'label' => 'Nueva contraseña',
                    'attr'  => array('placeholder' => 'Escriba su nueva contraseña')),
                'second_options'  => array(
                    'label' => 'Confirmar nueva contraseña',
                    'attr'  => array('placeholder' => 'Repita su nueva contraseña')),
                'constraints'     => $constraints
                ));

            if(!$ajax) {
                $formBuilder->add('actions', 'form_actions');
                $formBuilder->get('actions')
                    ->add('cambiar', 'submit')
                    ->add('limpiar', 'reset');
            }

            $formBuilder
                ->setAction($this->generateUrl('usuario_pwd_update', array('username' => $username)))
                ->setMethod('PUT');

        return $formBuilder->getForm();
    }
}
