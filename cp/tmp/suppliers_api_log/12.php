<?php
defined('_ASTEXE_') or die('No access');
?>
<style>
pre
{
	white-space: pre-wrap;
	white-space: -moz-pre-wrap;
	white-space: -pre-wrap;
	white-space: -o-pre-wrap;
	word-wrap: break-word;
	max-height: 600px;
}
</style>
<div class="col-lg-12"><div class="hpanel hgreen"><div class="panel-heading hbuilt">Информация о логе</div><div class="panel-body"><p>Начат 29.03.2023 15:42:28</p><p>Поставщик: forum</p><p>Лог начат в forum_auto/common_interface.php</p><p>Обращение к API работает через SOAP</p></div></div></div><div class="col-lg-12"><div class="hpanel panel-collapse"><div class="panel-heading hbuilt" style="background-color:#ff0000;color:#FFF;">ИСКЛЮЧЕНИЕ (в обработчике forum_auto/common_interface.php): "Исключение" <div class="panel-tools"><a class="showhide"><i class="fa fa-chevron-down" style="color:#FFF;"></i></a></div></div><div class="panel-body" style="display:none;"><p>Сообщение:</p><pre>Доступ к сервису запрещен.</pre><p>Объект исключения:</p><pre>SoapFault Object
(
    [message:protected] => Доступ к сервису запрещен.
    [string:Exception:private] => 
    [code:protected] => 0
    [file:protected] => /home/a/avtosvett2/public_html/content/shop/docpart/suppliers_handlers/forum_auto/common_interface.php
    [line:protected] => 35
    [trace:Exception:private] => Array
        (
            [0] => Array
                (
                    [file] => /home/a/avtosvett2/public_html/content/shop/docpart/suppliers_handlers/forum_auto/common_interface.php
                    [line] => 35
                    [function] => __call
                    [class] => SoapClient
                    [type] => ->
                    [args] => Array
                        (
                            [0] => listGoods
                            [1] => Array
                                (
                                    [0] => 492494_kazaninaIP
                                    [1] => JaRHiztLnQAK
                                    [2] => BKR6E11
                                    [3] => 1
                                )

                        )

                )

            [1] => Array
                (
                    [file] => /home/a/avtosvett2/public_html/content/shop/docpart/suppliers_handlers/forum_auto/common_interface.php
                    [line] => 125
                    [function] => __construct
                    [class] => forum_auto_enclosure
                    [type] => ->
                    [args] => Array
                        (
                            [0] => BKR6E11
                            [1] => Array
                                (
                                    [login] => 492494_kazaninaIP
                                    [password] => JaRHiztLnQAK
                                    [client_id] => 492494
                                    [color] => #9c9696
                                    [probability] => 100
                                    [markups] => Array
                                        (
                                            [0] => 0
                                        )

                                    [office_id] => 4
                                    [storage_id] => 12
                                    [additional_time] => 0
                                    [office_caption] => 20-Летия Октября, 36
                                    [storage_caption] => 
                                    [rate] => 1
                                    [group_id] => 2
                                )

                        )

                )

        )

    [previous:Exception:private] => 
    [faultstring] => Доступ к сервису запрещен.
    [faultcode] => 11
    [detail] => Клиент найден в системе, но нет разрешения для выполнения данной операции.
)
</pre></div></div></div>