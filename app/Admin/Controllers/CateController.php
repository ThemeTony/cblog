<?php
//
//namespace App\Admin\Controllers;
//
//use Encore\Admin\Controllers\AdminController;
//use Encore\Admin\Form;
//use Encore\Admin\Grid;
//use Encore\Admin\Show;
//use App\Cate;
//
//class CateController extends AdminController
//{
//    /**
//     * Title for current resource.
//     *
//     * @var string
//     */
//    protected $title = '分类管理';
//
//    /**
//     * Make a grid builder.
//     *
//     * @return Grid
//     */
//    protected function grid()
//    {
//        $grid = new Grid(new Cate);
//
//        $grid->column('id', __('ID'))->sortable();
//        $grid->column('name',__('名称'));
//        $grid->column('description',__('描述'));
//
//        return $grid;
//    }
//
//    /**
//     * Make a show builder.
//     *
//     * @param mixed   $id
//     * @return Show
//     */
//    protected function detail($id)
//    {
//        $show = new Show(Cate::findOrFail($id));
//
//        $show->field('id', __('ID'));
//        $show->field('name',__('名称'));
//        $show->field('description',__('描述'));
//
//        $show->articles('分类文章',function ($articles){
//            $articles->resource('/admin/articles');
//            $articles->id('ID');
//            $articles->title('标题');
//        });
//        return $show;
//    }
//
//    /**
//     * Make a form builder.
//     *
//     * @return Form
//     */
//    protected function form()
//    {
//        $form = new Form(new Cate);
//
//        $form->display('id', __('ID'));
//        $form->text('name', __('名称'));
//        $form->textarea('description',__('描述'));
//
//        return $form;
//    }
//}


namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Cate;
use Encore\Admin\Form;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Tree;
use function foo\func;

class CateController extends Controller
{
    use ModelForm;
    public function index()
    {
        return Admin::content(function (Content $content) {
            $content->header('分类管理');
            $content->body(Cate::tree(function ($tree){
                $tree->branch(function ($branch) {
                    return "{$branch['name']}";
                });
            }));
        });
    }
    protected function form()
    {
        $cates=new Cate;
        $form = new Form($cates);

        $form->display('id', __('ID'));
        $form->text('name', __('名称'));
        $form->textarea('description',__('描述'));
        $form->select('parent_id', __('父分类'))->options($cates::selectOptions());

        return $form;
    }
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('新增分类');
            $content->description('');

            $content->body($this->form());
        });
    }
    public function edit($id, Content $content)
    {
        return $content
            ->title('分类修改')
            ->description('')
            ->row($this->form()->edit($id));
    }
    public function show($id,Content $content)
    {
        return $content
            ->title('分类查看')
            ->description('暂未完善');
    }
}
