<?php

namespace StudentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StudentStatus
 *
 * @ORM\Table(name="student_status")
 * @ORM\Entity(repositoryClass="StudentBundle\Repository\StudentStatusRepository")
 */
class StudentStatus
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="id_student", type="integer")
     */
    private $idStudent;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="eventDate", type="date")
     */
    private $eventDate;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=1, nullable=true)
     */
    private $status;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idStudent
     *
     * @param integer $idStudent
     *
     * @return StudentStatus
     */
    public function setIdStudent($idStudent)
    {
        $this->idStudent = $idStudent;

        return $this;
    }

    /**
     * Get idStudent
     *
     * @return int
     */
    public function getIdStudent()
    {
        return $this->idStudent;
    }

    /**
     * Set eventDate
     *
     * @param \DateTime $eventDate
     *
     * @return StudentStatus
     */
    public function setEventDate($eventDate)
    {
        $this->eventDate = $eventDate;

        return $this;
    }

    /**
     * Get eventDate
     *
     * @return \DateTime
     */
    public function getEventDate()
    {
        return $this->eventDate;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return StudentStatus
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
}

