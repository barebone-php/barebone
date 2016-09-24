<?php
namespace App\Model;

/**
 * Class Example
 *
 * This is just an example model with custom table and PK definition
 * You are free to delete this file or create your own version.
 *
 * @author  Kjell Bublitz <kjbbtz@gmail.com>
 * @package App\Controller
 */
class Example extends AppModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'example_db_table';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

}