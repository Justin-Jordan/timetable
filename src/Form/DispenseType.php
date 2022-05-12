<?php

namespace App\Form;

use App\Entity\Course;
use App\Entity\Dispense;
use App\Entity\Teacher;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DispenseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('startTime')
            ->add('endTime')
            ->add('day')
            ->add('teacher', EntityType::class, [
                "class" => Teacher::class,
                "choice_label" => "name"
            ])
            ->add('course', EntityType::class, [
                "class" => Course::class,
                "choice_label" => "code"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Dispense::class,
        ]);
    }
}
