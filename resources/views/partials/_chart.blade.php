<div style="width: 400px; height: 400px;">
    <canvas id="myChart"></canvas>
</div>

<script>

let labels = [
<?php
    foreach($statistics as $stat) {
        if($stat->category_sum) {
            echo '"' . $stat->category . '",';
        }
    }
?>];

let itemData = [
<?php
    foreach($statistics as $stat) {
        if($stat->category_sum) {
            echo '"' . $stat->category_sum . '",';
        }
    }
?>];

if (!labels.length) {
    labels.push('No expenses in given date range');
    itemData.push(1)
}

    
    const data = {
        labels: labels,
        datasets: [{
            data: itemData,
            backgroundColor: ['rgb(55, 138, 255)', 'rgb(255, 236, 33)', 'rgb(255, 163, 47)',
                            'rgb(245, 79, 82)', 'rgb(147, 240, 59)', 'rgb(149, 82, 234)',
                            'rgb(124, 221, 221)', 'rgb(0, 126, 214)', 'rgb(255, 0, 0)',
                            'rgb(255, 115, 0)', 'rgb(255, 236, 0)', 'rgb(82, 215, 38)']
        }]
    };

    const config = {
        type: 'doughnut',
        data: data,
        options: {
            plugins: {
                legend: {
                    display: true,
                    position: 'right'
                },
                title: {
                    display: true
                }
            }
        }
    };

    const chart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>

