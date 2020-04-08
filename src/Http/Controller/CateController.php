<?php
namespace Zngue\Category\Http\Controller;
use Illuminate\Http\Request;
use Zngue\Category\Service\CateService;
use Zngue\Module\Http\Request\Module\ChangeRequest;
use Zngue\User\Http\Controller\Controller;
use Zngue\Category\Http\Request\Cate\AddRequest;
use Zngue\Category\Http\Request\Cate\SaveRequest;
use Zngue\User\Service\PermissionService;

class CateController extends Controller
{
    const route_base='cate.';
    public function index(Request $request ){
        if ($request->ajax() ){
            $keywords=$request->input('keywords','');
            $field=$request->input('field','');
            $order=$request->input('order','');
            $limit = $request->input('limit','');
            $listObj =CateService::getList($keywords,$field,$order,$limit);
            $item =$listObj->items();
            $num =$listObj->total();
            return $this->layTableJson($item,$num);
        }
        return $this->zngView(self::route_base.'index');
    }
    public function add(){
        return $this->zngView(self::route_base.'add');

    }
    public function doAdd(AddRequest $request){
        $data =$request->all();
//        print_r($data);die;
        $res =CateService::add($data);
        return $this->returnInfo($res);
    }
    public function save(Request $request){
        $id = $request->input('id',0);
        if (!$id){
            return redirect()->route(self::route_base.'index');
        }
        $data=CateService::getOne($id)->toArray();
        return $this->zngView(self::route_base.'save',compact('data'));

    }
    public function doSave(SaveRequest $request){
        $data =$request->all();
        $r=CateService::edit($data['id'],$data);
        return $this->returnInfo($r);
    }
    public function del(Request $request){
        $id =$request->input('id',0);
        $r=CateService::del($id);
        return $this->returnInfo($r);
    }
    public function changeStatus(ChangeRequest $request){
        $data =$request->only('id','name','status');
        $r =CateService::changeStatus($data);
        return $this->returnInfo($r);
    }
    public function delAll(){





    }
    public function ajaxList(Request $request){
        $pid = $request->input('pid',0);
        $data =CateService::getListAjax();
        $one = [
            "id"=>0,
            "pid"=>0,
            "name"=>"请选择",
        ];
        $data= PermissionService::getTree($data,$pid);
        array_unshift($data,$one);
        return $data;
    }

}
