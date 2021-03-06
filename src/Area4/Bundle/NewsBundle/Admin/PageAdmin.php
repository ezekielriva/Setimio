<?php

namespace Area4\Bundle\NewsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

class PageAdmin extends Admin
{
	protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name','text',array('label'=>"Nombre"))
            ->add('content','textarea',array('label'=>"Contenido", 'attr'=>array('class'=>'tinymce','data-theme'=>'medium')))
            /* 'attr' => array(
            'class' => 'tinymce',
            'data-theme' => 'medium' // simple, advanced, bbcode
        )*/
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name',null,array('label'=>"Nombre"))
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name',null,array('label'=>"Nombre"))
        ;
    }

    public function validate(ErrorElement $errorElement, $object)
    {
        $errorElement
            ->with('name')
                ->assertMaxLength(array('limit' => 200))
            ->end()
        ;
    }
}