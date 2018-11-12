<?php
/**
 * User: Yirius
 * Date: 2018/7/12
 * Time: 12:28
 */

namespace app\manage\controller;


use icesadmin\common\model\IcesAdminMenu;
use icesadmin\extend\ices\Form;
use icesadmin\extend\ices\Table;
use think\Controller;
use think\facade\Response;

class View extends Controller
{
    public function form(){
        $form = new Form();
        return $form
            ->addText("test1", "文字输入框", "password和text用法相同", [
                'inline' => "layui-input-block"
            ], [
                'data-id' => 1//这里的所有数据会渲染到element上
            ])
            //正常下拉
            ->addSelect("test2", "正常下拉", [
                ['text' => 1, 'value' => 1],
                ['text' => 2, 'value' => 2, 'disabled' => 1],
                ['text' => 3, 'value' => 3, 'checked' => 1],
            ], "请选择")
            //下拉分组
            ->addSelect("test3", "分组下拉", [
                ['text' => "第一分组", 'value' => 1, 'sub' => [
                    ['text' => 2, 'value' => 2],
                    ['text' => 3, 'value' => 3],
                ]],
                ['text' => "第二分组", 'value' => 4, 'sub' => [
                    ['text' => 5, 'value' => 5],
                    ['text' => 5, 'value' => 5],
                ]],
            ], "请选择")
            //下拉搜索
            ->addSelect("test4", "下拉搜索", [
                ['text' => "你好", 'value' => 1],
                ['text' => "测试", 'value' => 2],
                ['text' => "下拉", 'value' => 3, 'checked' => 1],
            ], "请选择", [], [
                'lay-search' => "true"
            ])
            //正常多选,可以参考[http://sun.faysunshine.com/layui/formSelects-v4/example/example_v4.html]
            ->addMulSelect("test5", "多选下拉", [
                ['text' => "你好", 'value' => 1],
                ['text' => "测试", 'value' => 2],
                ['text' => "下拉", 'value' => 3, 'checked' => 1],
            ])
            //标记最大个数
            ->addMulSelect("test6", "最多多选", [
                ['text' => "你好", 'value' => 1],
                ['text' => "测试", 'value' => 2],
                ['text' => "下拉", 'value' => 3, 'checked' => 1],
            ], '', [], [
                'xm-select-max' => 2,
                'xm-select-skin' => "normal"//设定皮肤
            ])
            //多选搜索
            ->addMulSelect("test7", "多选搜索", [
                ['text' => "你好", 'value' => 1],
                ['text' => "测试", 'value' => 2],
                ['text' => "下拉", 'value' => 3, 'checked' => 1],
            ], '', [], [
                'xm-select-search' => "true"//设定开启搜索,如果设定了其他值,就是搜索的网址
            ])
            //checkbox
            ->addCheckbox("test8", "多选框", [
                ['text' => "你好", 'value' => 1],
                ['text' => "测试", 'value' => 2],
                ['text' => "下拉", 'value' => 3, 'checked' => 1],
            ])
            //其他样式
            ->addCheckbox("test8", "多选框", [
                ['text' => "你好", 'value' => 1],
                ['text' => "测试", 'value' => 2],
                ['text' => "下拉", 'value' => 3, 'checked' => 1],
            ], [], [
                'lay-skin' => ''
            ])
            //switch设置字
            ->addSwitch("test9", "switch", [], [
                'lay-text' => "ON|OFF"
            ])
            //其他样式
            ->addRadio("test10", "单选框", [
                ['text' => "你好", 'value' => 1],
                ['text' => "测试", 'value' => 2],
                ['text' => "下拉", 'value' => 3, 'checked' => 1],
            ], [], [
                'lay-skin' => ''
            ])
            //日期样式【参考http://www.layui.com/doc/modules/laydate.html】在options里设置data-参数
            ->addDate("test11", "日期选择")
            ->addDate("test12", "日期时间选择", '', [], [
                'data-type' => "datetime"
            ])
            //textarea
            ->addTextarea("test13", "textarea框", "测试")
            //上传文件
            ->addUpload("test14", "上传文件")
            //webuploader上传
            ->addWebuploader("test15", "上传图片", [], [
                'data-label' => "点击选择图片"
            ])
            //上传图片有默认值
            ->addWebuploader("test16", "上传图片", [
                'options' => "./uploads/30/3cd8f793231f83f9110a288bc6a844.jpg"
            ], [
                'data-label' => "点击选择图片"
            ])
            //上传文件
            ->addWebuploader("test17", "上传文件", [
                'options' => ""
            ], [
                'data-server' => "/icestools/uploads"
            ])
            //富文本编辑器
            ->addUeditor("test18", "富文本")
            ->addControl(<<<HTML
<input type="hidden" name="testhidden" value="1"/>
HTML
            )
            ->setPageScript(<<<HTML
<script>
console.log("默认输出");
</script>
HTML
)
            ->setPageStyle(<<<HTML
.layui-form-label{
    width: 70px;
}
HTML
            )
            ->setPageBreadcrumb(['后台演示', 'Form'])
            ->startInLine()
            ->addText("test99", "inline text")
            ->addDate("test100", "inline date")
            ->addSelect("test101", "inline select", [], "请选择")
            ->startInLine(false)
            ->show(false, "/manage/view/formsubmit");
    }

    /**
     * @title 表单提交事件
     * @description
     * @createtime: 2018/7/13 15:52
     */
    public function formSubmit(){
        $this->success("suc");
    }

    public function table(){
        $table = new Table();

        $form = new Form();
        $form->addText("name", "名称");

        return $table
            //在table上方加入筛选条件
            ->setTableSearchForm($form)
            //如果有自定义的tools事件,那么tablename的设置一定要在toolbar前面
            ->setTablename("mytest")
            //开启checkbox
            ->addCheckbox()
            //正常的列表
            ->addColumn("id", "ID")
            ->addColumn("name", "点击下方编辑", false, [
                'edit' => "text"
            ])
            ->addColumn("ispass", "审核状态", false, [
                'width' => 100,
                'align' => "center",
                'toolbar' => "#manageStatus-template"//和addTemplate的id相对应
            ])
            //设置最右侧的toolbar
            ->addToolColumn("测试", 200)
            ->addToolbar('edit')
            ->addToolbar('del')
            //右侧位置添加一个按钮,需要把addTableJavascript内注释取消才可以看到
            ->addToolbar(<<<HTML
<a class="layui-btn layui-btn-warm layui-btn-xs" lay-event="icesadmin-test"><i class="layui-icon layui-icon-theme"></i>test</a>
HTML
            )
            //具体template有哪些使用方式请参考【http://www.layui.com/doc/modules/laytpl.html】
            ->addTemplate("manageStatus-template", <<<HTML
<input type="checkbox" name="sex" lay-skin="switch" lay-text="开|关" lay-filter="order-status" value="{{ d.id }}" {{ d.ispass == 1 ? 'checked' : '' }}>
HTML
            )
            //输出新增的这个tools按钮tests,去掉之后才能触发编辑和删除
            ->addTableJavascript(<<<HTML
//table.on("tool(mytest)", function(obj){
//    console.log(obj);
//});
//这一段是触发开关按钮或其他的table内自定义form内容
form.on("switch(order-status)", function(data){
    console.log(data);
    console.log(data.elem.checked?1:0);
});
HTML
)
            //在table的edit完成之后触发的回调
            ->setEditEvent(<<<HTML
function(obj){
    console.log(obj);
}
HTML
)
            //添加左上角的按钮,有add添加和del批量删除,也可以自己传入html
            ->addTableBtn(['add', 'del'])
            ->addTableBtn("<a class='layui-btn layui-btn-normal'>111</a>")
            //设置一下点击编辑按钮打开的【截面位置】【标题】【提交网址】【提交按钮对应的lay-fliter,正常是设置的formname-submit】【渲染完成pop回调】【提交数据回调】
            ->setTableform("../../manage/view/tableForm", "测试", "/manage/view/tableFormSubmit", 'mytestform-submit', "console.log('render suc')", "")//如果去掉最后一句console.log('submit suc'),就会自动关闭pop窗口并且刷新table
            ->setPageBreadcrumb(['后台演示', 'Table'])
            ->show("/manage/view/tableList");
    }

    public function tableForm(){
        $form = new Form();
        return $form
            ->setFormname("mytestform")
            ->addText("test", "测试一个")
            ->show();
    }

    public function tableFormSubmit(){
        $this->success("suc");
    }

    public function tableList(){
        //在table内设置的上方搜索
        if(input("post.name")){

        }
        $result = IcesAdminMenu::icesList();
        $result['msg'] = 'suc';
        return Response::create($result, 'json');
    }
}
