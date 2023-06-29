<?php $__env->startSection('content'); ?>
    <div class="overflow-x-auto">
        <table class="w-full table-auto rounded-xl border border-gray-300 bg-white text-left shadow-sm divide-y">
            <thead>
                <tr class="bg-gray-500/5">
                    <th class="px-4 py-2"><?php echo e(__('PermissionsUI::permissions.users.fields.id')); ?></th>
                    <th><?php echo e(__('PermissionsUI::permissions.users.fields.name')); ?></th>
                    <th><?php echo e(__('PermissionsUI::permissions.users.fields.email')); ?></th>
                    <th><?php echo e(__('PermissionsUI::permissions.users.fields.roles')); ?></th>
                    <th><?php echo e(__('PermissionsUI::permissions.users.fields.created_at')); ?></th>
                    <th class="px-4"></th>
                </tr>
            </thead>

            <tbody class="whitespace-nowrap divide-y">
                <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="px-4 py-3"><?php echo e($user->id); ?></td>
                        <td><?php echo e($user->name); ?></td>
                        <td><?php echo e($user->email); ?></td>
                        <td>
                            <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="rounded-xl bg-blue-300 px-2 py-1 text-xs text-blue-700"><?php echo e($role->name); ?></span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                        <td><?php echo e($user->created_at); ?></td>
                        <td class="px-4">
                            <a class="rounded-md border border-transparent bg-gray-800 px-4 py-2 text-xs font-semibold text-white hover:bg-gray-700" href="<?php echo e(route(config('permission_ui.route_name_prefix') . 'users.edit', $user)); ?>">
                                <?php echo e(__('PermissionsUI::permissions.global.edit')); ?>

                            </a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td class="p-4" colspan="4"><?php echo e(__('PermissionsUI::permissions.global.no_records')); ?></td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <?php if($users->links()): ?>
            <div class="mt-4">
                <?php echo e($users->links()); ?>

            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('PermissionsUI::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\musta-app\vendor\laraveldaily\laravel-permission-ui\src/../resources/views/users/index.blade.php ENDPATH**/ ?>