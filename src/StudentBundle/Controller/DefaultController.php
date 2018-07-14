<?php

namespace StudentBundle\Controller;

use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

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
     * @Route("/")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function mainViewAction()
    {
        $em = $this->getDoctrine()->getManager();
        $students = $em->getRepository('StudentBundle:Student')->findBy(['disabled' => 0], ['surname' => 'ASC', 'name' => 'ASC']);
        $studentstatus = $em->getRepository('StudentBundle:StudentStatus')->findAll();
        return $this->render('@Student/Default/mainView.html.twig', ['students' => $students, 'studentStatus' => $studentstatus]);
    }
}
