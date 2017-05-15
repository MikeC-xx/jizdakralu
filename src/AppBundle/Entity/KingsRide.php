<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * KingsRide
 *
 * @ORM\Table(name="kings_ride")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\KingsRideRepository")
 */
class KingsRide
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
     * @var int
     *
     * @ORM\Column(name="year", type="smallint", unique=true)
     */
    private $year;

    /**
     * @var string
     *
     * @ORM\Column(name="introduction", type="string", length=255)
     */
    private $introduction;

    /**
     * @var string
     *
     * @ORM\Column(name="program", type="text")
     */
    private $program;

    /**
     * @var King
     *
     * @ORM\OneToOne(targetEntity="King")
     */
    private $king;

    /**
     * @ORM\ManyToMany(targetEntity="Sponsor")
     */
    private $sponsors;

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
     * Set year
     *
     * @param integer $year
     *
     * @return KingsRide
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set introduction
     *
     * @param string $introduction
     *
     * @return KingsRide
     */
    public function setIntroduction($introduction)
    {
        $this->introduction = $introduction;

        return $this;
    }

    /**
     * Get introduction
     *
     * @return string
     */
    public function getIntroduction()
    {
        return $this->introduction;
    }

    public function getStartDate()
    {
        return $this->getEndDate()->modify('-1 day');
    }

    public function getEndDate()
    {
        return new \DateTime('first sunday of july ' . $this->getYear());
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sponsors = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set king
     *
     * @param \AppBundle\Entity\King $king
     *
     * @return KingsRide
     */
    public function setKing(\AppBundle\Entity\King $king = null)
    {
        $this->king = $king;

        return $this;
    }

    /**
     * Get king
     *
     * @return \AppBundle\Entity\King
     */
    public function getKing()
    {
        return $this->king;
    }

    /**
     * Add sponsor
     *
     * @param \AppBundle\Entity\Sponsor $sponsor
     *
     * @return KingsRide
     */
    public function addSponsor(\AppBundle\Entity\Sponsor $sponsor)
    {
        $this->sponsors[] = $sponsor;

        return $this;
    }

    /**
     * Remove sponsor
     *
     * @param \AppBundle\Entity\Sponsor $sponsor
     */
    public function removeSponsor(\AppBundle\Entity\Sponsor $sponsor)
    {
        $this->sponsors->removeElement($sponsor);
    }

    /**
     * Get sponsors
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSponsors()
    {
        return $this->sponsors;
    }
}
