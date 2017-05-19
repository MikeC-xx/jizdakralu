<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use AdminBundle\Entity\BaseEntity;

/**
 * Performer
 *
 * @ORM\Table(name="performer")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PerformerRepository")
 */
class Performer extends BaseEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @var Document
     *
     * @ORM\OneToOne(targetEntity="Document", cascade={"persist"})
     */
    private $photo;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="sort_order", type="integer")
     */
    private $sortOrder;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Performer
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Performer
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    public function __toString()
    {
        return $this->getName();
    }

    public static function getIndexColumns()
    {
        return ['id', 'name'];
    }

    /**
     * Set photo
     *
     * @param \AppBundle\Entity\Document $photo
     *
     * @return Performer
     */
    public function setPhoto(\AppBundle\Entity\Document $photo = null)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return \AppBundle\Entity\Document
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     *
     * @return Performer
     */
    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    /**
     * Get sortOrder
     *
     * @return integer
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }
}
