<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $guard = 'orders';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    const PENDING = 3;
    const CANCEL = 0;
    const SUCCESS = 2;
    
    const RECEIVE = 1;


    public static function getStatus($status)
    {
        $html ='';
        switch ($status) {
            case self::RECEIVE:
                $html.="<span class='badge badge-primary'>Tiếp nhận</span>";
                break;
            case self::SUCCESS:
                $html.="<span class='badge badge-success'>Thành công</span>";
                break;
            case self::PENDING:
                $html .= "<span class='badge badge-warning'>Đang vận chuyển</span>";
                break;
            case self::CANCEL:
                $html .= "<span class='badge badge-warning'>Hủy đơn hàng</span>";
                break;
        }
        return $html;
    }
}
