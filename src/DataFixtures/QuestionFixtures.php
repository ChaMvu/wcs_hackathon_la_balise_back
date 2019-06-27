<?php
/**
 * Created by PhpStorm.
 * User: wilder
 * Date: 27/06/19
 * Time: 23:25
 */

namespace App\DataFixtures;


use App\Entity\Question;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class QuestionFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker  =  Faker\Factory::create('fr_FR');
        $question = new Question();
        $question->setContent($faker->sentence);
        for($i = 1; $i <=4; $i ++) {
            $question->setPosition($i);
            $manager->persist($question);
        }
        $this->addReference('question_' , $question);
        $manager->flush();
    }
}