<?php
namespace Dfe\KlarnaC;
use Klarna\Core\Api\BuilderInterface as IB;
use Klarna\Core\Api\OrderLineInterface as IOL;
use Klarna\Core\Helper\DataConverter as H;
use Klarna\Core\Model\Api\Builder as B;
use Klarna\Core\Model\Checkout\Orderline\AbstractLine as AL;
use Magento\Quote\Model\Quote\Address\Total as T;
/**
 * 2019-09-17
 * @see \Dfe\KlarnaC\OL\AheadWorks\CustomerBalance
 * @see \Dfe\KlarnaC\OL\AheadWorks\GiftCard
 * @see \Dfe\KlarnaC\OL\AheadWorks\Reward
 */
abstract class OL implements IOL {
	/**
	 * 2019-09-17
	 * @used-by fetch()
	 * @see \Dfe\KlarnaC\OL\AheadWorks\CustomerBalance::id()
	 * @see \Dfe\KlarnaC\OL\AheadWorks\GiftCard::id()
	 * @see \Dfe\KlarnaC\OL\AheadWorks\Reward::id()
	 * @return string
	 */
	abstract protected function id();

	/**
	 * 2019-09-17
	 * @final Unable to use the PHP «final» keyword here because of the M2 code generation.
	 * @override
	 * @see AL::collect()
	 * @see IOL::collect()
	 * @param IB|B $b
	 * @return $this
	 */
	function collect(IB $b) {return $this;}

	/**
	 * 2019-09-17
	 * @final Unable to use the PHP «final» keyword here because of the M2 code generation.
	 * @override
	 * @see AL::isIsTotalCollector()
	 * @see IOL::isIsTotalCollector()
	 * @return bool
	 */
	function isIsTotalCollector() {return true;}

	/**
	 * 2019-09-17
	 * @override
	 * @see AL::collect()
	 * @see IOL::collect()
	 * @param IB|B $b
	 * @return $this
	 */
	function fetch(IB $b) {
		$h = df_o(H::class); /** @var H $h */
		if (($t = dfa($b->getObject()->getTotals(), $this->id())) && ($a = $h->toApiFloat($t->getValue()))) {
			/** @var T|null $t *//** @var int $a */
			$b->addOrderLine([
				'name' => $t->getTitle()
				,'quantity' => 1
				,'reference' => $t->getCode()
				,'tax_rate' => 0
				,'total_amount' => $a
				,'total_tax_amount' => 0
				,'type' => $t->getCode()
				,'unit_price' => $a
			]);
		}
		return $this;
	}

	/**
	 * 2019-09-17
	 * @final Unable to use the PHP «final» keyword here because of the M2 code generation.
	 * @override
	 * @see AL::getCode()
	 * @see IOL::getCode()
	 * @return string
	 */
	function getCode() {return $this->_code;}

	/**
	 * 2019-09-17
	 * @final Unable to use the PHP «final» keyword here because of the M2 code generation.
	 * @override
	 * @see AL::getCode()
	 * @see IOL::getCode()
	 * @param string $v
	 * @return $this
	 */
	function setCode($v) {$this->_code = $v; return $this;}

	/**
	 * 2019-09-17
	 * @used-by getCode()
	 * @used-by setCode()
	 * @var string
	 */
	private $_code;
}