<?php

namespace App\Form;

use App\Entity\Measurement;
use App\Entity\Location;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MeasurementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', DateType::class, [
                'widget' => 'single_text',
                'html5' => true,
            ])
            ->add('celsius', NumberType::class, [
                'attr' => [
                    'min' => -20,
                    'max' => 40,
                ],
                'html5' => true,
            ])
            ->add('pressure')
            ->add('humidity')
            ->add('percipitation')
            ->add('windspeed')
            ->add('location', EntityType::class, [
                'class' => location::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Measurement::class,
        ]);
    }
}
