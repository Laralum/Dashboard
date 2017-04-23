<div style="height: 400px; position: relative;">
    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
        <center>
            <span id="time" style="font-size: 80px;"></span>
            <span id="location">@lang('laralum_dashboard::general.loading')</span>
        </center>
    </div>
</div>
<script>
    (function () {
        function checkTime(i) {
            return (i < 10) ? "0" + i : i;
        }

        function startTime() {
            var today = new Date(),
                h = checkTime(today.getHours()),
                m = checkTime(today.getMinutes()),
                s = checkTime(today.getSeconds());
            document.getElementById('time').innerHTML = h + ":" + m + ":" + s;
            t = setTimeout(function () {
                startTime()
            }, 500);
        }

        function getLocation() {
            $.getJSON("https://freegeoip.net/json/", function(data) {
                $('#location').text(data['region_name'] + ', ' + data['country_name']);
            });
        }

        startTime();
        getLocation();
    })();
</script>
