<?php
/**
 * Created by PhpStorm.
 * User: wilder
 * Date: 27/06/19
 * Time: 23:26
 */

namespace App\DataFixtures;


use App\Entity\Answer;
use App\Entity\Question;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;


class AnswerFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker  =  Faker\Factory::create('fr_FR');
        for ($i = 1; $i <=4; $i++){
        $answer = new Answer();
        $answer->setContent($faker->sentence);
        $answer->setIsCorrect($faker->boolean);
        $manager->persist($answer);
        $answer->setQuestion($this->getReference('question_' , $i));
    }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [QuestionFixtures::class];
    }
}