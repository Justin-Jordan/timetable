<?php

namespace App\Form;

use App\Entity\Course;
use App\Entity\Day;
use App\Entity\Field;
use App\Entity\Level;
use App\Entity\Planification;
use App\Entity\Room;
use App\Entity\Schedule;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlanificationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('field', EntityType::class, [
                "class" => Field::class,
                "choice_label" => "name"
            ])
            ->add('level', EntityType::class, [
                "class" => Level::class,
                "choice_label" => "code"
            ])
            ->add('course', EntityType::class, [
                "class" => Course::class,
                "choice_label" => "code"
            ])
            ->add('day', EntityType::class, [
                "class" => Day::class,
                "choice_label" => "name"
            ])
            ->add('schedule', EntityType::class, [
                "class" => Schedule::class,
                "choice_label" => "hour"
            ])
            ->add('room', EntityType::class, [
                "class" => Room::class,
                "choice_label" => "code"
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Planification::class,
        ]);
    }
}
