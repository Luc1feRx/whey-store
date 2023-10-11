<?php

namespace App\Helpers;


use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

class Common
{
    const CREATED_BY_USER = 1;
    const CREATED_BY_SYSTEM = 2;

    /*
    * Get Distance
    */
    public static function checkUsernameOrEmail($str)
    {
        $check_is_email = strpos($str, '@');
        if (isset($check_is_email)) return true;
        return false;
    }


    public static function truncate($string, $length = 40, $char = '...')
    {
        return Str::limit($string, $length, $char);
    }

    /*
    * Show all action data
    * @param Object $data
    * @param String $model
    * @param String $url
    * @return String $view
    */
    public static function showDataAction($data, $model, $url)
    {
        $html = '<a href="' . $url . '" class="btn btn-icon btn-sm btn-primary tip"><i class="fa fa-pencil-square-o"></i></a>&ensp;';
        if ($data->status) :
            $html .= '<a href="javascript:void(0);" data-id="' . $data->id . '" data-model="' . $model . '" class="btn btn-icon btn-sm btn-danger deleteDialog tip"><i class="fa fa-trash"></i></a>';
        else:
            $html .= '<a href="javascript:void(0);" data-id="' . $data->id . '" data-model="' . $model . '" class="btn btn-icon btn-sm btn-info restoreDialog tip" data-toggle="tooltip" title="' . __('admin::messages.common.restore') . '"><i class="fa fa-refresh"></i></a>';
        endif;
        return $html;
    }

    /*
    * Check status
    */
    public static function checkStatus($status)
    {
        $html = '';
        switch ($status) {
            case '0':
                $html .= '<span class="label-danger status-label">Deactive</span>';
                break;
            case '1':
                $html .= '<span class="label-success status-label">Active</span>';
                break;
            default:
                # code...
                break;
        }
        return $html;
    }

    /*
    * Recursion Categories
    */
    public static function showCategories($menus, $id_parent = 0, $arg_check = array())
    {
        # Lấy danh sách có parent bằng 0 ( menu cha )
        $menu_tmp = array();
        foreach ($menus as $key => $item) {
            # Nếu có parent_id bằng với parrent id hiện tại
            if ((int)$item['parent_id'] == (int)$id_parent) {
                $menu_tmp[] = $item;
                // Sau khi thêm vào biên lưu trữ menu ở bước lặp thì unset nó ra khỏi danh sách menu ở các bước tiếp theo
                unset($menus[$key]);
            }
        }
        # BƯỚC 2: lẶP MENU THEO DANH SÁCH MENU Ở BƯỚC 1 Điều kiện dừng của đệ quy là cho tới khi menu không còn nữa
        if ($menu_tmp) {
            echo '<ul>';
            foreach ($menu_tmp as $item) {
                echo '<li value="' . $item['id'] . '">';
                if (in_array($item['id'], $arg_check)) {
                    echo '<label><input checked class="category-checkbox" type="checkbox" value="' . $item['id'] . '" name="categories[]" >&nbsp;&nbsp;' . $item['name'] . '</label>';
                } else {
                    echo '<label><input class="category-checkbox" type="checkbox" value="' . $item['id'] . '" name="categories[]" >&nbsp;&nbsp;' . $item['name'] . '</label>';
                }
                // Truyền vào danh sách menu chưa lặp và id parent của menu hiện tại
                self::showCategories($menus, $item['id'], $arg_check);
                echo '</li>';
            }
            echo '</ul>';
        }
    }

    /*
    * number format price
    */
    public static function numberFormat($n)
    {
        $output = '.';
        return str_replace(",", $output, number_format($n));
    }

    /**
     * trim space fullsize + space halfsize
     *
     * @param string $str
     * @return string | mixed
     */
    public static function trimSpaces($str)
    {
        if (is_string($str) && $str) {
            $chars = '\s　';
            $str = preg_replace("/^[$chars]+/u", '', $str);
            $str = preg_replace("/[$chars]+$/u", '', $str);
        }

        return $str;
    }

    /**
     * @param $amout
     * @return mixed|string
     */
    public function formatAmount($amout)
    {
        $amountVTCPay = str_replace(',', '', $amout);
        $amountVTCPay = str_replace('.', '', $amountVTCPay);
        $amountVTCPay = strip_tags($amountVTCPay);
        $amountVTCPay = Common::trimSpaces($amountVTCPay);
        return $amountVTCPay;
    }

    /**
     * Escape string in query like
     *
     * @param String $string
     * @return string
     */
    public static function escapeLike($string): string
    {
        $arySearch = array('\\', '%', '_');
        $aryReplace = array('\\\\', '\%', '\_');
        return str_replace($arySearch, $aryReplace, $string);
    }

    /**
     * Escape string in query like
     *
     * @param String $string
     * @return string
     */
    public static function limitLength($string, $length): string
    {
        $subfix = '';
        if (strlen($string) > $length) {
            $subfix = '...';
        }
        return substr($string, 0, $length) . $subfix;
    }

    /**
     * Show work schedule
     *
     * @param array $datas
     */
    public static function handleUploadFile($uploadPath, $name, $request)
    {
        $fullPath = '';
        if (!$request->hasFile($name)) {
            return $fullPath;
        }
        $file = $request->file($name);
//        $saveName = $file->hashName();
        $saveName = date('YmdHis') . '_' . sha1(Str::uuid()) . '.' . $file->getClientOriginalExtension();
        $fullPath = $uploadPath . $saveName;
        if (!Storage::disk()->exists($uploadPath)) {
            Storage::disk()->makeDirectory($uploadPath);
        }
        Storage::disk()->put($fullPath, file_get_contents($file));
        return $fullPath;
    }

    /**
     * format Day Of Week
     *
     * @param String $string
     * @return string
     */
    public static function formatDayOfWeek($n)
    {
        return $n + 1;
    }

    /**
     * format Time
     *
     * @param $time
     * @param $esTime
     * @return array
     */
    public static function formatTime($time, $esTime)
    {
        $time = json_decode($time, true);
        $esTime = $esTime['time'];
        $arrTime = [];
        foreach ($time as $val) {
            $from = explode(':', $val['from']);
            $to = explode(':', $val['to']);
            $timeFrom = $from[0] * 3600 + $from[1] * 60;
            $timeTo = $to[0] * 3600 + $to[1] * 60;
            $loopWhile = true;
            while ($loopWhile == true) {
                $countTime = $timeFrom + $esTime * 60;
                if ($countTime > $timeTo) {
                    $loopWhile = false;
                } else {

                    $arrTime[] = [
                        'from' => Common::secondToHhmm($timeFrom),
                        'to' => Common::secondToHhmm($countTime)
                    ];
                    $timeFrom = $countTime;
                }
            }
        }
        return $arrTime;
    }

    /**
     * format hour
     *
     * @param $time
     * @return string
     */
    public static function secondToHhmm($time)
    {
        $hour = floor($time / 3600);
        $minute = strval(floor(($time % 3600) / 60));
        if ($hour < 10) {
            $hour = '0' . $hour;
        }
        if ($minute < 10) {
            $minute = '0' . $minute;
        }
        if ($minute == 0) {
            $minute = "00";
        }
        $time = $hour . ":" . $minute;
        return $time;
    }

    /**
     * format test
     * @param $data
     * @return array|object
     */
    public static function formatDataTestDefault($data)
    {
        $dataFormat = [];
        foreach ($data as $key => $item) {
            $dataFormat[] = $item->content;
        }
        $collection = new Collection($dataFormat);
        $collapsed = $collection->collapse();
        $multiplied = $collapsed->map(function ($item) {
            if (isset($item['amount'])) {
                return $item;
            }
        })->pluck('code')->countBy()->sortDesc();
        $firstData = $multiplied->filter(function ($value, $key) {
            return $key != '';
        })->keys()->first();
        if (empty($firstData)) {
            return (object)null;
        }
        return self::formatDataTest([$firstData], $data, config('constants.lengthUserTest'));
    }

    /**
     * format hour
     *
     * @param $result
     * @param $data
     * @param string $length
     * @return array
     */

    public static function formatDataTest($result, $data, $length = '')
    {
        $dataNew = [];
        foreach ($result as $val) {
            if ($val != '') {
                $val = trim($val);
                $dataNew[]['test_id'] = $val;
                $parentKey = array_key_last($dataNew);
                foreach ($data as $key => $item) {
                    $dataFormat = $item->content;
                    $collection = new Collection($dataFormat);
                    $test = $collection->where('code', $val);
                    $a = $test->all();
                    if (!empty($a)) {
                        $aKey = array_key_first($a);
                        if (isset($a[$aKey]['amount'])) {
                            if (!is_numeric($a[$aKey]['amount']) || $a[$aKey]['amount'] == '') {
                                $a[$aKey]['amount'] = preg_replace('/[^0-9.]/', '', $a[$aKey]['amount']);
                                $a[$aKey]['amount'] = $a[$aKey]['amount'] != '' ? $a[$aKey]['amount'] : null;
                            }
                            $dataNew[$parentKey]['data'][] = [
                                'name' => $a[$aKey]['name'],
                                'code' => (float)$a[$aKey]['amount'],
                                'date' => $item->examination_date,
                            ];
                        }

                    }
                }
            }
        }
        if (is_numeric($length) && count($dataNew) == 1) {
            $dataNew = $dataNew[0];
            if (isset($dataNew['data']) && count($dataNew['data']) > $length) {
                $dataNewTest = new Collection($dataNew['data']);
                $dataNewTest = $dataNewTest->slice(count($dataNew['data']) - $length, $length)->all();
                $dataNew['data'] = array_merge([], $dataNewTest);
            }
        } else {
            $dataNew = array_map(function ($item) {
                if (isset($item['data'])) {
                    $item['data'] = array_map(function ($item2) {
                        if (isset($item2['date'])) {
                            $item2['date'] = Carbon::parse($item2['date'])->format('d-m');
                        }
                        return $item2;
                    }, $item['data']);
                }
                return $item;
            }, $dataNew);
        }
        return $dataNew;
    }

    /**
     * format hour
     *
     * @param $last_version_db
     * @param $app_version
     * @return bool
     */
    public static function checkAppVersion($last_version_db, $app_version)
    {
        $arr_last_version_db = explode(".", $last_version_db);
        $arr_app_version = explode(".", $app_version);
        if (count($arr_last_version_db) != count($arr_app_version)) {
            return false;
        }
        foreach ($arr_app_version as $key => $value) {
            $app_version_value = (int)$arr_app_version[$key];
            $last_version_db_value = (int)$arr_last_version_db[$key];
            if ($app_version_value > $last_version_db_value) {
                return true;
            }
            if ($app_version_value < $last_version_db_value) {
                return false;
            }
        }
        return true;
    }

    /**
     * format d-m
     *
     * @param $data
     * @return bool
     */
    public static function formatDayMonth($data)
    {
        foreach ($data as $key => $value) {
            $result = explode("-", $value);
            $data[$key] = $result[1] . '-' . $result[0];
        }
        return $data;
    }

    /**
     * get file
     * @param $filePath
     * @return string
     */
    public static function getFile($filePath = null){
        return route('api.getFile', ['filePath' => $filePath]);
    }

    /** format phone
     *
     * @param $phone
     * @return string
     */

    public static function formatPhone($phone)
    {
        $phone = preg_replace('/[^0-9]/', '',$phone);
        $phone = preg_replace('/^84/', '0', $phone);
        return $phone;
    }

    /**
     * check phone
     *
     * @param $phone
     * @return string
     */

    public static function checkPhone($phone)
    {
        return preg_match("/^(0|84|\+84|\+\(84\)|\(\+84\)|\(84\))((\d{9})|(\d{3} \d{3} \d{3})|(\d{3}\-\d{3}\-\d{3})|(\d{3}\.\d{3}\.\d{3}))$/", $phone);
    }

    /**
     * check mail
     *
     * @param $email
     * @return string
     */

    public static function checkMail($email)
    {
        return preg_match("/^(([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9])+)$/", $email);
    }

    /**
     * check phone
     *
     * @param $data
     * @param $column
     * @return array
     */

    public static function formatPhoneColumn($data, $column)
    {
        if (self::checkPhone($data)) {
            $column = DB::raw('(CONCAT("0", SUBSTR(phone, -9)))');
            $data = self::formatPhone($data);
        }
        return [$data, $column];
    }
}
