<?php

namespace common\my\helpers;

use Yii;
use yii\base\Exception;
use DateTime;
use yii\helpers\ArrayHelper;

/**
 * Class Current
 * @package common\my\helpers
 * текущий помощник конкретного проекта
 */
class Current
{

    public function immortal()
    {
        set_time_limit(0);
        ini_set('memory_limit', '-1');
    }

    public function getPageSize()
    {
        return intval(Yii::$app->request->getQueryParam('pageSize')) ? : Yii::$app->params['pageSize'];
    }

    public function getAnswers($answer = false)
    {
        $answers = [
            1 => 'Да',
            0 => 'Нет',
        ];
        return $answer !== false ? $answers[(int) $answer] : $answers;
    }

    public function getStatuses($status = NULL)
    {
        $statuses = [
            1 => 'Опубликовано',
            0 => 'Не опубликовано',
        ];
        return $status !== NULL ? $statuses[$status] : $statuses;
    }

    public function getLabel($k = NULL)
    {
        $values = [
            1  => 'success',
            0  => 'danger',
            -1 => 'default',
            // для состояний заявки
            2  => 'info',
            3  => 'warning',
            4  => 'primary',
            5  => 'default',
        ];
        return $k !== NULL ? $values[$k] : 'success';
    }

    public function defaultValue($data, $filter = true)
    {
        return array_replace(['' => $filter ? 'Все' : ''], $data);
    }

    public function getDate($date = NULL)
    {
        return $date !== NULL ? $date : date(Yii::$app->params['format']['date']);
    }

    public function getDateInterval($date)
    {
        list($day, $month, $year) = explode('/', $date);
        $startDate = $year . '-' . $month . '-' . $day . ' 00:00:00';
        $endDate = $year . '-' . $month . '-' . $day . ' 23:59:59';
        return [$startDate, $endDate];
    }

    public function getDateRangeInterval($date, $withTime = true)
    {
        list($dateFrom, $dateTo) = explode(' - ', $date);
        list($dayFrom, $monthFrom, $yearFrom) = explode('/', $dateFrom);
        $startDate = $yearFrom . '-' . $monthFrom . '-' . $dayFrom . ($withTime ? ' 00:00:00' : null);
        list($dayTo, $monthTo, $yearTo) = explode('/', $dateTo);
        $endDate = $yearTo . '-' . $monthTo . '-' . $dayTo . ($withTime ? ' 23:59:59' : null);
        return [$startDate, $endDate];
    }

    public function setDate($date = null, $withTime = true)
    {
        if (!$date) {
            return date(Yii::$app->params['format']['db']['date' . ($withTime ? 'Time' : '')]);
        }
        $pattern = '/(\d\d)\.(\d\d)\.(\d\d\d\d) \((\d\d):(\d\d)\)/';
        $pattern2 = '/(\d\d)\.(\d\d)\.(\d\d\d\d)/';
        $pattern3 = '/(\d\d\d\d)-(\d\d)-(\d\d) (\d\d):(\d\d):(\d\d)/';
        $pattern4 = '/(\d\d\d\d)-(\d\d)-(\d\d)/';
        if ((strlen($date) == 19 && preg_match($pattern3, $date, $matches)) ||
            (strlen($date) == 10 && preg_match($pattern4, $date, $matches))) {
            return $date;
        } else if (strlen($date) == 18 && preg_match($pattern, $date, $matches)) {
            return $matches[3] . '-' . $matches[2] . '-' . $matches[1] . ' ' . $matches[4] . ':' . $matches[5] . ':00';
        } else if (strlen($date) == 10 && preg_match($pattern2, $date, $matches)) {
            return $matches[3] . '-' . $matches[2] . '-' . $matches[1];
        }
        $message = 'Указан не верный формат даты!' .
            (YII_DEBUG ? "\r\nтекущее значение - $date" : '');
        throw new Exception($message, 500);
    }

    public function getDateTimeFromDb($v, $withTime = true)
    {
        return $v ? (new DateTime())
            ->createFromFormat(Yii::$app->params['format']['db']['date' . ($withTime ? 'Time' : '')], $v)
            ->format(Yii::$app->params['format']['date' . ($withTime ? 'Time' : '')]) : null;
    }

    public function setDateTimeForDb($v, $withTime = true)
    {
        return $v ? (new DateTime())
            ->createFromFormat(Yii::$app->params['format']['date' . ($withTime ? 'Time' : '')], $v)
            ->format(Yii::$app->params['format']['db']['date' . ($withTime ? 'Time' : '')]) : null;
    }

    public function getInitials($surname, $name, $patronymic)
    {
        $initials = '';
        if ($surname || $name || $patronymic) {
            $initials .= $surname ? String::mb_ucfirst($surname) . ' ' : '';
            $initials .= $name ? String::mb_ucfirst2($name) . '. ' : '';
            $initials .= $patronymic ? String::mb_ucfirst2($patronymic) . '.' : '';
            return trim($initials);
        }
        return;
    }

    public function getDateTimeForDb()
    {
        return (new DateTime())->format(Yii::$app->params['format']['db']['dateTime']);
    }

    public function getValueForGrid($data, $key)
    {
        return ArrayHelper::getValue($data, $key, '(не задано)');
    }

    public function showPdfFile($pathToFile)
    {
        if (!file_exists($pathToFile)) {
            throw new \Exception('Такого файла не существует!', 400);
        }
        $this->immortal();
        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="' . basename($pathToFile) . '"');
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . filesize($pathToFile));
        header('Accept-Ranges: bytes');
        readfile($pathToFile);
    }

}