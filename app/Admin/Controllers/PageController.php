<?php

namespace App\Admin\Controllers;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Page;

class PageController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '页面管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Page);
        $grid->model()->orderBy('id',"desc");

        $grid->column('id', __('ID'));
        $grid->column('title',__('标题'));
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
        $show = new Show(Page::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('title',__('标题'));
        $show->field('content',__('内容'));
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
        $form = new Form(new Page);

        $form->display('id', __('ID'));
        $form->text('title',__('标题'))->placeholder('标题')->required();
        $form->editormd('content',__('内容'));
        $form->display('views',__('阅读量'));
        $form->datetime('created_at', __('创建时间'));
        $form->datetime('updated_at',__('修改时间'))->default(\Carbon\Carbon::now());

        return $form;
    }
}
