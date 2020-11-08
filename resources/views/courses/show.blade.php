@extends('layouts.app')

@section('content')
<style>
    body {background-color: #FFCCCC;}
    
    #map {
        width: 100%;
        height: 500px;
        border: solid 2px red;
    }
</style>
<input type="hidden" id="address" value="{{ $data->adress }}">
<h2 class="text-center mb-5">ちっごのグルメ</h2>

 <h4>投稿者:{{ $data->user->name }}</h4>
 <br>

<div class="row">
    <div class="col-sm-12">
        <div class="card card-primary mb-3">
            <div class="card-header text-white bg-primary">
                <h5>タイトル</h5>
            </div>
            <div class="card-body">
                {{ $data->courses_name }}
            </div>
        </div>
        
         <div class="card card-primary mb-3">
            <div class="card-header text-white bg-primary">
                 <h5>店名</h5>
            </div>
            <div class="card-body">
                {{ $data->photo }}
            </div>
        </div>
        
        <div class="card card-primary mb-3">
            <div class="card-header text-white bg-primary">
                <h5>住所</h5>
            </div>
            <div class="card-body">
                {{ $data->adress }}
                <div id="map"></div>
            </div>
        </div>
        
         <div class="card card-primary mb-3">
            <div class="card-header text-white bg-primary">
                <h5>イチオシメニュー</h5>
            </div>
            <div class="card-body">
                {{ $data->menu }}
            </div>
        </div>
        
        <div class="card card-primary mb-3">
            <div class="card-header text-white bg-primary">
                <h5>コメント</h5>
            </div>
            <div class="card-body">
                {{ $data->content }}
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
// Google Map API & Geocoder デモ
var map;
var marker;
var geocoder;
// 初期画面
function initMap() {
    var address = document.getElementById("address").value;
    geocoder = new google.maps.Geocoder();
    geocoder.geocode({
      'address':  address
   }, function(results, status) { // 結果
        if (status === google.maps.GeocoderStatus.OK) { // ステータスがOKの場合
          map = new google.maps.Map(document.getElementById('map'), {
                center: results[0].geometry.location, // 地図の中心を指定
               zoom: 18 // 地図のズームを指定
           });
         marker = new google.maps.Marker({
               position: results[0].geometry.location, // マーカーを立���る位置を指定
                map: map // マーカーを立てる地図を指定
           });
         infoWindow = new google.maps.InfoWindow({ // 吹き出しの追加
                content: '<h3 class="address">' + address + '</h3>' // 吹き出しに表示する内容
          });
         marker.addListener('click', function() { // マーカーをクリックしたとき
             infoWindow.open(map, marker); // 吹き出しの表示
            });
            infoWindow.open(map, marker); // 吹き出しの表示
     } else { // 失敗した場合
          alert(status);
      }
   });
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgl0FTOBqLyHxTTg7fOmg9M1sAq2E44dM&callback=initMap"></script>
@endsection
