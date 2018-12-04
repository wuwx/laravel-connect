<?php

namespace Wuwx\LaravelConnect\Forms;

use Kris\LaravelFormBuilder\Form;

class ProviderForm extends Form
{
    public function buildForm()
    {
        $this->add('enabled', 'select', [
            'label' => '启用', 'attr' => ['class' => 'form-control'],
            'rules' => 'required',
            'choices' => ['1' => '启用', '0' => '禁用'],
        ]);

        $this->add('name', 'text', [
            'label' => '名称', 'attr' => ['class' => 'form-control'],
            'rules' => 'required',
        ]);

        $this->add('icon', 'text', [
            'label' => '图标', 'attr' => ['class' => 'form-control'],
            'rules' => 'required',
        ]);

        $this->add('title', 'text', [
            'label' => '标题', 'attr' => ['class' => 'form-control'],
            'rules' => 'required',
        ]);

        $this->add('options', 'form', [
            'class' => $this->formBuilder->plain()->add('client_id', 'text')
                                                  ->add('client_secret', 'text')
                                                  ->add('redirect', 'text')
        ]);

        $this->add('submit', 'submit', [
            'label' => '提交',
            'attr' => ['class' => 'btn btn-primary'],
        ]);
    }
}
