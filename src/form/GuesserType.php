<?php

namespace App\form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class GuesserType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
        ->add('userNumber', PasswordType::class, array(
            'label' => 'Numero a adivinar',
            'attr'  => [
                'class' => 'input'
            ]
        ))
        ->add('submit', SubmitType::class, array(
            'label' => '¿Adivinar?'
        ))
        ;
    }

}