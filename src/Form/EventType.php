<?php

namespace App\Form;

use App\Entity\Event;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('description')
            ->add('start', DateTimeType::class, [
                'date_widget' => 'single_text'
            ])
            ->add('end', DateTimeType::class, [
                'date_widget' => 'single_text'
            ])
            ->add('title')
            ->add('all_day')
            ->add('background_color', ColorType::class)
            ->add('border_color', ColorType::class)
            ->add('text_color', ColorType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
        ]);
    }
}
