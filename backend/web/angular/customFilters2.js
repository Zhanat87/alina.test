angular.module("MyApp")
    // обратите внимание, что при указании модуля отсутствует второй аргумент - массив зависимостей
    // в данном случае это означает, что данный модуль лишь расширяет
    // функционал ранее объявленного модуля в файле с html разметкой
    .filter("changeCase", function () {
        // этот фильтр называется changeCase, он предназначен для форматирования строки
        // worker function принимает 2 аргумента:
        // 1) значение, которое нужно отфильтровать (значение будет передано angularjs, когда фильтр будет применен)
        // 2) позволяет применить обратное отображение для строки
        // (первая буква будет в нижнем регистре а остальные в верхнем)
        return function (value, isReverse) {
            if (angular.isString(value)) {
                // здесь используется метод isString для проверки:
                // строка ли входящее значение и если нет, то оно просто возвращается без изменений
                var processedValue = isReverse ? value.toUpperCase() : value.toLowerCase();
                return (isReverse ? processedValue[0].toLowerCase() : processedValue[0].toUpperCase()) + processedValue.substr(1);
            } else {
                return value;
            }
        };
    })
    .filter("skipItems", function () {
        // фильтр skipItems предназначен для того, чтобы пропустить
        // несколько элементов для отображения из массива данных,
        // в нем присутствует проверка isArray, которая проверяет,
        // чтобы аргумент был массивом и isNumber, которая проверяет что массив не пустой
        // далее после успешного прохождения проверок к массиву данных
        // применяется JavaScript функция slice
        return function (value, count) {
            if (angular.isArray(value) && angular.isNumber(count)) {
                if (count > value.length || count < 1) {
                    return value;
                } else {
                    return value.slice(count);
                }
            } else {
                return value;
            }
        }
    })
    .filter("change", function ($filter) {
        // сервис $filter используется для вызова функции фильтрации
        // фильтр change не обрабатывает данные, он просто служит оберткой
        return function (data, skipCount, takeCount) {
            var skippedData = $filter("skipItems")(data, skipCount);
            return $filter("limitTo")(skippedData, takeCount);
        }
    });