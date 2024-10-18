<?php

namespace App\Models;
use CodeIgniter\Model;

class Admin_M extends Model
{
    protected $table = 'tbl_biodata';
    protected $primaryKey = 'id_biodata';
    protected $allowedFields = ['nama' ,'mail' ,'alamat' , 'documen' ];
}
