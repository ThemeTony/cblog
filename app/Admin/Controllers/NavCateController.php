<?php

namespace App\Admin\Controllers;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\NavCate;

class NavCateController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '分类导航管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new NavCate);
        $grid->model()->orderBy('sort');
        $grid->sort('排序')->sortableColumn(NavCate::class);
        $grid->column('name', __('名称'));
        $grid->column('link', __('链接'));
        $grid->column('id', __('ID'));

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
        $show = new Show(NavCate::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('name',__('名称'));
        $show->field('link',__('链接'));
        $show->field('icon',__('图标'));
        $show->field('sort',__('排序'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new NavCate);

        $form->display('id', __('ID'));
        $form->text('name',__('名称'));
        $form->url('link','链接');
        $form->text('icon',__('图标'));


        return $form;
    }
}
