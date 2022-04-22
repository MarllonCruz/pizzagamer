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

               <ul class="slide" id="sortable" data-route="{{ route('slides.sortable') }}">
                  @foreach ($slides as $slide)
                     @if (!$slide->article_id)
                        <li class="item">
                           <a href="{{ route('slides.create') }}">Adicionar</a>
                        </li>
                     @else
                        <li class="item">
                           <p>Titulo: {{ $slide->article->title }} ({{ $slide->article->category->title }})</p>
                        </li>
                     @endif
                  @endforeach
               </ul>
            </div>
         </div>
      </div>
   </section>
@endsection

@section('script')
   <script src="{{ url('assets/js/jquery-sortable.js') }}"></script>
   <script>
      // Ajax Sortable by [JQuery]
      // async function requestAjaxByJQuery(route) {
      //    list = [];
      //    $(".item").each((index, obj)=> {
      //       list.push($(obj).attr("data-id")); 
      //    });

      //    $.ajax({
      //       url: route,
      //       data: {
      //          "_token": $('meta[name="csrf-token"]').attr('content'),
      //          "list": list
      //       },
      //       type: "POST",
      //       dataType: "json",
      //       success: function (su) {
      //          console.log(su);
      //       }
      //    });
      // }

      // SortableJS
      var route = $('#sortable').data('route');

      var el = document.getElementById('sortable');
      Sortable.create(el, {
         group: 'shared',
         swapThreshold: 0.90,
         animation: 300,
         onUpdate: async function() {
            requestAjaxByJQuery(route);
         }
      });
   </script>
@endsection