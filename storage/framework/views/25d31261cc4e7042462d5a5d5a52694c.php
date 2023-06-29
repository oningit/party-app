<?php $__env->startSection('content'); ?>
    <div class="mb-4 flex">
        <a class="rounded-md border border-transparent bg-gray-800 px-4 py-2 text-xs font-semibold text-white hover:bg-gray-700" href="<?php echo e(route(config('permission_ui.route_name_prefix') . 'roles.create')); ?>"><?php echo e(__('PermissionsUI::permissions.global.create')); ?></a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full table-auto rounded-xl border border-gray-300 bg-white text-left shadow-sm divide-y">
            <thead>
                <tr class="bg-gray-500/5">
                    <th class="px-4"><?php echo e(__('PermissionsUI::permissions.roles.fields.id')); ?></th>
                    <th><?php echo e(__('PermissionsUI::permissions.roles.fields.name')); ?></th>
                    <th><?php echo e(__('PermissionsUI::permissions.roles.fields.permissions')); ?></th>
                    <th><?php echo e(__('PermissionsUI::permissions.roles.fields.created_at')); ?></th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="px-4 py-2"><?php echo e($role->id); ?></td>
                        <td><?php echo e($role->name); ?></td>
                        <td>
                            <?php $__currentLoopData = $role->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="rounded-xl bg-blue-300 px-2 py-1 text-xs text-blue-700"><?php echo e($permission->name); ?></span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                        <td><?php echo e($role->created_at); ?></td>
                        <td class="px-4 divide-x-2">
                            <a class="rounded-md border border-transparent bg-gray-800 px-4 py-2 text-xs font-semibold text-white hover:bg-gray-700" href="<?php echo e(route(config('permission_ui.route_name_prefix') . 'roles.edit', $role)); ?>">
                                <?php echo e(__('PermissionsUI::permissions.global.edit')); ?>

                            </a>

                            <form action="<?php echo e(route(config('permission_ui.route_name_prefix') . 'roles.destroy', $role)); ?>" method="POST" style="display: inline-block;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="rounded-md bg-gray-800 px-4 py-2 text-xs font-semibold text-white hover:bg-gray-700" type="submit" onclick="return confirm(<?php echo e(__('PermissionsUI::permissions.global.confirm_action')); ?>)">
                                    <?php echo e(__('PermissionsUI::permissions.global.delete')); ?>

                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td class="p-4" colspan="4"><?php echo e(__('PermissionsUI::permissions.global.no_records')); ?></td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('PermissionsUI::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\musta-app\vendor\laraveldaily\laravel-permission-ui\src/../resources/views/roles/index.blade.php ENDPATH**/ ?>