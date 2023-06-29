<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Permissions - <?php echo e(config('app.name', 'Laravel')); ?></title>

    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css', 'vendor/permission_ui/build'); ?>
</head>
<body class="h-full bg-gray-100 p-5">
    <main class="mx-auto max-w-7xl rounded-lg bg-white p-5 shadow-md space-y-4">
        <div class="space-x-2">
            <a class="text-gray-800 hover:text-gray-600 hover:underline" href="<?php echo e(route(config('permission_ui.route_name_prefix') . 'users.index')); ?>"><?php echo e(__('PermissionsUI::permissions.users.title')); ?></a>
            <a class="text-gray-800 hover:text-gray-600 hover:underline" href="<?php echo e(route(config('permission_ui.route_name_prefix') . 'roles.index')); ?>"><?php echo e(__('PermissionsUI::permissions.roles.title')); ?></a>
            <a class="text-gray-800 hover:text-gray-600 hover:underline" href="<?php echo e(route(config('permission_ui.route_name_prefix') . 'permissions.index')); ?>"><?php echo e(__('PermissionsUI::permissions.permissions.title')); ?></a>
        </div>

        <div class="max-w-full">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </main>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\musta-app\vendor\laraveldaily\laravel-permission-ui\src/../resources/views/layout.blade.php ENDPATH**/ ?>