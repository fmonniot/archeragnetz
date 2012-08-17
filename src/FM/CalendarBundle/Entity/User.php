<?php
// src/FM/UserBundle/Entity/User.php
namespace FM\CalendarBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="fmuser_user")
 */
class User extends BaseUser
{
    /**
     *
     * @var integer $id
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

     /**
      * Surname
      *
      * @var string $surname
      * @ORM\Column(name="surname", type="string", length=70, nullable=true)
      *
      * @Assert\NotBlank(message="Merci de renseigner votre nom", groups={"Registration", "Profile"})
      * @Assert\MinLength(limit="3", message="Votre nom doit être d'au moins 2 caractères.", groups={"Registration", "Profile"})
      * @Assert\MaxLength(limit="50", message="Votre nom ne peut faire plus de 50 caractères de long.", groups={"Registration", "Profile"})
      **/
     private $surname;

     /**
      * First name
      *
      * @var string $firstname
      * @ORM\Column(name="firstname", type="string", length=50, nullable=true)
      *
      * @Assert\NotBlank(message="Merci de renseigner votre prénom", groups={"Registration", "Profile"})
      * @Assert\MinLength(limit="3", message="Votre prénom doit être d'au moins 2 caractères.", groups={"Registration", "Profile"})
      * @Assert\MaxLength(limit="50", message="Votre prénom ne peut faire plus de 50 caractères de long", groups={"Registration", "Profile"})
      **/
     private $firstname;

    /**
     * Mobile Number (format +xxxxxxxxxxx)
     *
     * @var string $mobile
     * @ORM\Column(name="mobile_number", type="string", length=12, nullable=true)
     * @Assert\Regex(
     *     pattern="/^(\+[0-9]{2}|0)[1-7]{1}(([0-9]{2}){4})|((\s[0-9]{2}){4})|((-[0-9]{2}){4})$/",
     *     match=true,
     *     message="Le numéro de téléphone renseigné n'est pas valide."
     *     )
     */
     private $mobile;

     /**
      * Address
      *
      * @var ArrayCollection $address
     * @ORM\Column(name="address", type="string", nullable=true)
      */
     private $address;

    public function __construct()
    {
        parent::__construct();
        $this->address = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set surname
     *
     * @param  string $surname
     * @return User
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set firstname
     *
     * @param  string $firstname
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set mobile (storage in international version)
     *
     * @param  integer $mobile
     * @return User
     */
    public function setMobile($mobile)
    {

        $this->mobile = preg_replace('/^(\+[0-9]{2}|0)([1-7]{1}(([0-9]{2}){4})|((\s[0-9]{2}){4})|((-[0-9]{2}){4}))$/','+33$2', $mobile);

        return $this;
    }

    /**
     * Get mobile
     *
     * @return integer
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set address
     *
     * @param  string $address
     * @return User
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }
}
