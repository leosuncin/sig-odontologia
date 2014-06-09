<?php

namespace UES\FO\SIGBundle\Model;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\Encoder\EncoderFactory;
use Symfony\Component\Validator\ExecutionContextInterface;
use UES\FO\SIGBundle\Entity\Usuario;

class PasswordUpdate
{
	/**
	 * @var string Contraseña anterior
	 *
	 * @Assert\NotBlank(message = "El campo no puede quedar vacio")
	 * @Assert\Length(
	 * 			min = 8,
	 * 			max = 16,
	 *          minMessage = "La contraseña del usuario por lo menos debe tener {{ limit }} caracteres de largo",
	 *          maxMessage = "La contraseña del usuario no puede tener más de {{ limit }} caracteres de largo"
	 * )
	 * @Assert\Regex(
	 * 			pattern = "/(^(?=.*[a-z])(?=.*[A-Z])(?=.*\d){8,16}.+$)/",
	 *          message = "La contraseña debe contener por lo menos una letra en mayúscula, una letra en minúscula y un número cualquiera para ser segura"
	 * )
	 */
	protected $old_password;

	/**
	 * @var string Contraseña nueva
	 *
	 * @Assert\NotBlank(message = "El campo no puede quedar vacio")
	 * @Assert\Length(
	 * 			min = 8,
	 * 			max = 16,
	 *          minMessage = "La contraseña del usuario por lo menos debe tener {{ limit }} caracteres de largo",
	 *          maxMessage = "La contraseña del usuario no puede tener más de {{ limit }} caracteres de largo"
	 * )
	 * @Assert\Regex(
	 * 			pattern = "/(^(?=.*[a-z])(?=.*[A-Z])(?=.*\d){8,16}.+$)/",
	 *          message = "La contraseña debe contener por lo menos una letra en mayúscula, una letra en minúscula y un número cualquiera para ser segura"
	 * )
	 */
	protected $new_password;

	/**
	 * @var boolean Forzar el cambio de contraseña
	 */
	protected $recover;

	/**
	 * @var \UES\FO\SIGBundle\Entity\Usuario
	 */
	private $usuario;

	/**
	 * @var \Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface
	 */
	private $encoder;

	public function __construct(Usuario $usuario = null, EncoderFactory $factory = null) {
		$this->usuario = $usuario;
        if($factory !== null)
            $this->encoder = $factory->getEncoder($usuario);
	}

	public function setOldPassword($old_password) {
		$this->old_password = $old_password;
		return $this;
	}

	public function getOldPassword() {
		return $this->old_password;
	}

	public function setNewPassword($new_password) {
		$this->new_password = $new_password;
		return $this;
	}

	public function getNewPassword() {
		return $this->new_password;
	}

    /**
     * @Assert\Callback
     */
	public function validate(ExecutionContextInterface $context) {
		if (!$this->encoder->isPasswordValid($this->usuario->getPassword(), $this->new_password, $this->usuario->getSalt()))
			$context->addViolationAt(
				'old_password',
				'La contraseña actual no es correcta',
				array(),
				null
			);
		if ($this->new_password == $this->old_password)
			$context->addViolationAt(
				'new_password',
				'La nueva contraseña debe ser diferente de la anterior',
				array(),
				null
			);
	}
}
