<?php

namespace common\my\traits;

use Yii;
use yii\db\Query;

/**
 * Class CachedKeyValueData
 * @package common\my\traits
 */
trait CachedKeyValueData
{

    public static function getCachedKeyValueData(
        $table,
        $columns,
        $where,
        $key,
        $defaultValue = [],
        $isAssoc = true
    )
    {
        if (($data = Yii::$app->cache->get($table . $key)) === false) {
            $data = $defaultValue;
            $rows = (new Query)
                ->select($columns)
                ->from($table)
                ->where($where)
                ->all();
            if ($rows) {
                $columnsCount = count($columns);
                foreach ($rows as $row) {
                    switch ($columnsCount) {
                        case 1 :
                            $v = $row[$columns[0]];
                            break;
                        case 2 :
                            $v = $row[$columns[1]];
                            break;
                        default :
                            if ($isAssoc) {
                                $v = [];
                                for ($i = 1; $i < $columnsCount; ++$i) {
                                    $v[$columns[$i]] = $row[$columns[$i]];
                                }
                            } else {
                                $v = '';
                                for ($i = 1; $i < $columnsCount; ++$i) {
                                    $v .= $row[$columns[$i]] . ',';
                                }
                                $v = explode(',', $v);
                            }
                            break;
                    }
                    $data[$row[$columns[0]]] = $v;
                }
            }
            Yii::$app->cache->set($table . $key, $data, 86400);
        }
        return $data;
    }

}