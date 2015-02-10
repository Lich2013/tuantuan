<?php
namespace Home\Controller;
use Think\Controller;
class ViewController extends BaseController {
    public function index(){
        $school = M('school');
        $goods = M('goods');
        $store = M('store');
        $school_name = $school->select();
        $goods_type = $goods->select();
        $store_num = $store->where('status = 1')->field('id')->select();
        $num = count($store_num);

        for($i = 0; $i < 5; ++$i) {
            $store_rand[] = rand(0, $num-1);
        }
        $j = 0;
        foreach($store_rand as $v)
        {
            $id = $store_num[$v]['id'];
            $type = M('store_goods')->where("store_id = $id")->join('JOIN goods ON store_goods.goods_id = goods.id')->field('type')->select();
            $tags = M('store_tag')->where("store_id = $id")->join('JOIN tags ON store_tag.tag_id = tags.id')->field('tag_name')->select();
            $info = $store->where("id = $id")->select();
            $uid = $info[0]['uid'];
            $hoster = M('users')->where("id = $uid")->getField('nickname');
            $person_id = M('person')->where("store_id = $id")->getField('id');
            $store_info[$j]= $info[0];
            $store_info[$j]['goods_type'] = $type;
            $store_info[$j]['tags'] = $tags;
            $store_info[$j]['nickname'] = $hoster;
            $store_info[$j]['person_id'] = $person_id;
            $store->where("id = $id")->setInc('click_num',1);
            ++$j;
        }
        $this->assign('store', $store_info);
        $this->assign('school', $school_name);
        $this->assign('goods', $goods_type);
        $this->display('index');
    }


    public function view(){
        $school_id = I('post.school_id');
        $goods_id = I('post.goods_id');
        //00
        if($school_id==0&&$goods_id==0)
        {
            $this->index();
            return;
        }

        $school = M('school');
        $goods = M('goods');
        $store = M('store');
        $school_name = $school->select();
        $goods_type = $goods->select();
        //10
        if($school_id!=0&&$goods_id==0)
        {
            $store_info = $store->where("school_id = $school_id AND status = 1")->select();

            $i = 0;
            foreach($store_info as $v) {
                $uid = $v['uid'];
                $hoster = M('users')->where("id = $uid")->getField('nickname');
                $store_info[$i]['nickname'] = $hoster;
                ++$i;
            }
            $j = 0;
            foreach($store_info as $v) {
                $store_id = $v['id'];
                $goods_type1 = M('store_goods')->where("store_id = $store_id")->join('JOIN goods ON store_goods.goods_id = goods.id')->field('type')->select();
                $tags = M('store_tag')->where("store_id = $store_id")->join('JOIN tags ON store_tag.tag_id = tags.id')->field('tag_name')->select();
                $store_info[$j]['person_id'] = M('person')->where("store_id = $store_id")->getField('id');
                $store_info[$j]['goods_type'] = $goods_type1;
                $store_info[$j]['tags'] = $tags;
                $store->where("id = $store_id")->setInc('click_num',1);
                ++$j;
            }
            $this->assign('store', $store_info);
            $this->assign('school', $school_name);
            $this->assign('goods', $goods_type);
            $this->display('index');
            return;
        }
        //01
        if($school_id==0&&$goods_id!=0){
            $store_info = M('store_goods')->where("goods_id = $goods_id")
                                ->join('JOIN store ON store_goods.store_id = store.id')
                                ->select();
            $i = 0;
            foreach($store_info as $v) {
                $uid = $v['uid'];
                $hoster = M('users')->where("id = $uid")->getField('nickname');
                $store_info[$i]['nickname'] = $hoster;
                ++$i;
            }
            $j = 0;
            foreach($store_info as $v) {
                $store_id = $v['store_id'];
                $goods_type1 = M('store_goods')->where("store_id = $store_id")->join('JOIN goods ON store_goods.goods_id = goods.id')->field('type')->select();
                $tags = M('store_tag')->where("store_id = $store_id")->join('JOIN tags ON store_tag.tag_id = tags.id')->field('tag_name')->select();
                $store_info[$j]['person_id'] = M('person')->where("store_id = $store_id")->getField('id');
                $store_info[$j]['goods_type'] = $goods_type1;
                $store_info[$j]['tags'] = $tags;
                $store->where("id = $store_id")->setInc('click_num',1);
                ++$j;
            }
            $this->assign('store', $store_info);
            $this->assign('school', $school_name);
            $this->assign('goods', $goods_type);
            $this->display('index');
            return;
        }
        //11
        if($school_id!=0&&$goods_id!=0) {
        $store_info = $store
                        ->where("school_id = $school_id AND status = 1")
                        ->join('JOIN store_goods ON store.id = store_goods.store_id')
                        ->join('JOIN goods ON store_goods.goods_id = goods.id')
                        ->where("goods_id = $goods_id")
                        ->select();

            $i = 0;
            foreach($store_info as $v) {
                $uid = $v['uid'];
                $hoster = M('users')->where("id = $uid")->getField('nickname');
                $store_info[$i]['nickname'] = $hoster;
                ++$i;

            }

            $j = 0;
            foreach($store_info as $v) {

                $store_id = $v['store_id'];
                $goods_type1 = M('store_goods')->where("store_id = $store_id")->join('JOIN goods ON store_goods.goods_id = goods.id')->field('type')->select();
                $tags = M('store_tag')->where("store_id = $store_id")->join('JOIN tags ON store_tag.tag_id = tags.id')->field('tag_name')->select();
                $store_info[$j]['person_id'] = M('person')->where("store_id = $store_id")->getField('id');
                $store_info[$j]['goods_type'] = $goods_type1;
                $store_info[$j]['tags'] = $tags;
                $store->where("id = $store_id")->setInc('click_num',1);
                ++$j;
            }
            $this->assign('store', $store_info);
            $this->assign('school', $school_name);
            $this->assign('goods', $goods_type);
            $this->display('index');
            return;
        }
    }



}