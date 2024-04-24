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
                            'message' => 'Введите имя',
                        ]),
                    ],
            ])
            ->add('lastName', TextType::class)
            ->add('email', EmailType::class, [
                'constraints' =>
                    [
                        new Email([
                        'message' => 'Введите корректный E-mail',
                        ]),
                    ],
            ])
            ->add('password', PasswordType::class, [
                'constraints' =>
                    [
                        new NotBlank([
                            'message' => 'Введите пароль',
                        ]),
                        new Length([
                            'min' => 6,
                            'minMessage' => 'Пароль должен содержать не менее 6 символов',
                            // max length allowed by Symfony for security reasons
                            'max' => 4096,
                        ]),
                    ],
            ])
            ->add('phone', TextType::class, [
                'constraints' =>
                [
                    new NotBlank([
                        'message' => 'Введите ваш номер телефона',
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
