@extends('layouts.app')

@section('title', 'Home Page')

@section('content')


<style>

  .nav{
    background-color: #111;
    padding-top: 0;
    padding-bottom: 0;

  }
  
  .home{
    display: none;
  }
  

  .card{
    border: none;
    box-shadow: 0 0 40px rgba(0, 0, 0, .2);
    border-radius: 30px;
  }
    
  .card .btn-pnk {
    background-color: #ff4ed7e3; /* ボタンの通常の背景色 */
    color: white; /* ボタンのテキスト色 */
    transition: background-color 0.3s; /* 背景色の変化にアニメーションを追加 */
  }

  .card .btn-pnk:hover {
    background-color: #fb0bc4e3; /* ホバー時の背景色を指定 */
    font-size: 1.2rem
  }
  </style>
  

<div class="container-fluid " style="    background-image: url(https://images.unsplash.com/photo-1498550744921-75f79806b8a7?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=b0f6908…&auto=format&fit=crop&w=1500&q=80);
 background-repeat: no-repeat;
 background-size: cover;
 background-position: center; 
 height: inherit;
">
  <div class="justify-content-center pt-5">
      <div class="col-md-7 col-lg-5 px-lg-2 col-xl-5 m-auto py-5">
      <div class="card">

        <form
          {{-- method="POST"
          class="w-100 rounded-1 p-4 border bg-white"
          action="https://herotofu.com/start" --}}
        >
        <label class="d-block mt-3 mb-2 mx-4 mx-xl-5">
          <span class="form-label d-block">お名前</span>
          <input name="send_name" class="form-control" placeholder="ジョン万次郎" required />
        </label>

          <label class="d-block my-2 mx-4 mx-xl-5">
            <span class="form-label d-block">メールアドレス</span>
            <input name="email" class="form-control" placeholder="john@xxx.com" required />

          </label>

          <label class="d-block my-2 mx-4 mx-xl-5">
            <span class="form-label d-block">内容</span>
            <textarea name="details"class="form-control" rows="5" placeholder="お問い合わせ内容"></textarea>
          </label>

          <div class="mb-2 mt-4 pb-3 mx-4 text-center" style="height:70px;">
            <button type="submit" class="btn btn-pnk px-3 rounded-5">
              送信
            </button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>




<label hidden>
  <input type="color" id="click-spark-color" name="click-spark-color" />
  spark color
</label>

<click-spark></click-spark>






@endsection
