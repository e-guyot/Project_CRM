<?php
namespace Test;

use PHPUnit\Framework\TestCase;
use App\User;

class UserTest extends TestCase {

	private $user;

	public function testIsValidOK() {
		$this->assertTrue($this->user->isValid());
	}

	public function testIsValidKO() {
        $this->user->setName(NULL);
		$this->assertFalse($this->user->isValid());
	}

	public function setUp() : void {
		$this->user = new User("DUPONT", "Jean", "dupont.jean@gmail.com");
	}

	public function tearDown() : void {
		$this->user = null;
	}
}
