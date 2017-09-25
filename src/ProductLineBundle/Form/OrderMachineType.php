<?php

namespace ProductLineBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderMachineType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('oderNumber')->add('productName', 'entity', [
				'class'	=> 'ProductLineBundle:Product',
				'choice_label' => 'name',
                ])->add('orderAmount')->add('machineNumber', 'choice', array(
    'choices' => array(
        'Machine 1' => 1,
        'Machine 2' => 2,
        'Machine 3' => 3,
    ),
    'choices_as_values' => true,
    'choice_attr' => function($val, $key, $index) {
        // adds a class like attending_yes, attending_no, etc
        return ['class' => 'attending_'.strtolower($key)];
    },
))->add('startDate');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ProductLineBundle\Entity\OrderMachine'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'productlinebundle_ordermachine';
    }


}
