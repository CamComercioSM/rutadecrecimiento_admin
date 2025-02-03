
<?php $__env->startSection('title','Ruta C Dashboard'); ?>
<?php $__env->startSection('description',''); ?>

<?php $__env->startSection('content'); ?>

    <canvas id="myChart"></canvas>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const data = {
            labels: <?php echo $dimensions; ?>,
            datasets: [{
                label: '<?php echo e($company->business_name); ?>',
                data: <?php echo e($results); ?>,
                fill: true,
                backgroundColor: 'rgba(252,183,22, 0.2)',
                borderColor: 'rgb(255,180,0)',
                pointBackgroundColor: 'rgb(252,183,22)',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgb(12, 24, 146)'
            },]
        };
        const config = {
            type: 'radar',
            data: data,
            options: {
                elements: {
                    line: {
                        borderWidth: 3
                    }
                },
                scales: {
                    r: {
                        suggestedMin: 0,
                        suggestedMax: 5
                    }
                }
            },
        };
        const myChart = new Chart(document.getElementById('myChart'), config);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.layouts.main_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Dir-CIDS\Documents\Repos\RutaCgitHubAdmin\rutadecrecimiento_admin\resources\views/website/company/radial_graphic.blade.php ENDPATH**/ ?>