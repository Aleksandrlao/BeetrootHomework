<?php
// Создать класс User у которого вы будете вызывать метод getSettings и
// класс Setting которому вы делегируете реалазацию этого метода.

/* Как пример: гость в отеле, в настройках дополнительные заказанные услуги*/

class Setting {
    protected $wifi;
    protected $tv;
    protected $boyWithWings;

    public function __construct($wifi, $tv, $boyWithWings)
    {
        $this->wifi = $wifi ? 'В номере есть Wi-fi' : 'В номере нет Wi-fi';
        $this->tv = $tv ? 'Спутниковое ТВ' : 'без ТВ';
        $this->boyWithWings = $boyWithWings ? 'Мальчик с апохалом' : 'Без прислуги';
    }

    public function getSetting()
    {
        return array(
            'wi-fi' =>  $this->wifi,
            'tv' => $this->tv,
            'boyWithWings' =>$this->boyWithWings
        );
    }


}

class User {
    protected $name;
    protected $type;
    protected $setting;

    public function __construct($name, $type, $setting)
    {
        $this->name = $name;
        $this->type = $type;
        $this->setting = $setting;
    }

    public function __get($prop)
    {
        return $this->$prop;
    }

    public function __call($method, $arguments) // принимает название метода и агрументы (в виде массива)
    {
        if(method_exists($this->setting, $method)) // проверка наличие метода у объекта, переданного через параметр
        {
            return call_user_func_array(array($this->setting, $method), $arguments); // возвращает результат работы
                // пользовательской функции (в данном случае метод объекта) и переданными параметрами ($chipoSetting)
        }
    }


}


$chipoSetting = new Setting(1, 0, 0);
$chipo = new User('Chipolino', 'Lux', '21.08.2018', '25.08.2018', $chipoSetting);


echo $chipo->name . '. Выбрал номер: ' . $chipo->type . ', с такими дополнительными услугами:';
foreach ( $chipo->getSetting() as $item) {
    echo '<br>'.$item;
}

