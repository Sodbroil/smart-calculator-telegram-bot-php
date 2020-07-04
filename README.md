# Умный калькулятор у бота Telegram

[Демо](https://t.me/SodbroilSmartCalculatorBot)

1. Чтобы использовать данного бота, вам нужно установить неофициальную библиотеку для работы с Telegram: [telegram-bot-sdk](https://github.com/irazasyed/telegram-bot-sdk).

2. Для установки через composer используйте команду: 
```
composer require irazasyed/telegram-bot-sdk
```
3. Создайте своего бота у [BotFather](https://t.me/BotFather), и после получения скопируйте Token и вставьте его в вот это поле:
```
$telegram = new Api('Token');
```
4. После данной операции, вам не обходимо активать WebHooK. Ссылка для активации:
https://api.telegram.org/botТОКЕН/setWebHook?url=https://адрес_сайта/путь_к_файлу_бота
---

Ссылки:

Telegram: [Sodbroil](https://t.me/sodbroil)

VK: [Sodbroil](https://vk.com/sodbroil)
