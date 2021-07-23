<?php
    $date_time = $latest_news[0]['created_at'];
        $blog0_date = substr($date_time,0,10);
        $month = substr($blog0_date,5,3);

        switch ($month) {
            case '01-':
                echo "Jan";
                break;

            case '02-':
                echo "Feb";
                break;

            case '03-':
                echo "Mar";
                break;

            case '04-':
                echo "Apri";
                break;

            case '05-':
                echo "May";
                break;

            case '06-':
                echo "Jun";
                break;

            case '07-':
                echo "Jul";
                break;

            case '08-':
                echo "Aug";
                break;

            case '09-':
                echo "Sep";
                break;

            case '10-':
                echo "Oct";
                break;

            case '11-':
                echo "Nov";
                break;

            case '12-':
                echo "Dec";
                break;

            default:

                break;
        }
        ?>
        <br><br>
        {{-- <h4>{{substr($date,5,2)}}</h4> --}}
        <p>{!! $latest_news[0]['name'] !!}</p>
        <ul class="post-option text-left">
            <li>"By"<a href="#">Admin</a></li>
            <li>{!! substr($latest_news[0]['created_at'],0,10) !!}</li>
            {{--<li>21 comments</li>--}}
        </ul>
        <a href="{{url('/blog/'.$latest_news[0]['id'])}}" class="secondary-btn">Read More</a>
        <span>{{substr($blog0_date,8)}}</span>
<?php
?>