<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Backpack Crud Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used by the CRUD interface.
    | You are free to change them to anything
    | you want to customize your views to better match your application.
    |
    */

    // Forms
    'save_action_save_and_new' => 'Сохранить и добавить',
    'save_action_save_and_edit' => 'Сохранить и продолжить редактирование',
    'save_action_save_and_back' => 'Сохранить и вернуться к списку',
    'save_action_changed_notification' => 'Настройки сохранения успешно изменены',

    // Create form
    'add'                 => 'Добавить',
    'back_to_all'         => 'Все ',
    'cancel'              => 'Отменить',
    'add_a_new'           => 'Добавить ',

    // Edit form
    'edit'                 => 'Изменить',
    'save'                 => 'Save',

    // Revisions
    'revisions'            => 'Revisions',
    'no_revisions'         => 'No revisions found',
    'created_this'          => 'created this',
    'changed_the'          => 'changed the',
    'restore_this_value'   => 'Restore this value',
    'from'                 => 'from',
    'to'                   => 'to',
    'undo'                 => 'Undo',
    'revision_restored'    => 'Revision successfully restored',

    // CRUD table view
    'all'                       => 'Все ',
    'in_the_database'           => '',
    'list'                      => 'Список',
    'actions'                   => 'Действия',
    'preview'                   => 'Предпросмотр',
    'delete'                    => 'Удалить',
    'admin'                     => 'Административная панель',
    'details_row'               => 'This is the details row. Modify as you please.',
    'details_row_loading_error' => 'There was an error loading the details. Please retry.',

        // Confirmation messages and bubbles
        'delete_confirm'                              => 'Are you sure you want to delete this item?',
        'delete_confirmation_title'                   => 'Item Deleted',
        'delete_confirmation_message'                 => 'The item has been deleted successfully.',
        'delete_confirmation_not_title'               => 'NOT deleted',
        'delete_confirmation_not_message'             => "There's been an error. Your item might not have been deleted.",
        'delete_confirmation_not_deleted_title'       => 'Not deleted',
        'delete_confirmation_not_deleted_message'     => 'Nothing happened. Your item is safe.',

        // DataTables translation
        'emptyTable'     => 'Нет данных',
        'info'           => 'Показано с _START_ по _END_ из _TOTAL_ записей',
        'infoEmpty'      => 'Показано с 0 по 0 из 0 записей',
        'infoFiltered'   => '(filtered from _MAX_ total entries)',
        'infoPostFix'    => '',
        'thousands'      => ',',
        'lengthMenu'     => '_MENU_ записей на странице',
        'loadingRecords' => 'Загрузка...',
        'processing'     => 'Процессинг...',
        'search'         => 'Найти: ',
        'zeroRecords'    => 'Совпадений не найдено',
        'paginate'       => [
            'first'    => 'Первая',
            'last'     => 'Последняя',
            'next'     => 'Следующая страница',
            'previous' => 'Предыдущая страница',
        ],
        'aria' => [
            'sortAscending'  => ': activate to sort column ascending',
            'sortDescending' => ': activate to sort column descending',
        ],

    // global crud - errors
        'unauthorized_access' => 'Unauthorized access - you do not have the necessary permissions to see this page.',
        'please_fix' => 'Please fix the following errors:',

    // global crud - success / error notification bubbles
        'insert_success' => 'Данные успешно добавлены',
        'update_success' => 'Данные успешно сохранены',

    // CRUD reorder view
        'reorder'                      => 'Изменить порядок',
        'reorder_text'                 => 'Use drag&drop to reorder.',
        'reorder_success_title'        => 'Done',
        'reorder_success_message'      => 'Your order has been saved.',
        'reorder_error_title'          => 'Error',
        'reorder_error_message'        => 'Your order has not been save.',

    // CRUD yes/no
        'yes' => 'Да',
        'no' => 'Нет',

    // Fields
        'browse_uploads' => 'Browse uploads',
        'clear' => 'Clear',
        'page_link' => 'Страница',
        'page_link_placeholder' => 'http://yandex.ru/',
        'internal_link' => 'Ссылка на сайте',
        'internal_link_placeholder' => 'Путь к странице. Например: \'admin/page\' (Без кавычек) для \':url\'',
        'external_link' => 'Ссылка на внешний ресурс',
        'choose_file' => 'Choose file',

    //Table field
        'table_cant_add' => 'Cannot add new :entity',
        'table_max_reached' => 'Maximum number of :max reached',

    // File manager
    'file_manager' => 'File Manager',
];
