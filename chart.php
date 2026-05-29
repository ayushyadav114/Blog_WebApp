<?php
    include 'admin_header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">No of Blogs by Each User</h6>
                <?php foreach($res as $row){ ?>
                    <p data-name="<?php echo $row['name']; ?>" class="name"></p>
                <?php } ?>

                <?php foreach($res as $row){ ?>
                    <p data-total_blogs="<?php echo $row['total_blogs']; ?>" class="blogs"></p> 
                <?php } ?>

                <canvas id="sensorChart" style="background: '#444'; border-radius: '10px'; padding: '10px';"></canvas>
            </div>
        </div>
    </div>
</div>
<script>
    const ctx = document.getElementById('sensorChart').getContext('2d');
    let names = [];
    $(".name").each(function() {
        names.push($(this).data("name"));
    });

    let totalBlogs = [];
    $(".blogs").each(function() {
        totalBlogs.push($(this).data("total_blogs"));
    });
    

    let sensorChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels:names,
            datasets: [
                {
                    label: 'No of Blogs',
                    data: totalBlogs,
                    borderColor: 'green',
                    backgroundColor: 'rgba(85, 225, 111, 0.75)',
                    fill: true
                },
            ]
        },
        options: {
            responsive: true,
            scales: {
                x: { title: { display: true, text: 'Users' } },
                y: { title: { display: true, text: 'No of Blogs' }, beginAtZero: false,  ticks: { stepSize: 3 }  }
            }
        }
    });
</script>
<script>
  window.addEventListener('pageshow', function (event) {
    if (event.persisted || performance.getEntriesByType("navigation")[0].type === "back_forward") {
      location.reload();
    }
  });
</script>
</body>
</html>