<?php
class InfoViewModel extends ViewModel{
    public $viewFields = array(
        'Info'  => array('*', '_type'=>'LEFT'),
        'User' 	=> array('nickname', '_on'=>'Info.username=User.username'), // group是关键字，所以_as=>ck_group
    );
}
?>