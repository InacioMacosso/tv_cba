<?php

namespace App\Form;

use App\Entity\User;
use phpDocumentor\Reflection\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
                'label'=>"Nome",
                'constraints'=> new Length([
                    'min' => 2,
                    'max' => 30,
                ]),
                'attr'=>[
                    'placeholder'=>"Digite o seu nome"
                ]
            ])
            ->add('lastname', TextType::class, [
                'label'=>"Nome",
                'attr'=>[
                    'placeholder'=>"Digite o seu nome"
                ]
            ])
            ->add('phonenumber', TelType::class, [
                'label'=>"Telefone",
                'attr'=>[
                    'placeholder'=>"Digite o seu numero de telefone"
                ]
            ])
            ->add('email', EmailType::class, [
                'label'=>"Email",
                'attr'=>[
                    'placeholder'=>"Digite o seu email"
                ]
            ])
            ->add('password',  RepeatedType::class,[
                'type'=>PasswordType::class,
                'invalid_message'=>"As duas palavras passe devem ser identicas",
                'label'=>"Palavra Passe",
                'required'=>true,
                'first_options'=>['label'=>"Palavra Passe",
                    'constraints'=> new Length([
                        'min' => 8,
                        'max' => 20,
                    ]),
                    'attr'=>[
                        'placeholder'=>"Digite a sua palvra passe"
                    ]
                ],
                'second_options'=>['label'=>"Confirmaçao da Palavra Passe",
                    'attr'=>[
                        'placeholder'=>"Confirme a sua palvra passe"
                    ]
                ],
            ])
            ->add('submit', SubmitType::class, [
                'label'=>"Cadastrar"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
