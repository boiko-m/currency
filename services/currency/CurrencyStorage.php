<?php

    namespace app\services\currency;

    use app\models\CurrencyForm;
    use Yii;
    use yii\db\Connection;

    class CurrencyStorage implements CurrencyInterface
    {

        const TABLE_NAME = 'currency';

        private $connection;

        public function __construct(Connection $connection)
        {
            $this->connection = $connection;
        }

        public function load($id = false)
        {
            return $id
                ? $this->connection->createCommand('SELECT * FROM currency WHERE id=:id')->bindValue(':id',
                    $id)->queryOne()
                : $this->connection->createCommand('SELECT * FROM currency')->queryAll();
        }

        public function save(array $items)
        {
            $this->connection->createCommand()->insert('currency', $items)->execute();
        }

        public function delete($id = false)
        {
            if ($id !== false) {
                $this->connection->createCommand()->delete(self::TABLE_NAME, "id = $id")->execute();
            } else {
                $this->connection->createCommand()->delete(self::TABLE_NAME)->execute();
            }
        }

        public function upd()
        {

            $currency = $this->getData("https://www.cbr.ru/scripts/XML_daily.asp");
            $this->delete();
            $this->connection->createCommand("ALTER TABLE " . self::TABLE_NAME . " AUTO_INCREMENT = 1")->execute();

            foreach ($currency->Valute as $cur) {

                $items = [
                    'name' => (string)$cur->Name,
                    'rate' => (string)$cur->Value
                ];

                $form = new CurrencyForm();
                $form->attributes = $items;

                if ($form->validate()) {

                    $this->save($items);

                    echo 'ok ' . $cur->Name . "\n";

                } else {
                    echo 'not ok ' . $cur->Name . "\n";
                }

            }
        }

        private function getData($url)
        {

            return $this->xmlParse($url);

        }

        private function xmlParse($url)
        {

            $context = stream_context_create(array('https' => array('header' => 'Accept: application/xml')));
            $xml = file_get_contents($url, false, $context);

            return simplexml_load_string($xml);

        }
    }