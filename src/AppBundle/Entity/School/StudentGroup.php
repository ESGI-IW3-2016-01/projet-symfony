<?php

namespace AppBundle\Entity\School;

use AppBundle\Entity\Calendar\Calendar;
use Doctrine\ORM\Mapping as ORM;

/**
 * StudentGroup
 *
 * @ORM\Table(name="student_group")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StudentGroupRepository")
 */
class StudentGroup
{
    /**
     * @var int $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var int $scholarYear
     *
     * @ORM\Column(name="scholar_year", type="integer")
     */
    private $scholarYear;

    /**
     * @var int
     *
     * @ORM\Column(name="promotion", type="integer")
     */
    private $promotion;

    /**
     * @var School $school
     *
     * @ORM\ManyToOne(targetEntity="School", inversedBy="studentGroup")
     * @ORM\JoinColumn(name="school_id", referencedColumnName="id")
     */
    private $school;


    /**
     * @var Calendar $calendar
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Calendar\Calendar", cascade={"persist", "merge", "remove"})
     * @ORM\JoinColumn(name="calendar_id", referencedColumnName="id")
     */
    private $calendar;

    /**
     * @var int $groupNumber
     *
     * @ORM\Column(name="group_number", type="integer")
     */
    private $groupNumber;

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
     * Set name
     *
     * @param string $name
     *
     * @return StudentGroup
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set schoolYear
     *
     * @param integer $scholarYear
     *
     * @return StudentGroup
     */
    public function setScholarYear($scholarYear)
    {
        $this->scholarYear = $scholarYear;

        return $this;
    }

    /**
     * Get schoolYear
     *
     * @return int
     */
    public function getScholarYear()
    {
        return $this->scholarYear;
    }


    /**
     * Set school
     *
     * @param School $school
     *
     * @return StudentGroup
     */
    public function setSchool(School $school)
    {
        $this->school = $school;

        return $this;
    }

    /**
     * Get school
     *
     * @return School
     */
    public function getSchool()
    {
        return $this->school;
    }


    /**
     * Set calendar
     *
     * @param Calendar $calendar
     *
     * @return StudentGroup
     */
    public function setCalendar(Calendar $calendar)
    {
        $this->calendar = $calendar;

        return $this;
    }

    /**
     * Get calendar
     *
     * @return Calendar
     */
    public function getCalendar()
    {
        return $this->calendar;
    }


    /**
     * Gets the value of promotion.
     *
     * @return int
     */
    public function getPromotion()
    {
        return $this->promotion;
    }

    /**
     * Sets the value of promotion.
     *
     * @param int $promotion the promotion
     *
     * @return self
     */
    public function setPromotion($promotion)
    {
        $this->promotion = $promotion;

        return $this;
    }

    public function getFullName() {
        return $this->schoolYear. " ". $this->name;
    }

    /**
     * @return int|null
     */
    public function getGroupNumber()
    {
        return $this->groupNumber;
    }

    /**
     * @param int $groupNumber
     */
    public function setGroupNumber(int $groupNumber)
    {
        $this->groupNumber = $groupNumber;
    }

    /**
     * @return string
     */
    function __toString(): string
    {
        return $this->scholarYear . $this->name . $this->groupNumber;
    }
}
