@extends('adm.common.template')

@section('content')
   <section>
      <h2>Slides</h2>

      <div class="content">
         <div class="left">
            @include('adm.slides.common.menu', ['menu', $menu])
         </div>
         <div class="right">
            <header>
               <h2><i class="fa-solid fa-pen-to-square"></i> Listas de Slides</h2>
            </header>

            <div class="list-slides">
               <ul class="positions">
                  <li>1</li>
                  <li>2</li>
                  <li>3</li>
                  <li>4</li>
                  <li>5</li>
                  <li>6</li>
                  <li>7</li>
                  <li>8</li>
                  <li>9</li>
                  <li>10</li>
               </ul>

               <ul class="slide">
                  <li class="empty">Vazio <i class="fa-solid fa-face-frown-open"></i></li>
                  <li class="empty">Vazio <i class="fa-solid fa-face-frown-open"></i></li>
                  <li class="empty">Vazio <i class="fa-solid fa-face-frown-open"></i></li>
                  <li class="empty">Vazio <i class="fa-solid fa-face-frown-open"></i></li>
                  <li class="empty">Vazio <i class="fa-solid fa-face-frown-open"></i></li>
                  <li class="empty">Vazio <i class="fa-solid fa-face-frown-open"></i></li>
                  <li class="empty">Vazio <i class="fa-solid fa-face-frown-open"></i></li>
                  <li class="empty">Vazio <i class="fa-solid fa-face-frown-open"></i></li>
                  <li class="empty">Vazio <i class="fa-solid fa-face-frown-open"></i></li>
                  <li class="empty">Vazio <i class="fa-solid fa-face-frown-open"></i></li>
               </ul>
            </div>
         </div>
      </div>
   </section>
@endsection