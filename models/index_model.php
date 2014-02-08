<?php
/**
 * Created by PhpStorm.
 * User: LeeAllen
 * Date: 1/23/14
 * Time: 3:56 PM
 */

class Index_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
        Session::sessionStart('MTC_STUDENT');
        $this->visitorId = Session::get('visitorId');
        $this->lifestyle = new Lifestyle();
    }

}