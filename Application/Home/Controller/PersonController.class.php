<?php
namespace Home\Controller;
use Think\Controller;
class PersonController extends BaseController {
    public function index(){
        $person_id = I('get.person_id');
		$m['person.id'] = $person_id;
        $info = M('person')->where($m)->join('JOIN school ON person.school_id = school.id')->field('name, major, introduce, photo, school_name, store_id')->select();
        $store_id = $info[0]['store_id'];
		$map['id'] = $store_id;
        $store = M('store')->where($map)->getField('link');
        $info[0]['introduce'] = str_replace(array("\r\n",'\r','\n'), '<br/>', $info[0]['introduce']);
        $this->assign('person_info', $info[0]);
        $this->assign('link', $store);
        $this->display();
    }
}
