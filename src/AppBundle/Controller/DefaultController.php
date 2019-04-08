<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\KingsRide;

class DefaultController extends Controller
{
    protected const CURRENT_YEAR = 2019;

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
        return $this->render('default/performers.html.twig', ['kingsRide' => $kingsRide]);
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

    /**
     * @Route("/photos", name="photos")
     */
    public function photosAction(Request $request)
    {
        $albums = array(
            array(
                'cover' => 'https://lh3.googleusercontent.com/VVRjk38juCChxxpDiRWWAdJjSnl0hkDq9lno7u6V2MYTbl2B-e2gJTy8AKqeFD5r2h5_csQRAsyUxQTu3wyJg9a2MjHI9yqyJTx3u_Zz2r64VZ5Q9TaajTTxrd-jHCxcyiuEu9C1GfiVipvaTrnmm80VZjfs6jievu6CN8zchdbdzPwJTYvUzQVzar7STMad5ZtgG2FFW2WARHAbfWyhFoXl0lPSUoooBqQtW5OEzst50lYYqNsXhGEp-Umbtn08GkF0nPOhrKfEmceYItsLfXVQm_MTiq3ChIm8jSHwdZMInXtzbtkoLIMjCMC2V2NSxZf10G040l2BPhfkDY-Jor-YhO5enxr_fsm-mnI0TKwaOCiDU4_ERUIm63lpTZWupCttC2cLqLjaqpFZsTgKAS2OxsCBZLwMoDPSIprqS0lbWHwmy7DxMrpyzAzNhjiFtbvfa0eyEbixIPzjES5wDO8IIvVeH4EgnL0JJ_KMQSBRnid0Q8uIdTBYSSy-kc7JdzmqgYfhQ8KT9QCoI10nrjW3itJq7ucOJZHw0bJ6Ci6l9W1zmPj6eRIAHHUw56va-pDskjBlMJVKqCBGI70LEdJVtcBzblJXuSM20VsQ1KLG7Hh6223o8blFLa4_lIuNJvhodGaLQ8T-zXWEZBk0-F_MdLuioqc0=w559-h419-no',
                'year' => 2004,
                'url' => 'https://photos.app.goo.gl/m1vj2pFKKpt0FgbT2'
            ),
            array(
                'cover' => 'https://lh3.googleusercontent.com/Qimm4RkpLVJxj_30dOv8twBO3iX_sQdK5XWfpVX7Tn5JjSBNxsI7KqSijCWRSRYM5ZzzrKwmdzRZnJ7UY4ashwePuYxG61_tuqvNRsrVVn7HCH5Bi4QLN-N1NYz3yRcyFeg70TNX0RFxueldirqXO8cyG7iZ7eXNWLngAProIDBn4G345w-TNXXtjmFglfEzjZ50MMdj7LXg2i4dDd_vlOT4DGpwTj0h1-kVAURS6whQ0Y8ojIpvoUFGHwcx5IlERNhfq8ZoB3pTy0wLoH8lpdoPDF4-CqXzPsmo_rmmIjcPhQAepMHQEYG4scDqtVbCJJbyr4J857O1O3J87Ywf3ThsxWaohwccmElTK5s9DEY3awOjMA_G_Qm8eEglUA6MG7Uf73P8Wn7NnDR7ifpMhIvfVXjWdDW9JBvFJ6zdjcOZTMESzXhLrkHiMqaeUX0_HDk2oAB5EjqiTE4Ti8LPJ4NQXBGSTGAKdv6wS9LkRaNcwSVRnl6EYzQewfOKilVWLWOT_eOEH9VJUzL8UPyIkzf_7gvvWu-dLh52rh8TVnNuFw-3OyzrizO-f5X1zsCZciyV9jJYkf0PUo7QAaCGHrYUIbaGm8cUA9S5XwssXVzvEHFt0oL_KbK-hXgh4dQ_Q5VGMepzRyNSR69VlBk7WQFNvuGd-ikt=w477-h358-no',
                'year' => 2005,
                'url' => 'https://photos.app.goo.gl/6dMNUzUSJ8d2dBHP2'
            ),
            array(
                'cover' => 'https://lh3.googleusercontent.com/I-9K3djS7CwvfltYRWFs77MpsFaCvY71njcXNb4K_k6xh0tc8gSzUZub4V8LkNEff8Uvt0fkSovhDf0h6s0BQPQMlizNfXjeilu7tjZNjoL2fSwka_02_7ZaZl4C4IKAoFtaXevOdNz20c_ztZ-n-1oJoBX7mmpn-2aFC7kj8t6uTRlKldO2K-pugRazvs0n__EprrtS1lnONgySXE02tODZCKoRGTrzaEEVmKKgxzRfc4z7Q0exAaWLG1imOkTObVFaqCCq57ZpWNkmZJXAMuhzfkBLwkUEDucprQ3OfKnApNaoVsgzY47muFhfQb5MrpX4rGUrNYnEml2O0WsVFxRbsk17tvPDFWSTiw3WQo0lbzAWHWqYP1BvYV5sooL2GdK5jx0ZnS99WzWfNHwZndjUTYXBJ79nrkLOEHN7NlyccZBd-IR0XxvflEF3o8O2KvEKEHPJRSbVAZPPE3mlvA55vvrAkro2j7mOyVEjMUbHcgvqbzk98Agk8wKN6m3t3u38ZZC1TKVgbcTAZseDYQq8X7SbXlngJt7E-DjEp1aBTj7WsPFG7_zOK1QIj5baiO9_cXQ0QB2TaPnCU4pOoqllq4qXbGlbi418IniDzCfamD_23_IpaWMHTf8Oh38Wx2loi0XJmWb602lyMFYE0EqwOHWj_Z7t=w477-h358-no',
                'year' => 2006,
                'url' => 'https://photos.app.goo.gl/yL5ACOsxQnd4iPIQ2'
            ),
            array(
                'cover' => 'https://lh3.googleusercontent.com/xD9aldvMVejopbXcNTkFWAhMJKDU0UI7JTatUtLJov6SznscovDuQg5BnEHOmxwOCM0G6OqndOkobfMtQekwpX0dhvCFnC_W6yr2_9FBXvuKIi2hT7BCofPgH847W0CU32JgQ3TxFkEMi6sDNXwVlY3hgBYiaxYuBGsgWd88ebNn2Zlc-yqHetO1ae36wlUa_j6KqveRGh8tLWgKc7KMpAUTPkUF1yL95DY363frc06v5_TbXnNQSUx0yWd3-HkZbP8h9DFa9SoYAkMCVzZuehuYgsKO9mdxPmfJmvgXr9gXQbynSEdl1vr1CkFdTfnxQpO7z87VqTwC2AQznTtCbSJAELXROMY4v9zTetjVUYEhOUE7mOdivNpOhMQixCUtS76VkztTJBSojAn7nNuh-k3kTIEhKd9TVRfaxxv47i4OKE9BX_5Y19JphyPWRIVy-h5WVl3zEJRHDdqbc2U_GrsQXQoTdH7C4-gEtSf89ZvP3ZlgYABo3pTVTgMFwGm6KQrQzMa0HxI_hhzDlhW4xwHJtybVJW3abQma-SWS1ByByk07vCWeW_OjpMbBXQwW4Jxzm7uJUJXFSyXg7vs42cpMQ84jG7wQvPn59nNoyRdZ08ntutKux5NXAnApnB1vPk0xzOIVa95WYQ8_9Fs2G0j4mmFQEAXl=w438-h328-no',
                'year' => 2008,
                'url' => 'https://photos.app.goo.gl/OZQDf2MSzcnXPGyD2'
            ),
            array(
                'cover' => 'https://lh3.googleusercontent.com/tg0z9geXyAeyfQD5oFnz-OJW2c1RMtEvtKL3DyWFXoh7kOBffz4_A4bJVgCu8maMKuuYtnKWM6hnQ6aoWt-Aw9bKdVcU-fw-WGYHARKlcdOMndDO-eHQh3r6Zm5aSF7LhRKC0irdnQio9ONsVKVC9XVC26L_MlgfAZp7CwfO2E_8koVMVnXlU2VaPdHmKxMsLhOWvLiz3PGsO14rJ1nLYmNqmKzLRcpk_qXqqTdEEPoKSnUsOqpT0I6XzAPtBv4sQ8K5nSOiB-MnxyXfyyPXyz7odsvN8QMpNUIIiGqaMc8lA0Qxn-JgBgupje0Ijrb_PXUJrMVRBpvQJ-6BTe7wpSMgb6up25qEan82k-VpB9BG5KbQQ6O5F1f_4tcoKud-youKntmcVJN2BGHfALcWVC_fiEkS8xgxE5sWdg6sXWOQe9yPOh160Gsl6uN6vO-3sJlLI_MutPIwpOsQeSlCfy4OFg5mTFyUlxTYT2HIK2ORL77koRCdACOPiit7TZX0IQ_FrbysdaqPZikSj2fWnRskvtOjUdxim5UbQ3TFN4cSg3bmuxGjPz0kwiRDPVM2xVH2CzkmvUfqkuM7xUjJdu7ld-Fr5DbAimfGjdI4v5csLsn4SRt_h3YLuUu3PVfpv1yl7reQdKhkzmPSOnQWyVyn2mcFwQhx=w477-h358-no',
                'year' => 2009,
                'url' => 'https://photos.app.goo.gl/2EpHCcyidu2PQYF92'
            ),
            array(
                'cover' => 'https://lh3.googleusercontent.com/IBGnRmQAq0FjWWPG3R__uVZSYxDQZFEkt03UWHlfbyDIOvWFj4e0rcgeFFpToJJ8E9T5YESognbgt-NFnrYiIAqSkkoxwVOlQg6Jaj7-iM1LBeh8w4k8TtXKhzNsyONxMzxPfvYosm658aN6_eIEPseI2zHcNerS43ic8ZknPHbl3JzD7VokypAjh4vLUcxCaVj82CAncguvHsROeGtcqXw_x7FgMbvaRYAUZ2j4ZEduxuqay_e5f36shJW93UUKDGIoQlYdc9h2xgIs8hJ4RVsx-Go3JrTHM_Him8ITlMneYtebfWgNGT8sEEaTgxywWrWnr310xe9MjYzhOZVgl9AlG4LA7AYoHJnPkHfTm2EgaikWBYpYOIouLVVxiKmbSA-stmEZ9jut_jPuNkpWPZbMAJ19nF7QhvSX-rTb7812uAwwdF1KzE1yRkOfgid6XUBVDMIDIUzRj0Ig1CkFRNKAqnfJfJyyHwKlPqAl1nD2_wrbctT3KeT-mMsWN7yHXzZn4n6pREgX2bXx8NzN3dl4KCpLFVR_a_WMsTUPJKslLQpMnXMrg2lO5RxP1nRUsO52LeXRAu6MSPgiRH77pSicXRrXw6n_tN0PjQURTtCARgPaXoSVWgUVjpQX13ta_SN4qlMha7qUFYqPv5w-d-07twyOiWEh=w586-h390-no',
                'year' => 2011,
                'url' => 'https://goo.gl/photos/Hk5Ma1cNv4RMC8My8'
            ),
            array(
                'cover' => 'https://lh3.googleusercontent.com/zZj3_FMdImbWSnkvQr7eNLO2hbOgInUG2jIB8JWufTBus9AgFKC634cqGFa04Q4t4NG-fhrhDz59S0sjzeE5UwWQM_UVXZeyfkwXOaL0KkY1CU__IxC7qfTBtBru_sFSOm8XXyL5-F7Mnk_ZywnD1npSfUWg0irSU6XSh_cReSS40wnYb8L5QMjSqR4FFlxr_bDSurl6fKBqPCFMP3pnTjKPcz9JTYgAq0qTsR1r6mDbqgvnUW1rpnn2Glga77vPOt0r6xr2yv7A1r8D-I9GCdewbFr3QGtBg9bXUIPcS49f3cB-fy0mvQ1HdbgknBi2tc7nMHhtani3JkaXSf1Fzo6oXhWufuNr-cWpTzqp8vbMaRKOLQRQlYmMr2QhecAw_wLgXzurF1z5bypIrwxjrVlxG0cUhoP3fb3IffwEEdEtkOFO20Wvj68uneoqBWPAz49F7pMAvFxtlD-2FRX0S6l3KablMqMhcKagcdFEVrRVhIEufQLTHzx5kkilusulvsrTUfrO1muHcTm-4dDTDQVDL8fUfDRJ6tk6ptYZa9TpgyYbiNEP4-0BERVSwVO1SrDBY-Ls13qjPyvE2ytWfFPMSJOH7tTDdY5sTWAvya4kdPjYaJywcLumTMZ1--Stp797nMrfig_HUXXw3rlK8nLah8-KuGo0=w478-h318-no',
                'year' => 2012,
                'url' => 'https://goo.gl/photos/h4ddh39S5ojvYbeC7'
            ),
            array(
                'cover' => 'https://lh3.googleusercontent.com/DxT1OeCEaCJNhm9Zlr956ks4xoek6jhwEXW0u4MmoJE56PExGfhh4tD5hw6ZVd9G5ctoAB4eguaG3_ZDBb9lY76AR_SC81aViiXg32HIdxOBxojrUply0lyDWSXyphtcDxSgJbEG4aElEnTe4KQFKgHvfy6ac_5I1UKCn564ASkRyaZ4WtlTNL1SnI4Gai4rLTAhS23hQ4n5sfmVKOAcPZ5OYSUStshnzR7CSqnM7oqc5Xx5qSpSMiaXq9S1F6wDTIAEanA1y8xJaSyE5SUby3t_EFX580WMDEAazWlkDbH-7fGaqsUf8T_SJc9yUzMfDHzDoMi8ebFoUDzHwBu45Bf0EAjbqjxpvfEhYLfcziLwXdOrecxlAvIBGuBTDeMIkxXMVXghoSnrqXxC1j0mfcKJOVuVOh3nbqZU1_vtUPZFQIReCUmV1X883nPLahhFUsClNjDNSyGG7wqPifNNGTVMMAROfZdNw_HQZuA_ThmY_SITbA8aZTS6c0YwrFWsUEYdhAN-VRpWy3aJ8xY5rUmuZoS5DYMVKdIWbIeD42WQ2y1Wrm80aJAdKA-g3X0NUCnjNejdtWsWxcchUrCXcBu3N2kj2rPP3GwET-UpUBdI1uw7NWsAw2ngJ_M5D3S6aTSgnVZXpmYtBW2HBS5k5WY6LiVB2WOG=w477-h318-no',
                'year' => 2013,
                'url' => 'https://goo.gl/photos/9z4mx2cWM2r2wNdx7'
            ),
            array(
                'cover' => 'https://lh3.googleusercontent.com/FwXy13WicMIq5z_KCTSL7nXPY9N-zwIBSxW25xrmBz-sGrtSJopydHvaDFZHKINmKwFI0Y6Ac3V4Wzt3pyLrSMKNnA7ea9vrQ03bLE5qIGilbu2RjYlGMt4Y1RUfujg75TUUYTu6a5DPdEiGyGYjz8WDrSWTY3b7VgtYyICRlKBtAn43yQuMJMaUr600BCqu0YJ4XfC0SvW2rf0EOeKM-nlnC8IfA_d7y02DAc0Gh3CcF6hOi_VPYVh0IVBaGLRivpWeLT218yjvIsfEUBEOOOYW3b_qOwWIHH0LA77o2zV7gx8q3xe75zEBNzqJUpptA3V_7TTss50fJqKSrxiyC1WvnU-uPJs9PAVx5qUvb7YdeHJsJf0HJDWnM6ehFgYZeKdAz2GmLbLFVzLa9jCrXU3awAzfJdv9owlkXZOcEZgnbI4FQg7IiC4njZ1eRBRZmkC3XNGOklYe9_hFSCbbGQ-rAb1a8BkOGbhE8YlPPVC2CpYD4dj5Q5434qtZ5ctXqkmZ2KefZzP6DKHHkIqLPDQSaldrtoS87-qYhM4LLnvyVucvbkkYhylZP-i9C34nRR4P0xgkibzFPe_2IjNcYyRciEdl9YwPA0XBgG9W-fX4S8QzcIUGu9BnHfAyA2pyEMMBDG5IbOFa39cf6A4C6qCUwsZvIPPA=w477-h318-no',
                'year' => 2014,
                'url' => 'https://goo.gl/photos/EdRGMs8xZPpdfGBd6'
            ),
            array(
                'cover' => 'https://img19.rajce.idnes.cz/d1903/11/11594/11594781_64d12790391e240f02fe8567c96f6f9e/images/DSC_7332.jpg?ver=0',
                'year' => 2015,
                'url' => 'https://dracon.rajce.idnes.cz/Jizda_kralu_Doloplazy_2015/'
            ),
            array(
                'cover' => 'https://img21.rajce.idnes.cz/d2101/13/13007/13007532_f84313d6125abf9c2e7aa1175c28e5a9/images/DSC_0991.jpg?ver=2',
                'year' => 2016,
                'url' => 'https://dracon.rajce.idnes.cz/Jizda_kralu_Doloplazy_2016/'
            ),
            array(
                'cover' => 'https://lh3.googleusercontent.com/tLmqDEffy2EE-i5wJcbO3wYUxV2EmkmwXRMmcqQ5a-Y--TI2R72xC4NFIoNQHMi6qyS-2m30fFey2H9Mm7GGB-n7GmHDs7blWFTsYwVQOhwDUCwcpP5LU_MewwZx0BZpMDhIl2_0wBsTM1jrU8wgKaAJiTFwNlPYgWFRLFntqchpPF95YdYi7fKVfE1H_oHzyBWu9Ms_-ItkY_hXGh3Y7SARJe4WerYJbEgYr82XYSMmZoukLAFcthbISQojCYreqMwmGCp5oxmNEKk__jxluSrcdDbYVxAMDFkV0R1TKhMAp7bpCdyM3JKL8IOx_Ncv0m8Ffa-j_-G9ste81SxqAaYAQ0FWgJ-GcP-UivohQXFwlLUIWZ0ncC8hlLGk8mUik-vz5LFh41WHRjfcUR1ubyZJSsQY25m6HhpXTPuiTBWIzoP8xGuckqn1rAp0ahIERxJrv4EpYFgMuRmG-J53eKbNkjjgsXPVLnNviSBKSQZu-uq95LDe6133yPIlGw8HavB9DsjobdsLje45qQkfy35B9VCJxhi_XrRhHTtAAO1eDlw0m2U9pwu5Z5-P9wtqsVwIMZTJoB_kJzWObCdNLa0-bKAihX4Kje9kl6eGMrWklKLjdcUZV2iGTUE_UR2EJhoew8JZGkDzUQftKiwtrYUrFOxzxsgq=w478-h317-no',
                'year' => 2017,
                'url' => 'https://goo.gl/photos/B86Pdt2f8nsY4Syp6'
            ),
            array(
                'cover' => 'https://lh3.googleusercontent.com/qf7zq4TjeNniGXUpkCCRhz7MxXJ5en22Y4mvfAxG0ad394TPrAyXHYCWY1OH84Pf1kxFEjpH_H7E_RXnxMnJCtpYUiGdknCXgOhOTFYVAn2YiYkAz3G12BRVgwVdyTqw97GaS8uYzEVui8BHDUjQobdW9PCNgBb-SMZjHu1R-UzGjBINteUgBhS43T_ehEdUi-MsJGr71110Bof-babSi57O0SdIvR_prdwFq1zrW7qpKMX1iO7Ci6ngRR0HkKmt33CYwyXxLuk-HTJbDU8hcY7HyAbyq4kzzYTj-g4RzUi0xBjsRxuP_PSS_RN6vwFhjzbYkIoPMthCD4cCSysSQbSWyB_pTlduVmVjGOZl-g2n0O8i-aFYQc_GMNbCegADCSbm67iUXeihC-Jnp6MFguLBc2sHG37Z9uI8Yo7EnnyjTYRDehLZU8FOmvvOmGBHmObs_zxR5A2moeF2DjwMb5lNPvE4nwMYLZfuliwCzIlKcQzYgz2t_d44gWN9FEmrgifEmQtoxFRo896ZU0os3fLuz7I3OR94KgDIM4rZV12ysPw_uUQXjzDOLgUc-sLVKsoWX-aii9fdq8mFPXavLnIbIOZW6kD6OtwU9KzTl92NT0UwenSvL59FY8oDfDNMEW6wiLJJEpHMVSq_rXkwYjIf-TJKaL2F',
                'year' => 2018,
                'url' => 'https://photos.app.goo.gl/YyVZyfgkswDtTVHy5'
            )
        );

        usort($albums, function ($a, $b) {
            return $a['year'] < $b['year'] ? 1 : ($a['year'] == $b['year'] ? 0 : -1);
        });

        return $this->render('default/photos.html.twig', array('albums' => $albums));
    }

    /**
     * @Route("/videos", name="videos")
     */
    public function videosAction(Request $request)
    {
        $videos = array(
            array(
                'year' => 2016,
                'url' => 'https://www.youtube.com/embed/mW-vIOI4aIg'
            ),
            array(
                'year' => 2017,
                'url' => 'https://www.youtube.com/embed/fSLkip-7Kw0'
            ),
            array(
                'year' => 2018,
                'url' => 'https://www.youtube.com/embed/VUYW2FMuyXQ'
            )
        );

        usort($videos, function ($a, $b) {
            return $a['year'] < $b['year'] ? 1 : ($a['year'] == $b['year'] ? 0 : -1);
        });

        return $this->render('default/videos.html.twig', array('videos' => $videos));
    }

}
