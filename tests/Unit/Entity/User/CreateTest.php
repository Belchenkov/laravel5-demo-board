<?php


namespace Tests\Unit\Entity\User;


use App\Entity\User;
use Illuminate\Support\Str;
use Tests\TestCase;

class CreateTest extends TestCase
{
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

        self::assertTrue($user->isActive());
    }
}
