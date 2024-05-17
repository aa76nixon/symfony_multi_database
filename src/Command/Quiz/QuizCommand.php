<?php

namespace App\Command\Quiz;

use App\Entity\Common\Taxonomy\Taxon;
use App\Entity\Term\Quiz\Quiz;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
class QuizCommand extends Command
{
    protected static $defaultName = 'app:quiz:command';

    protected function configure(): void
    {
        $this
            ->setName(self::$defaultName)
            ->addOption('year', null, InputOption::VALUE_OPTIONAL, '', 2024);
    }

    public function __construct(
        private readonly EntityManagerInterface $commonEntityManager,
        private readonly ManagerRegistry $doctrine
    )
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $year = (int)$input->getOption('year');
        $termEntityManager = $this->doctrine->getManager("term_{$year}");

        $taxon = $this->commonEntityManager->getRepository(Taxon::class)->findOneBy(['position' => 2]);
        if(!$taxon){
            $taxon = new Taxon();
            $taxon->setPosition(2);
            $this->commonEntityManager->persist($taxon);
            $this->commonEntityManager->flush();
        }


        $quiz = new Quiz();
        $quiz->setTaxonomyId($taxon->getId());
        $quiz->setName("Quiz for year {$year}");
        $termEntityManager->persist($quiz);
        $termEntityManager->flush();

        return 1;
    }
}