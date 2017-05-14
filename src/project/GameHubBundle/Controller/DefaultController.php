<?php

namespace project\GameHubBundle\Controller;

use FOS\UserBundle\Model\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('projectGameHubBundle:Default:index.html.twig');
    }
    public function testAction(Request $request)
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        $rep=$this->getDoctrine()->getManager()->getRepository('projectGameHubBundle:Videos');
        $publication=$rep->findAll();
        if($request->isMethod('POST')) {
            if($request->get('Choice')!="None") {
                if ($request->get('Choice') == 'old') {
                    $publication = $rep->findoldestDQL();
                } elseif ($request->get('Choice') == 'new') {
                    $publication = $rep->findnewestDQL();
                }
            }

            elseif ($request->get('Titre')!="")
            {
                $publication= $rep->findbytitreDQL($request->get('Titre'));
            }

        }

        return $this->render('projectGameHubBundle:Publications:AfficheAllPublications.html.twig',array('pubs'=>$publication));
    }

    public function testproAction()
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        return $this->render('projectGameHubBundle:testview:affmpro.html.twig');
    }
}
