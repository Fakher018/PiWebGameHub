<?php

namespace project\GameHubBundle\Controller;

use FOS\UserBundle\Model\UserInterface;
use project\GameHubBundle\Entity\Chaine;
use project\GameHubBundle\Form\ChaineType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class ChaineController extends Controller
{

    public function listAction()
    {   $usr=$this->getUser();
        $em=$this->getDoctrine()->getManager();
        $chaine=$em->getRepository("projectGameHubBundle:Chaine")->findOneBy(array('id_membre' =>$this->getUser()->getId()));


        return $this->render('projectGameHubBundle:Chaine:Profil.html.twig',array('chaine'=>$chaine, 'user'=>$usr));
    }
    public function modifierAction(Request $request,$id)
    {
        $em=$this->getDoctrine()->getManager();
        $chaine=$em->getRepository("projectGameHubBundle:Chaine")->find($id);
        $Form = $this->createForm(ChaineType::class, $chaine);
        $Form->handleRequest($request);


        if($Form->isValid()){

            $em=$this->getDoctrine()->getManager();
            $chaine->setDateModif(new \DateTime('now'));
            $em->persist($chaine);
            $em->flush();
            return $this->redirectToRoute("afficheProfil");
        }
        return $this->render('@projectGameHub/Chaine/Modify.html.twig',array(
            'form' =>$Form->createView(),'chaine'=>$chaine
        ));
    }
    public function supprimerAction($id)
    {

        $em=$this->getDoctrine()->getManager();
        $chaine=$em->getRepository("projectGameHubBundle:Chaine")->find($id);
        $em->remove($chaine);
        $em->flush();




        return $this->redirectToRoute("AjoutProfil");
    }


    public function ajoutAction(Request $request)
    {
        $chaine=new Chaine();
        $Form = $this->createForm(ChaineType::class, $chaine);
        $Form->handleRequest($request);
        if($Form->isValid()){





            $em=$this->getDoctrine()->getManager();
            $usr=$em->getRepository("projectGameHubBundle:Membre")->find($this->getUser()->getId());
            $chaine->setIdMembre($usr);
            $em->persist($chaine);
            $em->flush();
            return $this->redirectToRoute('afficheProfil');
        }
        return $this->render('@projectGameHub/Chaine/Ajout.html.twig',array(
            'form' =>$Form->createView()
        ));
    }

}
