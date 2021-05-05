<?php


namespace Tests\Unit\Entity\User;


use App\Entity\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Str;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use DatabaseTransactions;

    public function testNew(): void
    {
        $user = User::new(
            $name = 'name',
            $email = Str::random(5) . '@gmail.com'
        );

        self::assertNotEmpty($user);

        self::assertEquals($name, $user->name);
        self::assertEquals($email, $user->email);
        self::assertNotEmpty($user->password);
        self::assertFalse($user->isAdmin());

        self::assertTrue($user->isActive());
    }
}
