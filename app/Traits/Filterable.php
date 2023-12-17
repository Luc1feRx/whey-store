<?php

namespace App\Traits;

use App\Helpers\Common;
use Illuminate\Support\Str;

trait Filterable
{
    /**
     * @param array $param
     * @param object $query
     * @return object
     */
    public function scopeFilter($query, $param)
    {
        foreach ($param as $field => $value) {
            $method = 'filter' . Str::studly($field);

            if ($value === '') {
                continue;
            }

            if (method_exists($this, $method)) {
                $this->{$method}($query, $value);
                continue;
            }

            if (empty($this->filterable) || !is_array($this->filterable)) {
                continue;
            }

            if (key_exists($field, $this->filterable)) {
                $keywordValue = $this->filterable[$field];

                if (count($keywordValue) == 0) {
                    continue;
                }
                if ($field == 'keyword' && is_array($keywordValue)) {
                    $query->where(function ($query) use ($keywordValue, $value) {
                        $valueEscapeLike = Common::checkPhone($value) ? Common::formatPhone($value) : Common::escapeLike($value);
                        $query->where($this->table . '.' . $keywordValue[0], 'like', '%' . $valueEscapeLike . '%');                       
                        unset($keywordValue[0]);
                        foreach ($keywordValue as $result) {
                            $query->orWhere($this->table . '.' . $result, 'like', '%' . $valueEscapeLike . '%');
                        }
                    });
                } else {
                    $query->where($this->table . '.' . $this->filterable[$field], $value);
                }
                continue;
            }
        }
        return $query;
    }

    /**
     * @param $value
     * @param object $query
     * @return object
     */
    public function scopeFilterDelete($query, $value)
    {
        $field = 'deleted_at';
            $method = 'filter' . Str::studly($field);

        if ($value === '') {
            return $query;
        }
        if (method_exists($this, $method)) {
            $this->{$method}($query, $value);
            return $query;
        }
        if ($field == 'deleted_at' && is_null($value) || ($value != 1 && $value != 2)) {
            return $query;
        }
        if ($field == 'deleted_at' && $value == 1) {
            $query->onlyTrashed();
            return $query;
        }
        if ($field == 'deleted_at' && $value == 2) {
            $query->withTrashed();
            return $query;
        }
        $query->whereNotnull($this->table . '.' . $field);
        return $query;
    }
}
