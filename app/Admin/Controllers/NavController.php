<?php

namespace App\Admin\Controllers;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Nav;

class NavController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '导航栏';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Nav);

//        $grid->column('id', __('ID'));
        $grid->column('index',__('顺序'))->sortable();
        $grid->column('name',__('名称'));
        $grid->column('link',__('链接'))->link();

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
        $show = new Show(Nav::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('index', __('排序'));
        $show->field('name',__('名称'));
        $show->field('link',__('链接'))->link();


        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Nav);

        $form->display('id', __('ID'));
        $form->number('index',__('排序'));
        $form->text('name',__('名称'));
        $form->text('link',__('链接'));

        return $form;
    }
}
