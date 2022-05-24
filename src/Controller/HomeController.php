<?php

namespace App\Controller;

use App\Entity\Field;
use App\Repository\DayRepository;
use App\Repository\FieldRepository;
use App\Repository\LevelRepository;
use App\Repository\PlanificationRepository;
use App\Repository\ScheduleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(FieldRepository $fieldRepository, LevelRepository $levelRepository): Response
    {
        $fields = $fieldRepository->findAll();
        $levels = $levelRepository->findAll();


        return $this->render('home/index.html.twig', [
            'fields' => $fields,
            'levels' => $levels,
        ]);
    }

    /**
     * @Route("/timetable/{id}/{level}", name="app_field_timetable")
     */
    public function fieldTimeTable(Field $field, $level, DayRepository $dayRepository, ScheduleRepository $scheduleRepository, PlanificationRepository $planificationRepository): Response
    {
        $days = $dayRepository->findAll();
        $schedules = $scheduleRepository->findBy([], ['BeginAt' => 'ASC']);
        $planifications = $planificationRepository->findBy(['field' => $field->getId(), 'level' => $level]);
        $timeTable = [];

        foreach ($schedules as $schedule) {
            $line = [];
            $line[] = $schedule->getHour();
            foreach ($days as $day) {
                $planif = false;
                foreach ($planifications as $planification) {
                    if ($planification->getDay() == $day && $planification->getSchedule() == $schedule) {
                        $planif = $planification;
                    }
                }
                if ($planif) {
                    $line[] = $planif->getCourse()->getName();
                } else {
                    $line[] = '';
                }
            }
            $timeTable['data'][] = $line;
        }

        return $this->render('home/field-timetable.html.twig', [
            'days' => $days,
            'schedules' => $schedules,
            'timetable' => $timeTable,
        ]);
    }
}
