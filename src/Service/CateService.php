<?php
namespace Zngue\Category\Service;
use Zngue\Category\Models\CateModel;
use Zngue\User\Service\ConstService;
class CateService
{
    /**
     * @param $keywords
     * @param $field
     * @param $order
     * @param $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public static function getList($keywords,$field,$order,$limit){

        $list=CateModel::where(function ($q) use ($keywords){
            if (!empty($keywords)){
                $q->orWhere('name','like','%'.$keywords.'%');
            }
        });
        if ($field && $order){
            $list->orderBy($field,$order);
        }
        return $list->paginate(ConstService::pageNum($limit));
    }
    public static function getListAjax(){
        $data =CateModel::select(['id','name','pid'])->get();
        return !empty($data)?$data->toArray():[];
    }
    /**
     * @param $data
     * @return \Illuminate\Database\Eloquent\Model|CateModel
     */
    public static function add($data){
        return CateModel::create($data);
    }
    /**
     * @param $id
     * @param $data
     * @return int
     */
    public static function edit($id,$data){

        return CateModel::where('id',$id)->update($data);
    }
    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getOne($id){
        return CateModel::find($id);
    }
    /**
     * @param $id
     * @return bool
     */
    public static function del($id){
        $data =self::getOne($id);
        if ($data){
            return $data->delete();
        }
        return false;
    }
    public static function changeStatus($data){
        return CateModel::where('id',$data['id'])->update([$data['name']=>$data['status']]);
    }

}
