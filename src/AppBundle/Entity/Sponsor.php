<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use AdminBundle\Entity\BaseEntity;

/**
 * Sponsor
 *
 * @ORM\Table(name="sponsor")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SponsorRepository")
 */
class Sponsor extends BaseEntity
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
     * @var SponsorKind
     *
     * @ORM\ManyToOne(targetEntity="SponsorKind")
     * @ORM\JoinColumn(name="sponsor_kind_id", referencedColumnName="id", nullable=false)
     * @Assert\NotBlank()
     */
    private $sponsorKind;

    /**
     * @var Document
     *
     * @ORM\OneToOne(targetEntity="Document", cascade={"persist"})
     * @ORM\JoinColumn(name="document_id", referencedColumnName="id", nullable=false)
     * @Assert\NotBlank()
     */
    private $logo;

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
     * @return Sponsor
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
     * Set logo
     *
     * @param \AppBundle\Entity\Document $logo
     *
     * @return Sponsor
     */
    public function setLogo(\AppBundle\Entity\Document $logo = null)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return \AppBundle\Entity\Document
     */
    public function getLogo()
    {
        return $this->logo;
    }

    public function __toString()
    {
        return $this->getName();
    }

    public static function getIndexColumns()
    {
        return ['id', 'name', ['property' => 'logo.name', 'name' => 'Logo'], ['property' => 'sponsorKind.name', 'name' => 'Sponsor kind']];
    }

    /**
     * Set sponsorKind
     *
     * @param \AppBundle\Entity\SponsorKind $sponsorKind
     *
     * @return SponsorKind
     */
    public function setSponsorKind(\AppBundle\Entity\SponsorKind $sponsorKind = null)
    {
        $this->sponsorKind = $sponsorKind;

        return $this;
    }

    /**
     * Get sponsorKind
     *
     * @return \AppBundle\Entity\SponsorKind
     */
    public function getSponsorKind()
    {
        return $this->sponsorKind;
    }
}
