<?php

namespace UES\FO\SIGBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class UsuarioPwdType extends AbstractType
{
    private $constraints = array(
        new Assert\NotBlank(),
        new Assert\Length(array('min' => 8,
            'max' => 16,
            'minMessage' => 'La contraseña del usuario por lo menos debe tener {{ limit }} caracteres de largo',
            'maxMessage' => 'La contraseña del usuario no puede tener más de {{ limit }} caracteres de largo')),
        new Assert\Regex(array('pattern' => '/(^(?=.*[a-z])(?=.*[A-Z])(?=.*\d){8,16}.+$)/',
            'message' => 'La contraseña debe contener por lo menos una letra en mayúscula, una letra en minúscula y un numero cualquiera para ser segura'
            )));
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('old_password', 'password',array(
                'label'       => 'Contraseña actual',
                'max_length'  => 16,
                'attr'        => array('placeholder' => 'Escriba su contraseña actual'),
                'constraints' => $constraints
                ))
            ->add('new_password', 'password', array(
                'type'          => 'password',
                'invalid_message' => 'Debe confirmar la nueva contraseña',
                'max_length'      => 16,
                'required'        => true,
                'first_options'   => array(
                    'label' => 'Nueva contraseña',
                    'attr'  => array('placeholder' => 'Escriba su nueva contraseña')),
                'second_options'  => array(
                    'label' => 'Confirmar nueva contraseña',
                    'attr'  => array('placeholder' => 'Repita su nueva contraseña')),
                'constraints'     => $constraints
                ))
            ->add('nivel', 'choice', array(
                'empty_value' => 'Asigne un nivel',
                'choices'     => array(
                    1 => 'Administrador del sistema',
                    2 => 'Táctico',
                    3 => 'Estratégico'
                )))
            ->add('enabled', 'checkbox', array(
                'label' => 'Habilitar el usuario',
                'attr' => array('align_with_widget' => true)
                ))
            ->add('locked', 'checkbox', array(
                'label' => 'Bloquear al usuario',
                'attr' => array('align_with_widget' => true)
                ))
            ->add('modificar', 'submit')
            ->add('limpiar', 'reset')
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'usuario';
    }
}
