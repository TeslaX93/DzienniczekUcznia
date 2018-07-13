<?php

namespace StudentBundle\DataFixtures;

use StudentBundle\Entity\Student;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class StudentFixtures extends Fixture
{
    public function load(ObjectManager $manager) {

        for($i = 0; $i < 25; $i++) {
            $student = new Student();
            $student->setName(chr(mt_rand(65,90)));
            $student->setSurname(chr(mt_rand(65,90)));

            $randomTimestamp = mt_rand(1104534000,1135983599);
            $randomDate = new \DateTime();

            $student->setBirthdate($randomDate->setTimestamp($randomTimestamp));
            $student->setDisabled(false);
            $manager->persist($student);
        }
            $manager->flush();
    }
}