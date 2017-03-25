<?php
namespace Aerc;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MakeMigrationCommand extends Command
{
    protected function configure()
    {
        $this->setName('make:migration')->setDescription('Create a New Database Migration');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        exec('echo "Making a Database Migration"');
    }
}