<?php

namespace project\GameHubBundle\Controller;

use FOS\UserBundle\Model\UserInterface;
use project\GameHubBundle\Entity\Videos;
use project\GameHubBundle\Form\VideosType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Request;

class PublicationController extends Controller
{
    public function ajoutAction(Request $request)
    {
        $publ = new Videos();
        $Form = $this->createForm(VideosType::class, $publ);
        $Form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        $chaine = $em->getRepository("projectGameHubBundle:Chaine")->findOneBy(array('id_membre' => $this->getUser()->getId()));

        if ($Form->isValid()) {
            $publ->setIdChaine($chaine);
            $em->persist($publ);
            $em->flush();
            return $this->redirectToRoute('AffichePub');
        }
        return $this->render('projectGameHubBundle:Publications:AjoutPublications.html.twig', array(
            'form' => $Form->createView(),'chaine'=>$chaine
        ));


    }

        public function AffichePubAction()
    {
        $em=$this->getDoctrine()->getManager();
        $chaine = $em->getRepository("projectGameHubBundle:Chaine")->findOneBy(array('id_membre' => $this->getUser()->getId()));
        $publication=$em->getRepository("projectGameHubBundle:Videos")->findBy(array('id_chaine' =>$chaine->getIdChaine()));


        return $this->render('projectGameHubBundle:Publications:AffichePublications.html.twig',array('pubs'=>$publication));
    }
    public function AfficheAllPubAction(Request $request)
    {
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

    public function modifierAction(Request $request,$id)
    {
        $em=$this->getDoctrine()->getManager();
        $pub=$em->getRepository("projectGameHubBundle:Videos")->find($id);
        $Form = $this->createForm(VideosType::class, $pub);
        $Form->handleRequest($request);


        if($Form->isValid()){

            $em=$this->getDoctrine()->getManager();
            $em->persist($pub);
            $em->flush();
            return $this->redirectToRoute("afficheProfil");
        }
        return $this->render('@projectGameHub/Publications/ModifyPublications.html.twig',array(
            'form' =>$Form->createView(),'publication'=>$pub
        ));
    }
    public function supprimerAction($id)
    {

        $em=$this->getDoctrine()->getManager();
        $pub=$em->getRepository("projectGameHubBundle:Videos")->find($id);
        $em->remove($pub);
        $em->flush();




        return $this->redirectToRoute("AffichePub");
    }
}
