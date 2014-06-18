<?php

namespace UES\FO\SIGBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UsuarioType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombres', 'text', array(
                'max_length' => 50
                ))
            ->add('apellidos', 'text', array(
                'max_length' => 50
                ))
            ->add('username', 'text', array(
                'label'      => 'Nombre de usuario',
                'max_length' => 16,
                'attr'       => array(
                    'help_text' => 'Escriba el nombre del usuario sin espacios'
                )))
            ->add('password', 'password', array(
                'label'      => 'Contraseña del usuario',
                'max_length' => 16,
                'attr'       => array(
                    'placeholder' => 'Escriba una contraseña segura',
                    'help_text'   => 'Utilice mayúsculas, minúsculas, números y otros caracteres intercalados'
                )))
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
            ->add('actions', 'form_actions');
        $builder->get('actions')
            ->add('crear', 'submit')
            ->add('limpiar', 'reset');
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'UES\FO\SIGBundle\Entity\Usuario'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'usuario_new';
    }
}
