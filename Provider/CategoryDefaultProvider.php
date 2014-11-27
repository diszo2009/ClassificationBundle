<?php

namespace Rz\ClassificationBundle\Provider;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\ClassificationBundle\Model\CategoryInterface;

class CategoryDefaultProvider extends BaseCategoryProvider
{

    /**
     * @param string $name
     */
    public function __construct($name)
    {
        parent::__construct($name);
    }

    /**
     * {@inheritdoc}
     */
    public function buildEditForm(FormMapper $formMapper)
    {
        $this->buildCreateForm($formMapper);
    }

    /**
     * {@inheritdoc}
     */
    public function buildCreateForm(FormMapper $formMapper)
    {
        $formMapper
            ->with('Category', array('class' => 'col-md-6'))
                ->add('settings', 'sonata_type_immutable_array', array('keys' => $this->getFormSettingsKeys()))
            ->end();
    }

    /**
     * @return array
     */
    public function getFormSettingsKeys()
    {
        return array(
            array('template', 'choice', array('choices'=>$this->getTemplateChoices())),
        );
    }

    /**
     * {@inheritdoc}
     */
    public function postPersist(CategoryInterface $category)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function postUpdate(CategoryInterface $category)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function validate(ErrorElement $errorElement, CategoryInterface $category)
    {
    }
}
