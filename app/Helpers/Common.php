<?php

namespace App\Helpers;


use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

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
     * check mail
     *
     * @param $email
     * @return string
     */

    public static function checkMail($email)
    {
        return preg_match("/^(([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9])+)$/", $email);
    }

    public static function getIp()
    {
        $args = [
            'HTTP_CLIENT_IP',
            'HTTP_X_FORWARDED_FOR',
            'HTTP_X_FORWARDED',
            'HTTP_X_CLUSTER_CLIENT_IP',
            'HTTP_FORWARDED_FOR',
            'HTTP_FORWARDED',
            'REMOTE_ADDR'
        ];
        foreach ($args as $key) {
            if (!key_exists($key, $_SERVER)) {
                continue;
            }

            Log::info($_SERVER[$key]);
            foreach (explode(',', $_SERVER[$key]) as $ip) {
                $ip = trim($ip);
                if (strpos($ip, ':') !== false) {
                    $data = explode(":", $ip);
                    $ip = $data[0];
                }
                if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                    return $ip;
                }
            }
        }

        return "";
    }
}
