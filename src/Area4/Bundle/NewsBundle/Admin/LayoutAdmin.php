<?php

namespace Area4\Bundle\NewsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

class LayoutAdmin extends Admin
{
	protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('column_one','entity',array('class'=>'Area4NewsBundle:Category','label'=>'Columna 1','help'=>'Categoría que se mostrará en esta columna'))
            ->add('column_two','entity',array('class'=>'Area4NewsBundle:Category','label'=>'Columna 2','help'=>'Categoría que se mostrará en esta columna'))
            ->add('column_three','entity',array('class'=>'Area4NewsBundle:Category','label'=>'Columna 3','help'=>'Categoría que se mostrará en esta columna'))
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
    	//add(<campo>,<tipoDato>,array())
        $listMapper
            ->addIdentifier('id')
            ->add('column_one',null,array('label'=>'Columna 1'))
            ->add('column_two',null,array('label'=>'Columna 2'))
            ->add('column_three',null,array('label'=>'Columna 3'))
        ;
    }
}