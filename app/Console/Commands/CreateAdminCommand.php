<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateAdminCommand extends Command
{
    /**
     * @var string
     */
    protected $signature = 'create:admin';

    /**
     * @var string
     */
    protected $description = 'Create admin for admin panel';

    /**
     * @var Hasher
     */
    private $hasher;

    /**
     * Create a new command instance.
     *
     * @param Hasher $hasher
     */
    public function __construct(Hasher $hasher)
    {
        parent::__construct();
        $this->hasher = $hasher;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return mixed|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $email = $this->ask('Email','admin@anypixel.net');
        $username = $this->ask('Username','admin');
        $password = $this->ask('Password', Str::random(10));

        $user = new User();

        $user->varEmail = $email;
        $user->varName = $username;
        $user->varPassword = $this->hasher->make($password);
        $user->intRoleID = User::ADMIN_ROLE;

        $user->save();

        $this->info('Saved');
    }
}
