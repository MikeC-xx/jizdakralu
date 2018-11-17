<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class KingsRideType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('year')
            ->add('startDate')
            ->add('endDate')
            ->add('introduction', TextareaType::class, ['attr' => ['class' => 'wysiwyg']])
            ->add('saturdayProgram', null, ['attr' => ['class' => 'wysiwyg']])
            ->add('sundayProgram', null, ['attr' => ['class' => 'wysiwyg']])
            ->add('king')
            ->add('guest')
            ->add('performers')
            ->add('sponsors');
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\KingsRide'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_kingsride';
    }


}
