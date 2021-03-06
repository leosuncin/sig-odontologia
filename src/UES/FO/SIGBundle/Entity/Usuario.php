<?php

namespace UES\FO\SIGBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario", uniqueConstraints={@ORM\UniqueConstraint(name="username", columns={"username"})})
 * @ORM\Entity
 * @UniqueEntity(fields = "username", message = "El nombre de usuario ya esta registrado")
 */
class Usuario implements AdvancedUserInterface, \Serializable
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idusuario", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idusuario;

    /**
     * @var string
     *
     * @Assert\Length(
     *      min = "3",
     *      max = "50",
     *      minMessage = "Los nombres por lo menos debe tener {{ limit }} caracteres de largo",
     *      maxMessage = "Los nombres no puede tener más de {{ limit }} caracteres de largo"
     * )
     *
     * @ORM\Column(name="nombres", type="string", length=50, nullable=false)
     */
    private $nombres;

    /**
     * @var string
     *
     * @Assert\Length(
     *      min = "3",
     *      max = "50",
     *      minMessage = "Los apellidos por lo menos debe tener {{ limit }} caracteres de largo",
     *      maxMessage = "Los apellidos no puede tener más de {{ limit }} caracteres de largo"
     * )
     *
     * @ORM\Column(name="apellidos", type="string", length=50, nullable=false)
     */
    private $apellidos;

    /**
     * @var string
     *
     * @Assert\Length(
     *     min = "8",
     *     max = "16",
     *     minMessage = "El nombre de usuario por lo menos debe tener {{ limit }} caracteres de largo",
     *     maxMessage = "El nombre de usuario no puede tener más de {{ limit }} caracteres de largo"
     * )
     * @Assert\Regex(
     *     pattern="/^[A-Za-z0-9_-]{8,16}$/",
     *     message="El nombre de usuario solo puede ser una combinación letras mayúscula y minúsculas, números, _, - sin espacios en blanco"
     * )
     *
     * @ORM\Column(name="username", type="string", length=16, unique=true, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=255, nullable=false)
     */
    private $salt;

    /**
     * @var integer
     *
     * @ORM\Column(name="nivel", type="integer", nullable=false)
     */
    private $nivel;

    /**
     * @var boolean
     *
     * @ORM\Column(name="enabled", type="boolean", nullable=false)
     */
    private $enabled = true;

    /**
     * @var boolean
     *
     * @ORM\Column(name="locked", type="boolean", nullable=false)
     */
    private $locked = false;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="array", nullable=false)
     */
    private $role = array();

    /**
     * @var boolean
     *
     * @ORM\Column(name="recover", type="boolean", nullable=true)
     */
    private $recover = false;

    /**
     * Codificador de la contraseña
     *
     * @var \Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface
     */
    private $encoder;

    public function __construct(\Symfony\Component\Security\Core\Encoder\EncoderFactory $factory = null) {
        $this->salt = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
        if($factory !== null)
            $this->encoder = $factory->getEncoder($this);
    }

    /**
     * Get idusuario
     *
     * @return integer
     */
    public function getIdusuario()
    {
        return $this->idusuario;
    }

    /**
     * Set nombres
     *
     * @param string $nombres
     * @return Usuario
     */
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;

        return $this;
    }

    /**
     * Get nombres
     *
     * @return string
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     * @return Usuario
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Obetener el nombre completo del usuario
     * @return string
     */
    public function getNombreCompleto()
    {
        return $this->nombres." ".$this->apellidos;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return Usuario
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Usuario
     */
    public function setPassword($password, \Symfony\Component\Security\Core\Encoder\EncoderFactory $factory = null)
    {
        if($factory !== null && $this->encoder === null)
            $this->encoder = $factory->getEncoder($this);
        if($this->encoder === null)
            $this->password = $password;
        else {
            $this->password = $this->encoder->encodePassword($password, $this->salt);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return Usuario
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set nivel
     *
     * @param integer $nivel
     * @return Usuario
     */
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;

        switch ($nivel) {
            case 1:
                $this->setRole(['ROLE_OPERATIVE']);
                break;
            case 2:
                $this->setRole(['ROLE_TACTIC']);
                break;
            case 3:
                $this->setRole(['ROLE_STRATEGIC']);
                break;
        }

        return $this;
    }

    /**
     * Get nivel
     *
     * @return integer
     */
    public function getNivel()
    {
        return $this->nivel;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return Usuario
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set locked
     *
     * @param boolean $locked
     * @return Usuario
     */
    public function setLocked($locked)
    {
        $this->locked = $locked;

        return $this;
    }

    /**
     * Get locked
     *
     * @return boolean
     */
    public function getLocked()
    {
        return $this->locked;
    }

    /**
     * Set role
     *
     * @param array $role
     * @return Usuario
     */
    public function setRole($role = array())
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return array
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * {@inheritdoc}
     */
    public function addRole($role)
    {
        $role = strtoupper($role);
        if (!in_array($role, $this->role, true)) {
            array_push($this->role, $role);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getRoles()
    {
        return $this->role;
    }

    /**
     * Set recover
     *
     * @param boolean $recover
     */
    public function setRecover($recover = true)
    {
    	$this->recover = $recover;
    	return $this;
    }

    /**
     * Is recover
     *
     * @return boolean
     */
    public function isRecover()
    {
    	return $this->recover;
    }

    /**
     * {@inheritdoc}
     */
    public function eraseCredentials()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function isAccountNonExpired()
    {
        return $this->enabled;
    }

    /**
     * {@inheritdoc}
     */
    public function isAccountNonLocked()
    {
        return !$this->locked;
    }

    /**
     * {@inheritdoc}
     */
    public function isCredentialsNonExpired()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize(array(
            $this->idusuario
        ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->idusuario
        ) = unserialize($serialized);
    }

    public function __toString()
    {
        return $this->nombres.' '.$this->apellidos;
    }
}
