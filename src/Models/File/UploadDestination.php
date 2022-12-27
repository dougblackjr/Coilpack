<?php


namespace Expressionengine\Coilpack\Models\File;

use Expressionengine\Coilpack\Model;
use ExpressionEngine\Model\Member\Member;

/**
 * File Upload Location Model
 *
 * A model representing one of many possible upload destintations to which
 * files may be uploaded through the file manager or from the publish page.
 * Contains settings for this upload destination which describe what type of
 * files may be uploaded to it, as well as essential information, such as the
 * server paths where those files actually end up.
 */
class UploadDestination extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'upload_prefs';

    protected static $_relationships = array(
        'Site' => array(
            'type' => 'belongsTo'
        ),
        'Roles' => array(
            'type' => 'hasAndBelongsToMany',
            'model' => 'Role',
            'pivot' => array(
                'table' => 'upload_prefs_roles',
                'left' => 'upload_id',
                'right' => 'role_id'
            )
        ),
        'Module' => array(
            'type' => 'belongsTo',
            'model' => 'Module',
            'to_key' => 'module_id'
        ),
        'Files' => array(
            'type' => 'hasMany',
            'model' => 'File',
            'to_key' => 'upload_location_id'
        ),
        'FileDimensions' => array(
            'type' => 'hasMany',
            'model' => 'FileDimension',
            'to_key' => 'upload_location_id'
        )
    );

}


