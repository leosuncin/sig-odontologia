<?php

namespace UES\FO\SIGBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ExecutionContextInterface;
use Doctrine\ORM\EntityManager;

class RecoverType extends AbstractType
{
    private $em;
    
    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $repo = $this->em->getRepository('SIGBundle:Usuario');

        $callback = function ($object, ExecutionContextInterface $context) use ($repo) {
            $user = $repo->findByUsername($object);
            if(!$user)
                $context->addViolationAt(
                    'username',
                    'El nombre de usuario no existe',
                    array(),
                    null
                );
        };

        $builder
            ->add('username', 'text', array(
                'label'       => 'Nombre de usuario',
                'max_length'  => 16,
                'attr'        => array(
                    'help_text' => 'Escriba el nombre del usuario sin espacios'
                ),
                'constraints' => array(
                    new Assert\Length(array(
                        'min'        => 8,
                        'max'        => 16,
                        'minMessage' => 'El nombre de usuario por lo menos debe tener {{ limit }} caracteres de largo',
                        'maxMessage' => 'El nombre de usuario no puede tener más de {{ limit }} caracteres de largo'
                    )),
                    new Assert\Regex(array(
                        'pattern' => '/^[A-Za-z0-9_-]{8,16}$/',
                        'message' => 'El nombre de usuario solo puede ser una combinación letras mayúscula y minúsculas, números, _, - sin espacios en blanco'
                    )),
                    new Assert\Callback($callback)
            )))
            ->add('captcha', 'captcha', array(
                'width'           => 250,
                'height'          => 70,
                'length'          => 6,
                'invalid_message' => 'Texto incorrecto',
                'attr'            => array(
                    'help_text' => 'Escriba el texto que aparece en la imagen'
                )
            ))
            ->add('actions', 'form_actions');
        $builder->get('actions')
            ->add('recuperar', 'submit');
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'recover_type';
    }
}
