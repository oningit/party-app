  
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/css/bootstrap-notify.css">  
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/js/bootstrap-notify.js"></script>
<div class='notifications top-right'></div>  
<script>  
  <?php if(Session::has('success')): ?>  
     $('.top-right').notify({  
        message: { text: "<?php echo e(Session::get('success')); ?>" }  
      }).show();  
     <?php  
       Session::forget('success');  
     ?>  
  <?php endif; ?>  
  <?php if(Session::has('info')): ?>  
      $('.top-right').notify({  
        message: { text: "<?php echo e(Session::get('info')); ?>" },  
        type:'info'  
      }).show();  
      <?php  
        Session::forget('info');  
      ?>  
  <?php endif; ?>  
  <?php if(Session::has('warning')): ?>  
        $('.top-right').notify({  
        message: { text: "<?php echo e(Session::get('warning')); ?>" },  
        type:'warning'  
      }).show();  
      <?php  
        Session::forget('warning');  
      ?>  
  <?php endif; ?>  
  <?php if(Session::has('error')): ?>  
        $('.top-right').notify({  
        message: { text: "<?php echo e(Session::get('error')); ?>" },  
        type:'danger'  
      }).show();  
      <?php  
        Session::forget('error');  
      ?>  
  <?php endif; ?>  
</script>
<?php /**PATH C:\xampp\htdocs\musta-app\resources\views/notification.blade.php ENDPATH**/ ?>