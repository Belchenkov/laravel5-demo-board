<?php


namespace Tests\Unit\Entity\User;


use App\Entity\User;
use Illuminate\Support\Str;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    public function testRegister(): void
    {
        $user = User::register(
            $name = 'name',
            $email = Str::random(5) . '@gmail.com',
            $password = 'password'
        );

        self::assertNotEmpty($user);

        self::assertEquals($name, $user->name);
        self::assertEquals($email, $user->email);

        self::assertNotEmpty($user->password);
        self::assertNotEquals($password, $user->password);

        self::assertTrue($user->isWait());
        self::assertFalse($user->isActive());
    }

    public function testVerify(): void
    {
        $user = User::register('name', Str::random(5) . '@gmail.com', 'password');

        $user->verify();

        self::assertFalse($user->isWait());
        self::assertTrue($user->isActive());
    }

    public function testAlreadyVerified(): void
    {
        $user = User::register('name', Str::random(5) . '@gmail.com', 'password');

        $user->verify();

        $this->expectExceptionMessage('User is already verified.');

        $user->verify();
    }
}
