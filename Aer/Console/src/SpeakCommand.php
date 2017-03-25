<?php
namespace Aer\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SpeakCommand extends Command
{
    protected function configure()
    {
        $this->setName('aer:speak')->setDescription('Speak Message');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        exec('echo "Hello World"');
    }
}