<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use AdminBundle\Entity\BaseEntity;

/**
 * KingsRide
 *
 * @ORM\Table(name="kings_ride")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\KingsRideRepository")
 */
class KingsRide extends BaseEntity
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
     * @Assert\NotBlank()
     */
    private $year;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="start_date", type="date", nullable=true)
     * @Assert\NotBlank()
     */
    private $startDate;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="end_date", type="date", nullable=true)
     * @Assert\NotBlank()
     */
    private $endDate;

    /**
     * @var string
     *
     * @ORM\Column(name="introduction", type="string", length=255, nullable=true)
     * @Gedmo\Translatable()
     */
    private $introduction;

    /**
     * @var string
     *
     * @ORM\Column(name="saturday_program", type="text", nullable=true)
     * @Gedmo\Translatable()
     */
    private $saturdayProgram;

    /**
     * @var string
     *
     * @ORM\Column(name="sunday_program", type="text", nullable=true)
     * @Gedmo\Translatable()
     */
    private $sundayProgram;

    /**
     * @var King
     *
     * @ORM\OneToOne(targetEntity="King")
     */
    private $king;

    /**
     * @var Guest
     *
     * @ORM\ManyToOne(targetEntity="Guest")
     */
    private $guest;

    /**
     * @ORM\ManyToMany(targetEntity="Performer")
     * @ORM\OrderBy({"sortOrder"="ASC"})
     */
    private $performers;

    /**
     * @ORM\ManyToMany(targetEntity="Sponsor")
     * @ORM\OrderBy({"name"="ASC"})
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
     * Set startDate
     *
     * @param DateTime $startDate
     *
     * @return KingsRide
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }
    /**
     * Set endDate
     *
     * @param DateTime $endDate
     *
     * @return KingsRide
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
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

    public function __toString()
    {
        return 'The Kings\' Ride %year%';
    }

    public static function getIndexColumns()
    {
        return ['id', 'year', ['property' => 'startDate', 'dateTimeFormat' => 'd. MMMM'], ['property' => 'endDate', 'dateTimeFormat' => 'd. MMMM']];
    }

    /**
     * Set saturdayProgram
     *
     * @param string $saturdayProgram
     *
     * @return KingsRide
     */
    public function setSaturdayProgram($saturdayProgram)
    {
        $this->saturdayProgram = $saturdayProgram;

        return $this;
    }

    /**
     * Get saturdayProgram
     *
     * @return string
     */
    public function getSaturdayProgram()
    {
        return $this->saturdayProgram;
    }

    /**
     * Set sundayProgram
     *
     * @param string $sundayProgram
     *
     * @return KingsRide
     */
    public function setSundayProgram($sundayProgram)
    {
        $this->sundayProgram = $sundayProgram;

        return $this;
    }

    /**
     * Get sundayProgram
     *
     * @return string
     */
    public function getSundayProgram()
    {
        return $this->sundayProgram;
    }

    public function getHasTranslatableToString()
    {
        return true;
    }

    /**
     * Set guest
     *
     * @param \AppBundle\Entity\Guest $guest
     *
     * @return KingsRide
     */
    public function setGuest(\AppBundle\Entity\Guest $guest = null)
    {
        $this->guest = $guest;

        return $this;
    }

    /**
     * Get guest
     *
     * @return \AppBundle\Entity\Guest
     */
    public function getGuest()
    {
        return $this->guest;
    }

    /**
     * Add performer
     *
     * @param \AppBundle\Entity\Performer $performer
     *
     * @return KingsRide
     */
    public function addPerformer(\AppBundle\Entity\Performer $performer)
    {
        $this->performers[] = $performer;

        return $this;
    }

    /**
     * Remove performer
     *
     * @param \AppBundle\Entity\Performer $performer
     */
    public function removePerformer(\AppBundle\Entity\Performer $performer)
    {
        $this->performers->removeElement($performer);
    }

    /**
     * Get performers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPerformers()
    {
        return $this->performers;
    }
}
