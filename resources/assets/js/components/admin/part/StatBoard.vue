<template>
    <div class="panel widget-visitor rounded OverLord-Shadow-Main">
        <div class="panel-body no-padding br-3 OverLord-Shadow-Main">
            <div class="row row-merge">
                <div class="col-sm-8">
                    <div class="panel left-ol stat-left">
                        <div class="panel-heading no-border">
                            <div class="pull-left">
                                <h3 class="panel-title">Daily Visitor</h3>
                            </div>
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-theme dropdown-toggle no-border" data-toggle="dropdown">
                                        Duration <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right no-border">
                                        <li class="dropdown-header">Select duration :</li>
                                        <li><a href="#">Year</a></li>
                                        <li><a href="#">Month</a></li>
                                        <li><a href="#">Week</a></li>
                                        <li><a href="#">Day</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body bg-theme">
                            <div class="overlord-small-chart" id="chart"></div>
                        </div>
                        <div class="panelhttps://www.youtube.com/watch?v=oVlt9kl5t_s&feature=youtu.be-footer OverLord-Shadow-Main footer-ol">
                            <div class="row text-center">
                                <div class="col-xs-4 col-xs-override border-right dotted">
                                    <p class="text-danger text-strong mb-0">- 5%</p>
                                    <p class="h3 text-strong mb-0 mt-10 counter-visit" data-counter="7341">7,341</p>
                                    <p class="text-muted">Visits Today</p>
                                </div>
                                <div class="col-xs-4 col-xs-override border-right dotted">
                                    <p class="text-success text-strong mb-0">+ 32%</p>
                                    <p class="h3 text-strong mb-0 mt-10 counter-unique" data-counter="23762">23,762</p>
                                    <p class="text-muted">Unique Visitors</p>
                                </div>
                                <div class="col-xs-4 col-xs-override">
                                    <p class="text-success text-strong mb-0">+ 76%</p>
                                    <p class="h3 text-strong mb-0 mt-10 counter-page" data-counter="70112">70,112</p>
                                    <p class="text-muted">Page Views</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="panel stat-right no-box-shadow">
                        <div class="panel-body">
                            <h4 class="no-margin">Server Status</h4>
                            <p class="text-muted">Summary of the server status.</p>

                            <span>Domains</span><span class="pull-right">(7/10)</span>
                            <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-lilac" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%"></div>
                            </div>

                            <span>Databases</span><span class="pull-right">(45/100)</span>
                            <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-teal" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%"></div>
                            </div>

                            <span>Email Account</span><span class="pull-right">(30/50)</span>
                            <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%"></div>
                            </div>

                            <span>Memory Usage</span><span class="pull-right">(45.2%)</span>
                            <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%"></div>
                            </div>

                            <span>Disk Usage</span><span class="pull-right">(68.2%)</span>
                            <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%"></div>
                            </div>

                            <span>CPU Usage</span><span class="pull-right">(35.05 - 30 cpus)</span>
                            <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default{
        props:[

        ],

        data(){
            return{

            }
        },
        mounted(){


            axios.get('admin/home/chart')
                .then(function (response){
                    $('#chart').highcharts(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                });

            // Handles counters
            $.fn.digits = function(){
                return this.each(function(){
                    $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") );
                })
            };
            function counter($selector){
                $({countNum: $('.counter-' + $selector).text()}).animate({countNum: $('.counter-' + $selector).data('counter')}, {
                    duration: 8000,
                    easing:'linear',
                    step: function() {
                        $('.counter-' + $selector).text(Math.floor(this.countNum)).digits();
                    },
                    complete: function() {
                        $('.counter-' + $selector).text(this.countNum).digits();
                    }
                });
            }
            // Check if wrapper design is opacity 1
            if($('#wrapper').css('opacity')) {
                counter('visit');
                counter('unique');
                counter('page');
            }
        }

    }
</script>
