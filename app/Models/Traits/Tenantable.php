<?php

namespace App\Models\Traits;

use App\Models\Tenant;
use App\Scopes\TenantScope;

trait Tenantable
{
    protected static function bootTenantable()
    {
        static::addGlobalScope(new TenantScope);
        if (session()->has('id_tenant') && !is_null(session('id_tenant'))) {
            static::creating(function ($model) {
                $model->id_tenant = session('id_tenant');
            });
        }
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
