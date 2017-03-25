<?php
namespace Aerc;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MakePackageCommand extends Command
{
    protected function configure()
    {
        $this->setName('make:package')->setDescription('Create a New Package');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        exec('echo "Creating a new Package Stub"');
    }
}