(function($) {
	
	// Включаем строгий режим ECMA-Script
	"use strict";
	
	/**
	 * В скрипте мы будем выполнять AJAX-запросы к СУБД MySQL
	 * Чтобы каждый раз не писать один и тот же код AJAX-запроса, создадим 
	 * свой метод request в объекте jQuery
	 */
	$.extend({
		request: function( options ) {
			
			// В методе request будут различные опции (настройки)
			// Это своего рода настройки по умолчанию, созданные
			// в объекте options
			options = $.extend({
				
				type: "POST",					// Метод передачи данных серверу
				url: "requests.php",			// Путь к файлу со сценарием обращения к СУБД
				data: null,						// Данные, которые мы будем передавать серверу
				async: false,					// Асинхронность выполнения AJAX-запроса
				dataType: "json",				// Тип данных, в котором они передаются
				before: null,					// Код, выполняемый перед AJAX-запросом
				error: function() {},			// Код, выполняемый в случае какой-либо ошибки при AJAX-запросе
				complete: options.callback,		// Код, выполняемый после AJAX-запроса	
				success: function( result ) {	// Код, выполняемый после получения ответа от сервера
					$.response.result = result;	// Помещаем ответ от сервера в отдельный объект
				},
				result: null,					// Результат работы
				callback: null					// Функция обратного вызова
				
			}, options );
			
			options.before = function() {
				alert( "ok before" );
			};
			
			// Тело AJAX-запроса
			$.ajax({
				
				type: options.type,
				url: options.url,
				data: options.data,
				async: options.async,
				dataType: options.dataType,
				before: options.before,
				error: options.error,
				complete: options.complete,
				success: options.success
				
			});
			
			return this;
			
		},
		// Объект, в котором хранится ответ от сервера, полученный через AJAX-запрос
		response: {
			result: {}
		}
	});
	
	jQuery(function() {
		
		/**
		 *  При выборе производителя нужно сделать многое
		 *  Сначала из списка моделей должны быть удалены все имеющиеся модели автомобилей
		 *  Затем поле выбора модели автомобиля должно стать неактивным
		 */
		 
		// Обработчик события выбора производителя
		$( '#producer' ).change(function() {
			
			var producer_id = $( this ).val();	// Идентификатор выбранного производителя
			
			
			
			// Отключаем поле, установив значения свойства disabled
			$( '#model' ).prop( 'disabled', true )
			
			// Находим и удаляем все возможные модели автомобилей из раскрывающегося списка
			.find( 'option:not( :first )' ).remove();
			
			
			
			// Если был выбран конкретный производитель
			if ( producer_id != 0 ) {
				
				// Создаем AJAX-запрос, который вернет нам перечень моделей для выбранной марки 
				$.request({
					
					data: "request=getModels&producer_id=" + producer_id,
					
				});
				// Успешный AJAX-запрос должен закончиться вставкой полученного перечня моделей 
				// в раскрывающийся список select#model
				// Результат AJAX-запроса мы сохраняли в отдельном объекте
				var i = 0, models = $.response.result;
				for ( i; i < models.length; i++ ) {
					
					$( '#model' ).append( '<option value="' + models[ i ].id + '">' + models[ i ].model + '</option>' );
					
				}
				
				// Включаем поле со списком моделей
				$( '#model' ).prop( 'disabled', false );
				
			}
			
		}); // Обработчик события выбора производителя
	
	});
	
})(jQuery); // Используем немедленно вызываемую анонимную функцию