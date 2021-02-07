<?php

namespace App\Form;

use App\Entity\User;
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

class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
                'disabled'=>true,
                'label'=>'Nome'
            ])
            ->add('lastname', TextType::class, [
                'disabled'=>true,
                'label'=>'Sobrenome'
            ])
            ->add('phonenumber', TelType::class, [
                'disabled'=>true,
                'label'=>'Telefone'
            ])
            ->add('email', EmailType::class, [
                'disabled'=>true,
                'label'=>'Email'
            ])
            ->add('old_password', PasswordType::class, [
                'label'=>'Palavra passe atual',
                'mapped'=>false,
                'attr'=>[
                    'placeholder'=>'Digite a tua palvra passe actual'
                ]
            ])
            ->add('new_password',  RepeatedType::class,[
                'type'=>PasswordType::class,
                'mapped'=>false,
                'invalid_message'=>"As duas palavras passe devem ser identicas",
                'label'=>"Palavra Passe",
                'required'=>true,
                'first_options'=>['label'=>"Nova Palavra Passe",
                    'constraints'=> new Length([
                        'min' => 8,
                        'max' => 20,
                    ]),
                    'attr'=>[
                        'placeholder'=>"Digite a sua nova palvra passe"
                    ]
                ],
                'second_options'=>['label'=>"Confirmaçao da Nova Palavra Passe",
                    'attr'=>[
                        'placeholder'=>"Confirme a sua nova palvra passe"
                    ]
                ],
            ])
            ->add('submit', SubmitType::class, [
                'label'=>"Atualisar"
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
