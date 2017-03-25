<?php
namespace Aerc;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MigrateCommand extends Command
{
    protected function configure()
    {
        $this->setName('migrate')->setDescription('Migrates Database');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        exec('echo "Making migration..."');
    }
}