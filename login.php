<?php
declare (strict_types = 1);

namespace app\controller;

use app\BaseController;
use liliuwei\think\Jump;
use think\facade\Db;
use think\facade\View;
use think\Request;

class login extends BaseController
{
    use Jump;
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //返回登录和退出功能
        //管理员
        return View::fetch('register');
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        ////添加的返回页面
        return View::fetch("zhu");
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //登录方法
        $register=[
            "username"=>$request->post("username"),
            "password"=>$request->post("password")
        ];

        if(Db::table('rights')->select($register)){
            $this->success("登录成功","login/list");
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function createx(Request $request)
    {
        // 注册的方法
        $cre=[
            "name"=>$request->post("name"),
        ];

        if(Db::table('jiedian')->insert($cre)){
            $this->success("注册完成","createx/create");
        }
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function jiao()
    {
        //角色返回的页面
        return View::fetch('jiao');
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function jiaose(Request $request){
        //角色注册的方法
        $sel=[
            "name"=>$request->post("name"),
            "sort"=>$request->post("sort"),
        ];

        if(Db::table('roles')->insert($sel)){
            $this->success("注册成功","login/list");
        }
    }

    public function list(){
        //角色列表展示的方法
        $listfile=Db::table('roles')->paginate(2);
        View::assign("list",$listfile);

        return View::fetch("list");
    }
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
