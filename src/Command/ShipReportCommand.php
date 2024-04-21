<?php
/*
 * to use this make sure to type *./bin/console* or *symfony console* first.
 * This is a custom command we created by typing *symfony console make:command*
 * We can do this thanks to the composer package *symfony/maker-bundle --dev(this is just added, so it's only added to the composer.json for development)
 */


namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:ship-report',
    description: 'Add a short description for your command',
)]
class ShipReportCommand extends Command
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $arg1 = $input->getArgument('arg1');

        if ($arg1) {
            $io->note(sprintf('You passed an argument: %s', $arg1));
        }

        if ($input->getOption('option1')) {
            // ...
        }


        /*
         * The following is an example of how you can make a progress bar
         * if you have some heavy query that you need to run that could take some time.
         * This way the user can see stuff is happening.
         */
        $io->progressStart(100);
        for($i = 0; $i < 100; ++$i)
        {
            $io->progressAdvance();
            usleep(10000);
        }
        $io->progressFinish();


        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return Command::SUCCESS;
    }
}
