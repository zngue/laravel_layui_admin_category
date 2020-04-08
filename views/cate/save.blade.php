@include('zng::common.header')
<body class="childrenBody">
<form class="layui-form" action="">
   <div class="layui-form-item">
	<label class="layui-form-label">名称</label>
	<div class="layui-input-block">
		<input type="text" name="name" value="{{$data["name"]}}" lay-verify="required" placeholder="请输入名称" autocomplete="off" class="layui-input">
	</div>
</div>
<div class="layui-form-item layui-form-text">
	<label class="layui-form-label">描述</label>
	<div class="layui-input-block">
		<textarea name="desc"  lay-verify=""   placeholder="请输入描述" class="layui-textarea">{{$data["desc"]}}</textarea>
	</div>
</div>
<div class="layui-form-item">
	<label class="layui-form-label">父级分类id</label>
	<div id="pid">
	</div>
</div>
<div class="layui-form-item">
	<label class="layui-form-label">状态</label>
	<div class="layui-input-block">
		<input type="radio" name="status" {{ (isset($data)&&$data['status']==1)?'checked': '' }}   value="1"  title="正常" >
		<input type="radio" name="status" {{ (isset($data)&&$data['status']==0)?'checked': '' }}   value="0"  title="禁用" >
	</div>
</div>

    <div class="layui-form-item">
        <div class="layui-input-block">
            <input type="hidden" name="id" value="{{$data['id']}}">
            <button class="layui-btn" lay-submit lay-filter="save">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>
</body>
@include('zng::common.footer')
<script>

</script>
@include('zng::cate.js')
