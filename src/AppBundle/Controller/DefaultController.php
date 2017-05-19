<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\KingsRide;

class DefaultController extends Controller
{
    protected const CURRENT_YEAR = 2017;

    /**
     * @Route("/{year}", name="homepage", requirements={"year"="\d+"})
     * @Route("/the-kings-ride-{year}", name="kings_ride", requirements={"year"="\d+"})
     */
    public function indexAction(Request $request, KingsRide $kingsRide)
    {
        return $this->render('default/index.html.twig', ['kingsRide' => $kingsRide]);
    }

    /**
     * @Route("/program-of-the-kings-ride-{year}", name="program")
     */
    public function programAction(Request $request, KingsRide $kingsRide)
    {
        return $this->render('default/program.html.twig', ['kingsRide' => $kingsRide]);
    }

    /**
     * @Route("/guest-of-the-kings-ride-{year}", name="guest")
     */
    public function guestAction(Request $request, KingsRide $kingsRide)
    {
        return $this->render('default/guest.html.twig', ['kingsRide' => $kingsRide]);
    }

    /**
     * @Route("/performers-of-the-kings-ride-{year}", name="performers")
     */
    public function performersAction(Request $request, KingsRide $kingsRide)
    {
        $performers = $kingsRide->getPerformers();

        usort($performers, function ($a, $b) {
            if ($a->getPosition() > $b->getPosition()) {
                return 1;
            } else if ($a->getPosition() < $b->getPosition()) {
                return -1;
            } else {
                return 0;
            }
        });

        return $this->render('default/performers.html.twig', ['kingsRide' => $kingsRide, 'performers' => $performers]);
    }

    /**
     * @Route("/sponsors-of-the-kings-ride-{year}", name="sponsors")
     */
    public function sponsorsAction(Request $request, KingsRide $kingsRide)
    {
        $sponsors = [];

        foreach($kingsRide->getSponsors() as $sponsor)
        {
            $sponsors[$sponsor->getSponsorKind()->getName()][] = $sponsor;
        }

        return $this->render('default/sponsors.html.twig', ['kingsRide' => $kingsRide, 'sponsors' => $sponsors]);
    }

    /**
     * @Route("/history-of-the-kings-ride", name="history")
     */
    public function historyAction(Request $request)
    {
        return $this->render('default/history.html.twig');
    }

    /**
     * @Route("/organizer-of-the-kings-ride", name="organizer")
     */
    public function organizerAction(Request $request)
    {
        return $this->render('default/organizer.html.twig');
    }

    /**
     * @Route("/search", name="search")
     * @Method("GET")
     */
    public function searchAction(Request $request)
    {
        return $this->render('default/search.html.twig');
    }

    /**
     * @Route("/downloads", name="downloads")
     */
    public function downloadsAction(Request $request)
    {
        return $this->render('default/downloads.html.twig');
    }

}
