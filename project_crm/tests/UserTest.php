<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\User;
use App\Form\Type\UserType;
// use App\Model\TestObject;

class UserTest extends TestCase
{

    public function UserSubmitValidData()
    {
        $formData = [
            'firtsname' => 'firtsname',
            'lastname' => 'lastname',
            'email' => 'email',
            'phoneNumber' => 'phoneNumber',
            'tag' => 'tag',
        ];

        $model = new UserModel();
        // $formData will retrieve data from the form submission; pass it as the second argument
        $form = $this->factory->create(User::class, $model);

        $expected = new User();
        // ...populate $object properties with the data stored in $formData

        // submit the data to the form directly
        $form->submit($formData);

        // This check ensures there are no transformation failures
        $this->assertTrue($form->isSynchronized());

        // check that $formData was modified as expected when the form was submitted
        $this->assertEquals($expected, $model);
    }

    public function testCustomFormView()
    {
        $formData = new TestObject();
        // ... prepare the data as you need

        // The initial data may be used to compute custom view variables
        $view = $this->factory->create(TestedType::class, $formData)
            ->createView();

        $this->assertArrayHasKey('custom_var', $view->vars);
        $this->assertSame('expected value', $view->vars['custom_var']);
    }
}
