<?php

    namespace app\services\currency;

    interface CurrencyInterface
    {
        /**
         * @return array
         * @param int
         */
        public function load($id);

        /**
         * @param array
         */
        public function save(array $items);

        /**
         */
        public function upd();

        /**
         * @param int
         */
        public function delete($id);

    }