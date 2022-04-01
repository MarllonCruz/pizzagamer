@extends('adm.common.template')

@section('content')
   <section class="dashboard">
      <h2>Dashaboard</h2>

      <div class="content">
        <div class="left">
            <div class="amounts">
                <div class="box">
                    <h3>Total usuários</h3>
                    <div class="amount">
                        <span>635</span>
                        <i class="fa-solid fa-users"></i>
                    </div>
                </div>
                <div class="box">
                    <h3>Total postagens</h3>
                    <div class="amount">
                        <span>635</span>
                        <i class="fa-solid fa-newspaper"></i>
                    </div>
                </div>
                <div class="box">
                    <h3>Total videos</h3>
                    <div class="amount">
                        <span>635</span>
                        <i class="fa-solid fa-clapperboard"></i>
                    </div>
                </div>
              </div>
              
              <div class="chart-days">
                chart-days
              </div>
        </div>
        <div class="right">
            right
        </div>
      </div>
   </section>
@endsection