<?php

return array(
    // ajax запросы
    'ajax/adminVac' => 'ajax/adminVac', // actionAdminVac в AjaxController
    'ajax/adminApp' => 'ajax/adminApp', // actionAdminApp в AjaxController
    'ajax/vac-category/([0-9]+)' => 'ajax/vaccategory/$1', // actionVaccategory в AjaxController
    'ajax/vacancys' => 'ajax/vacancys', // actionVacancys в AjaxController

    // Вакансии:
    'vacancy/send-app/([0-9]+)' => 'vacancy/sendApp/$1', // acionSendApp в VacancyContorller
    'vacancy' => 'vacancy/index', // actionIndex в VacancyController

    // Пользователь:
    'user/register' => 'user/register', // actionRegister в UserController
    'user/login' => 'user/login', // actionLogin в UserController
    'user/logout' => 'user/logout', // actionLogout в UserController
    'cabinet/delete/([0-9]+)' => 'cabinet/delete/$1', // actionDelete в CabinetController
    'cabinet/edit' => 'cabinet/edit', // actionEdit в CabinetController
    'cabinet'=>'cabinet/index',  // actionIndex в CabinetController  

    // Работа с вакансиями
    'admin/vac/update/([0-9]+)' => 'adminVac/update/$1', //actionUpdate in AdminVacController
    'admin/vac/delete/([0-9]+)' => 'adminVac/delete/$1', // actionDelete in AdminVacController
    'admin/vac/save' => 'adminVac/save', // actionSave в AdminVacController

    // Работа с заявками
    'admin/app/delete/([0-9]+)' => 'adminApp/delete/$1', // actionDelete в AdminAppController
    'admin/app/update/([0-9]+)' => 'adminApp/update/$1', // actionUpdate в AdminAppController
    'admin/app/view/([0-9]+)' => 'adminApp/view/$1', // actionView в AdminAppController

    // Админпанель(админка):
    'admin' => 'admin/index', // actionIndex в AdminController

    // глваная страница:
    ''=>'site/index', //actionIndex в SiteController
);