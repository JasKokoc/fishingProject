<?php

namespace App\Form;

use App\Entity\User;
use Faker\Provider\PhoneNumber;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'constraints' =>
                    [
                        new NotBlank([
                            'message' => 'Please enter your name.',
                        ]),
                    ],
            ])
            ->add('lastName', TextType::class)
            ->add('email', EmailType::class, [
                'constraints' =>
                    [
                        new Email([
                        'message' => 'Please enter a valid email address.',
                        ]),
                    ],
            ])
            ->add('password', PasswordType::class, [
                'constraints' =>
                    [
                        new NotBlank([
                            'message' => 'Please enter a password',
                        ]),
                        new Length([
                            'min' => 6,
                            'minMessage' => 'Your password should be at least 6 characters',
                            // max length allowed by Symfony for security reasons
                            'max' => 4096,
                        ]),
                    ],
            ])
            ->add('phone', TextType::class, [
                'constraints' =>
                [
                    new NotBlank([
                        'message' => 'Please enter your phone number.',
                    ])
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
