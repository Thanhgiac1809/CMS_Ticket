var ctx = document.getElementById("myChart_family");
    var myChart = new Chart(ctx, {
        type: 'doughnut' ,
        data: {
            // labels: ['Đã áp dụng', 'Chưa áp dụng'],
            datasets: [{
                label: '# of Votes',
                data: [35, 65],
                backgroundColor: [
                    '#fe8947',
                    '#4f75ff',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
        
var ctx = document.getElementById("myChart_event");
    var myChart = new Chart(ctx, {
        type: 'doughnut' ,
        data: {
            // labels: ['Đã áp dụng', 'Chưa áp dụng'],
            datasets: [{
                label: '# of Votes',
                data: [55, 45],
                backgroundColor: [
                    '#fe8947',
                    '#4f75ff',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
 
    document.addEventListener("DOMContentLoaded", function() {
        var ctx = document.getElementById("myChart_revenue").getContext("2d");

        var data = {
            labels: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "CN"],
            datasets: [{
                label: [],
                data: [140000000, 170000000, 160000000, 230000000, 200000000, 250000000, 180000000],
                borderColor: '#fe9a3f',
                backgroundColor: '#fef0e7', // Màu sắc của fill
                borderWidth: 2,
                pointRadius: 0, // Bỏ điểm
                tension: 0.3,
                fill: 'start' // Bắt đầu fill từ điểm bắt đầu của đường
            }]
        };

        var options = {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 40000000, // Khoảng cách giữa các giá trị trên trục y
                        callback: function(value, index, values) {
                            return value / 10000000 + "tr";
                        }
                    }
                }
            }
        };

        var myChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: options
        });
    });          