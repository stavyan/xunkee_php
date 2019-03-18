<?php

/*
 * This file is part of the Qsnh/meedu.
 *
 * (c) XiaoTeng <616896861@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Addons extends Model
{
    const STATUS_INSTALLING = 1;
    const STATUS_FAIL = 5;
    const STATUS_SUCCESS = 9;
    const STATUS_UPGRADING = 3;

    const STATUS_TEXT = [
        self::STATUS_FAIL => '安装失败',
        self::STATUS_SUCCESS => '安装成功',
        self::STATUS_INSTALLING => '安装中',
        self::STATUS_UPGRADING => '升级中',
    ];

    protected $table = 'addons';

    protected $fillable = [
        'name', 'sign', 'current_version_id', 'prev_version_id', 'author',
        'path', 'real_path', 'thumb', 'main_url', 'status',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function versions()
    {
        return $this->hasMany(AddonsVersion::class, 'addons_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function logs()
    {
        return $this->hasMany(AddonsLog::class, 'addons_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currentVersion()
    {
        return $this->belongsTo(AddonsVersion::class, 'current_version_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function prevVersion()
    {
        return $this->belongsTo(AddonsVersion::class, 'prev_version_id');
    }

    /**
     * 状态文本.
     *
     * @return mixed|string
     */
    public function getStatusText()
    {
        return self::STATUS_TEXT[$this->status] ?? '';
    }
}
