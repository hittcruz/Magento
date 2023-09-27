<?php
namespace Magento\Taskthird\Block\Favorites;

class Index extends \Magento\Framework\View\Element\Template
{
    protected $_pokemonFactory;
	public function __construct(
		\Magento\Framework\View\Element\Template\Context $context,
        \Magento\Taskthird\Model\PokemonFactory $pokemonFactory
	)
	{
		//$this->_alumnoFactory = $alumnoFactory;
        $this->_pokemonFactory = $pokemonFactory;
		parent::__construct($context);
	}
    public function getPokemonCollection(){
		$pokemon = $this->_pokemonFactory->create();
		return $pokemon->getCollection();
	}
}