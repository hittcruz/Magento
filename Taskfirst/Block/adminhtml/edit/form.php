<?php
namespace Magento\Taskfirst\Block\Adminhtml\Edit;

/**
 * Adminhtml blog post edit form
 */
class Form extends \Magento\Backend\Block\Widget\Form\Generic
{
    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;
    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Data\FormFactory $formFactory
     * @param \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig
     * @param \Magento\Store\Model\System\Store $systemStore
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Store\Model\System\Store $systemStore,
        array $data = []
    ) {
        $this->_systemStore = $systemStore;
        parent::__construct($context, $registry, $formFactory, $data);
    }
    /**
     * Init form
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('product_form');
        //$this->setTitle(__('Datos del post'));
    }
    /**
     * Prepare form
     *
     * @return $this
     */
    protected function _prepareForm()
    {
        /** @var \Ashsmith\Blog\Model\Post $model */
        //$model = $this->_coreRegistry->registry('blog_post');
        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create(
            ['data' => ['id' => 'edit_form', 'action' => $this->getData('action'), 'method' => 'post']]
        );
        $form->setHtmlIdPrefix('product_');
        $fieldset = $form->addFieldset(
            'base_fieldset',
            ['legend' => __('Product Data'), 'class' => 'fieldset-wide']
        );

        $fieldset->addField(
            'name',
            'text',
            ['name' => 'name', 'label' => __('Name'), 'nombre' => __('Name'), 'required' => true]
        );

        $fieldset->addField(
            'code',
            'text',
            ['name' => 'code', 'label' => __('Code'), 'codigo' => __('Code'), 'required' => true]
        );

        $fieldset->addField(
            'mime_content_type(filename)',
            'editor',
            [
                'name' => 'description',
                'label' => __('Descripcion'),
                'title' => __('Description'),
                'style' => 'height:36em',
                'required' => true
            ]
        );

        $fieldset->addField(
            'price',
            'text',
            array(
                'name' => 'price',
                'label' => __('Precio'),
                'title' => __('Precio'),
                'required' => true,
                'class' => 'validate-number'
            )
        );

        $fieldset->addField(
            'stock',
            'text',
            array(
                'name' => 'stock',
                'label' => __('Cantidad'),
                'title' => __('Cantidad'),
                'required' => true,
                'class' => 'validate-number'
            )
        );
        //$form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);
        return parent::_prepareForm();
    }
}