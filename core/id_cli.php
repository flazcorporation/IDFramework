<?php

// READ DOCUMENTATION FROM https://symfony.com/doc/current/components/console/helpers/index.html

namespace ID;
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;

class cli extends Command{
    protected function configure(){
        $this->setName('gc:whatTime')
             ->setDescription('Menampilkan Waktu')
             ->setHelp('Help Menampilkan Waktu');
    }
    public function execute(InputInterface $input, OutputInterface $output){
        $now = new \DateTime();
        $output->writeln('Ini Jam'.$now->format('g:i a'));

    }
}

class test extends Command{
    protected function configure(){
        $this->setName('test')
             ->setDescription('Menampilkan Test')
             ->addArgument(
                 'value',
                 InputArgument::OPTIONAL,
                 'A String your need',
                 'crick.crick'
             )
             ->addOption(
                 'color',
                 'color',
                 InputOption::VALUE_REQUIRED,
                 'Tambah Saja',
                 'white'
             )
             ->addOption(
                'nilai',
                'nilai',
                InputOption::VALUE_REQUIRED,
                'Tambah Saja',
                'berapa'
            )
            ->setHelp('Help Menampilkan Waktu');
    }
    public function execute(InputInterface $input, OutputInterface $output){
        /*
        $value = $input->getArgument('value');
        $color = $input->getOption('color');
        $output->writeln($color.' => '.$value);
        */
        $helper = $this->getHelper('question');
        $question = new ChoiceQuestion(
            'Please select your favorite colors (defaults to red and blue)',
            array('red', 'blue', 'yellow'),
            '0,1'
        );
        $question->setMultiselect(true);
    
        $colors = $helper->ask($input, $output, $question);
        $output->writeln('You have just selected: ' . implode(', ', $colors));        
    }
}
