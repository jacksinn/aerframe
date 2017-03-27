<?php
namespace Aer\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MigrateListCommand extends Command
{
    protected function configure()
    {
        $this->setName('migrate:list')->setDescription('Lists Migrations');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        exec('echo "Listing migrations..."');
    }
}