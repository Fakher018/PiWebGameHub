<?php

namespace project\GameHubBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChaineType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nomc')->add('type', ChoiceType::class, array('choices' => array('FPS' => 'FPS','RPG' => 'RPG', 'Stratégie' => 'Stratégie', 'Action' => 'Action','Beat\'em All' => 'Beat\'em All','Hack\'n Slash' => 'Hack\'n Slash', 'Survival-Horror' =>'Survival-Horror','Simulation'=>'Simulation','Course'=>'Course','Sport'=>'Sport','MMO'=>'MMO')))
            ->add('console', ChoiceType::class, array('choices' => array('PS3' => 'PS3', 'PS4' => 'PS4', 'XboxOne' => 'XboxOne', 'PC' => 'PC', 'Wii U' => 'Wii U','Playstation Vita' => 'Playstation Vita', 'Xbox360' => 'Xbox360')))->add('imageFile', 'Vich\UploaderBundle\Form\Type\VichFileType')->add('urlChaine')
            ->add('signature',TextareaType::class)->add('Ajouter',SubmitType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'project\GameHubBundle\Entity\Chaine'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'project_gamehubbundle_chaine';
    }


}
