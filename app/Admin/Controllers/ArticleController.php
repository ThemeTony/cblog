<?php

namespace App\Admin\Controllers;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Article;
use App\Tag;
use App\Cate;

class ArticleController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '文章管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Article);
        $grid->model()->orderBy('id',"desc");

        $grid->column('id', __('ID'));
        $grid->column('title',__('标题'));
        $grid->column('cate.name', '分类')->label('warning');
        $grid->column('tags',__('标签'))->display(function ($tags) {
            $tags = array_map(function ($tags) {
                return "<span class='label label-success'>{$tags['name']}</span>";
            }, $tags);

            return join('&nbsp;', $tags);
        });
        $grid->column('sticky',__('顶置'))->bool();
        $grid->column('views',__('阅读量'));
        $grid->column('created_at', __('创建时间'));
        $grid->column('updated_at', __('修改时间'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed   $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Article::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('title',__('标题'));
        $show->cate('分类',function($cate){
            $cate->setResource('/admin/cates');

            $cate->name('名称');
            $cate->field('description',__('描述'));
        });
        $show->tags('标签', function ($tags) {
            $tags->resource('/admin/tags');
            $tags->name('名称');
        });
        $show->field('content',__('内容'));
        $show->field('image',__('图片'))->image();
        $show->field('sticky','顶置');
        $show->field('views',__('阅读量'));
        $show->field('created_at', __('创建时间'));
        $show->field('updated_at', __('修改时间'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Article);

        $form->display('id', __('ID'));
        $form->text('title',__('标题'))->placeholder('文章标题')->required();
        $form->editormd('content',__('内容'));
        $form->image('image')->move('article')->uniqueName();
        $form->select('cate_id',__('分类'))->options(Cate::selectOptions());
        $form->multipleSelect('tags','标签')->options(Tag::all()->pluck('name', 'id'));
        $states = [
            'on'  => ['value' => true, 'text' => '打开', 'color' => 'success'],
            'off' => ['value' => false, 'text' => '关闭', 'color' => 'danger'],
        ];
        $form->switch('sticky',__('顶置'))->states($states);
        $form->select('kind',__('类型'))->options([0=>'普通',1=>'状态']);
        $form->display('views',__('阅读量'));
        $form->datetime('created_at', __('创建时间'));
        $form->datetime('updated_at',__('修改时间'));

        return $form;
    }
}
