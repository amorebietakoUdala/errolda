<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Forms;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;


/**
 * Description of ArgazkiaFormType
 *
 * @author ibilbao
 */
class HabitanteBilatzaileaForm extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
	$builder
	    ->add('nombre', null, [
		'constraints' => [new NotBlank(),],
		'label' => 'label.nombre',
		'translation_domain' => 'messages'
	    ])
	    ->add('apellido1', null, [
		'constraints' => [new NotBlank(),],
		'label' => 'label.apellido1',
		'translation_domain' => 'messages'
	    ])
	    ->add('apellido2',null, [
		'required' => false,
		'label' => 'label.apellido2',
		'translation_domain' => 'messages'
	    ])
	;
    }

    public function configureOptions(OptionsResolver $resolver) {
	$resolver->setDefaults([
	    'csrf_protection' => true,
	]);
    }

}
