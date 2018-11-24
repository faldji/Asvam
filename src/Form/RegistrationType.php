<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Username', TextType::class, ['label' => 'Nom d\'utilisateur'])
            ->add('Nom', TextType::class)
            ->add('Prenom', TextType::class, ['label' => 'Prénom'])
            ->add('Password', PasswordType::class, ['label' => 'Mot de passe'])
            ->add('Re_password', PasswordType::class, ['label' => 'Confirmation'])
            ->add('Tel', TelType::class, ['required' => false])
            ->add('Age', BirthdayType::class, ['label' => 'Date de naissance'])
            ->add('Roles', ChoiceType::class, array(
                'choices' => array(
                    'Utilisateur' => 'ROLE_USER',
                    'Administrateur' => 'ROLE_ADMIN',
                    'Police' => 'ROLE_POLICE',
                    'Mairie' => 'ROLE_MAYOR'
                ),
                'mapped' => false

            ))
            ->add('Photo', FileType::class, ['required' => false])
            ->add('Email');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
