<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \DateTimeInterface;

class Destination extends Model
{
    public $table = 'destinations';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'code',
        'name',
        'physical_address',
        'address_extension',
        'city',
        'state',
        'zip',
        'customer_code_id',
        'contact_1',
        'company_phone',
        'phone_1',
        'extension_1',
        'contact_2',
        'phone_2',
        'extension_2',
        'fax',
        'email',
        'note',
        'archive',
        'revision',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function customer_code()
    {
        return $this->belongsTo(Customer::class, 'customer_code_id');
    }
}
