<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class TenantScope implements Scope {

    public function apply(Builder $builder, Model $model)
    {
        if (session()->has('id_tenant') && !is_null(session('id_tenant'))) {
            $builder->where('id_tenant', session('id_tenant'));
        }
    }
}
?>