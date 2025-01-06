<!-- Content -->
<div class="content">
    <h1 class="mb-4">Quản Lý Doanh Thu</h1>
    
    <!-- Biểu đồ doanh thu -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="card-title mb-0">Biểu Đồ Doanh Thu Theo Tháng</h5>
        </div>
        <div class="card-body">
            <canvas id="revenueChart" width="400" height="166"></canvas>
        </div>
    </div>

    <!-- Bảng thống kê doanh thu -->
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Thống Kê Doanh Thu Theo Tháng</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Tháng/Năm</th>
                        <th>Tổng Đơn Hàng</th>
                        <th>Doanh Thu (VNĐ)</th>
                        <th>Số Hàng Đã Bán</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Lặp qua dữ liệu từ API -->
                    <?php foreach ($thongkes as $thongke): ?>
                    <tr>
                        <td><?php echo "Tháng " . $thongke['thang'] . " / Năm " . $thongke['nam']; ?></td>
                        <td><?php echo $thongke['sodon_thang']; ?></td>
                        <td><?php echo number_format($thongke['doanhthu_thang'], 0, ',', '.'); ?> VNĐ</td>
                        <td><?php echo $thongke['sohang_thang']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    const ctx = document.getElementById('revenueChart').getContext('2d');

    // Tạo mảng chứa tháng/năm, doanh thu, số đơn hàng và số hàng bán từ API
    const monthsAndYears = <?php echo json_encode(array_map(function($thongke) {
        return 'Tháng ' . $thongke['thang'] . ' / Năm ' . $thongke['nam'];
    }, $thongkes)); ?>;
    const revenue = <?php echo json_encode(array_column($thongkes, 'doanhthu_thang')); ?>;

    const revenueChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: monthsAndYears, // Các tháng/năm từ dữ liệu API
            datasets: [{
                label: 'Doanh Thu (VNĐ)',
                data: revenue, // Dữ liệu doanh thu từ API
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return value.toLocaleString() + ' VNĐ';
                        }
                    }
                }
            }
        }
    });
</script>
