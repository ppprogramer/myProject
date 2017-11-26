<?php

namespace App\Models;

use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Item extends Model
{
    use ModelTree, AdminBuilder;

    protected $table = 'item';

    protected $fillable = ['name', 'order', 'pid', 'icon'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setParentColumn('pid');
        $this->setTitleColumn('name');
    }

    public function allNodes(): array
    {
        $orderColumn = DB::getQueryGrammar()->wrap($this->orderColumn);
        $byOrder = $orderColumn . ' = 0,' . $orderColumn;

        return static::orderByRaw($byOrder)->get()->toArray();
    }
}
