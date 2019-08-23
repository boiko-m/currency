<?php

    namespace app\services\currency;

    use app\services\currency\CurrencyInterface;

    class Currency
    {
        private $storage;

        private $_items = [];

        public function __construct(CurrencyInterface $storage)
        {
            $this->storage = $storage;
        }

        public function createCur($name, $rate)
        {
            $dto = ['name' => $name, 'rate' => $rate];
            $this->storage->save($dto);
        }

        public function remove($id)
        {
            $this->storage->delete($id);
        }

        public function itemsUpdate()
        {
            $this->storage->upd();
        }

        public function getItems()
        {
            $this->loadItems();
            return $this->_items;
        }

        public function getItem($id)
        {
            $this->loadItem($id);
            return $this->_items;
        }

        private function loadItems(){
            $this->_items = $this->storage->load();
        }

        private function loadItem($id){
            $this->_items = $this->storage->load($id);
        }

    }