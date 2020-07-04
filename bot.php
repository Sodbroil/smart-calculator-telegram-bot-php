<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
include('vendor/autoload.php'); // подключаем библиотеку
use Telegram\Bot\Api;
use Telegram\Bot\Keyboard\Keyboard;


$telegram = new Api('1095827980:AAG9PJoIqoIbTOH0BWfYyXcvzgIvWCctYDc');
$result = $telegram->getWebhookUpdates();
$result = json_decode($result, True);

$chat_id = $result['message']['chat']['id']; // получаем ид чата
$text = $result['message']['text']; // получаем сообщения


if($text == "/start"){
    $keyboard = Keyboard::make(['resize_keyboard' => true])->row(Keyboard::Button(['text' => "О боте"]), (['text' => "Как пользоваться?"]));
    $telegram->sendMessage([
        'chat_id' => $chat_id, //Required
        'text' => 'Привет, это умный бот калькулятор, который сможет тебе помочь.', //Required
        'parse_mode' => 'HTML', //Optional (HTML or markdown)
        'reply_markup' => $keyboard,
    ]);

}

if($text == "О боте"){
    $keyboard = Keyboard::make(['resize_keyboard' => true])->row(Keyboard::Button(['text' => "О боте"]), (['text' => "Как пользоваться?"]));
    $reply = "Привет. Видно ты захотел узнать информацию о боте. Тогда слушай внимательно)\nЭтот бот был создан исключительно для помощи людям, которым срочно нужен калькулятор. Что умеет данный бот? Он умеет: Складывать, вычитать, умножать, делить, делить по модулю, возводить в степень\nДанный бот разработал: @Sodbroil (Никита Давлетшин)";
    $telegram->sendMessage([
        'chat_id' => $chat_id, //Required
        'text' => $reply, //Required
        'parse_mode' => 'HTML', //Optional (HTML or markdown)
        'reply_markup' => $keyboard,
    ]);
}

if($text == "Как пользоваться?"){
    $keyboard = Keyboard::make(['resize_keyboard' => true])->row(Keyboard::Button(['text' => "О боте"]), (['text' => "Как пользоваться?"]));
    $reply = "Привет, видно ты захотел узнать как использовать данного бота?\nТогда читай. Чтобы получить нужный ответ, просто напиши 'Калькулятор [цифра1] (знак операции) [цифра2]'. Знак операции обязателен. Вот вам пример: 'Калькулятор 1 + 1'";
    $telegram->sendMessage([
        'chat_id' => $chat_id, //Required
        'text' => $reply, //Required
        'parse_mode' => 'HTML', //Optional (HTML or markdown)
        'reply_markup' => $keyboard,
    ]);
}

if($text == "Калькулятор"){
    $keyboard_1 = Keyboard::make(['resize_keyboard' => true])->row(Keyboard::Button(['text' => "Как пользоваться?"]));
    $reply = "Видно ты еще не прочитал как им пользоваться. Тогда нажми на кнопку ниже, и прочитай. Мы там все подробно расписали!";
    $telegram->sendMessage([
        'chat_id' => $chat_id, //Required
        'text' => $reply, //Required
        'parse_mode' => 'HTML', //Optional (HTML or markdown)
        'reply_markup' => $keyboard_1
    ]);
}


if(preg_match('/(Калькулятор)|(Реши)/', $text)) {
    $calc = explode(" ", $text);
    $calc_1 = $calc[0];
    $calc_2 = $calc[1];
    $calc_3 = $calc[2];
    $calc_4 = $calc[3];
    $calc_result_plus = $calc_2 + $calc_4;
    $calc_result_minus = $calc_2 - $calc_4;
    $calc_result_multiplication = $calc_2 * $calc_4;
    $calc_result_division = $calc_2 / $calc_4;
    $calc_result_module = $calc_2 % $calc_4;
    $calc_result_power = $calc_2 ** $calc_4;
    $reply = "Сложение: $calc_result_plus\nВычитание: $calc_result_minus\nУмножение: $calc_result_multiplication\nДеление: $calc_result_division\nДеление по модулю: $calc_result_module\nСтепень: $calc_result_power";
    $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply]);
}
