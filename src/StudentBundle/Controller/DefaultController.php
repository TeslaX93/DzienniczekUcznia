<?php

namespace StudentBundle\Controller;

use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class DefaultController extends Controller
{
    /**
     * @Route("/list")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager()->getRepository('StudentBundle:Student');
        $students = $em->findBy(['disabled' => 0], ['surname' => 'ASC', 'name' => 'ASC']);
        try {
            $studentsAmount = $em->getStudentsNumber();
        } catch (NoResultException $e) {
        } catch (NonUniqueResultException $e) {
        }
        return $this->render('@Student/Default/index.html.twig', ['students' => $students, 'studentsAmount' => $studentsAmount]);
    }

    /**
     * @Route("/", name="defaultView")
     */
    public function redirectToDateAction()
    {
        $currentMonth = date("n");
        $currentYear = date("Y");
        return $this->redirectToRoute('mainView',['month' => $currentMonth, 'year' => $currentYear]);
    }

    /**
     * @Route("/{year}/{month}", name="mainView")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function mainViewAction(Request $request)
    {
        $getYearParam = $request->attributes->get('year');
        $getMonthParam = $request->attributes->get('month');
        if(($getMonthParam<1 || $getMonthParam>12 || $getYearParam<1970 || $getYearParam>2070)) {
            throw $this->createNotFoundException("Invalid date");
        }
        $em = $this->getDoctrine()->getManager();
        $students = $em->getRepository('StudentBundle:Student')->findBy(['disabled' => 0], ['surname' => 'ASC', 'name' => 'ASC']);
        $studentstatus = $em->getRepository('StudentBundle:StudentStatus')->findAll();
        return $this->render('@Student/Default/mainView.html.twig',
            [
                'students' => $students,
                'studentStatus' => $studentstatus
            ]);
    }
}
