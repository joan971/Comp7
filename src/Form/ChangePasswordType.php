<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
Use Symfony\Component\Form\Extension\Core\Type\EmailType;
Use Symfony\Component\Form\Extension\Core\Type\PasswordType;
Use Symfony\Component\Form\Extension\Core\Type\TextType;
Use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
Use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'disabled' => true,
                'label' => 'Mon adresse email'
            ])
            ->add('firstname', TextTYpe::class, [
                'label' => 'Mon prénom'
            ])
            ->add('lastname', TextTYpe::class, [
                'disabled' =>true,
                'label' => 'Mon nom'
            ])
            ->add('old_password', PasswordType::class, [
                'label' => 'Mon mot de passe actuel',
                'mapped' => false,
            ])
            ->add('new_password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Le mot de pass et la confirmation doivent être identique.',
                'label' => 'Mon nouveau mot de passe',
                'required' => true,
                'mapped' => false,
                'first_options' => ['label' => 'Mon nouveau mot de passe' 
                 ],
                'second_options' => [ 'label' => 'Confirmez votre nouveau mot de passe'
                ]
            ])

            ->add('submit', SubmitType::class, [
                'label' => "Mettre à jour"
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
