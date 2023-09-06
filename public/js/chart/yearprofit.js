
fetch('api/yearProfit')
    .then(response => response.json())
    .then(data => {
        const profileReportChartEl = document.querySelector('#yearProfit'),
            profileReportChartConfig = {
                chart: {
                    height: 80,
                    // width: 175,
                    type: 'line',
                    toolbar: {
                        show: false
                    },
                    dropShadow: {
                        enabled: true,
                        top: 10,
                        left: 5,
                        blur: 3,
                        color: config.colors.warning,
                        opacity: 0.15
                    },
                    sparkline: {
                        enabled: true
                    }
                },
                grid: {
                    show: false,
                    padding: {
                        right: 8
                    }
                },
                colors: [config.colors.warning],
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    width: 5,
                    curve: 'smooth'
                },
                series: [
                    {
                        data: data
                    }
                ],
                xaxis: {
                    show: false,
                    lines: {
                        show: false
                    },
                    labels: {
                        show: false
                    },
                    axisBorder: {
                        show: false
                    }
                },
                yaxis: {
                    show: false
                }
            };
            let yearProfitTitle = document.getElementById('yearProfitTitle');
            let Allrevenue = 0;
            for (let index = 0; index < data.length; index++) {
                Allrevenue += parseFloat(data[index]);
            }
            yearProfitTitle.textContent = Allrevenue.toFixed(2) + ' €';
        if (typeof profileReportChartEl !== undefined && profileReportChartEl !== null) {
            const profileReportChart = new ApexCharts(profileReportChartEl, profileReportChartConfig);
            profileReportChart.render();
        }

    })
    .catch(error => console.error(error));


